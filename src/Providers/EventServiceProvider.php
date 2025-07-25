<?php

namespace Innoboxrr\ConsultantManager\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Cache;

class EventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerEventsAndObservers();
    }

    private function registerEventsAndObservers()
    {
        $cacheKey = 'consultant_manager_events_and_observers';

        $data = Cache::remember($cacheKey, now()->addDay(), function () {
            return [
                'events' => $this->customDiscoverEvents(),
                'observers' => $this->customDiscoverObservers()
            ];
        });

        foreach ($data['events'] as $event => $listeners) {
            foreach ($listeners as $listener) {
                Event::listen($event, $listener);
            }
        }

        foreach ($data['observers'] as $model => $observer) {
            $model::observe($observer);
        }
    }

    protected function customDiscoverEvents()
    {
        $events = [];
        $basePath = realpath(__DIR__ . '/../Http/Events');
        $namespace = 'Innoboxrr\ConsultantManager\Http\Events\\';

        // Recorremos cada directorio de modelo dentro de Events
        $models = glob("{$basePath}/*", GLOB_ONLYDIR);
        foreach ($models as $modelPath) {
            $model = basename($modelPath);

            // Buscamos todos los eventos para el modelo actual
            $modelEvents = glob("{$modelPath}/Events/*.php", GLOB_BRACE);
            foreach ($modelEvents as $eventPath) {
                $eventName = pathinfo($eventPath, PATHINFO_FILENAME);
                $eventClass = "{$namespace}{$model}\\Events\\{$eventName}";

                // Buscamos todos los listeners para el evento actual
                $listeners = glob("{$modelPath}/Listeners/{$eventName}/*.php", GLOB_BRACE);
                foreach ($listeners as $listenerPath) {
                    $listenerName = pathinfo($listenerPath, PATHINFO_FILENAME);
                    $listenerClass = "{$namespace}{$model}\\Listeners\\{$eventName}\\{$listenerName}";

                    // Agregamos el evento y su listener al array
                    $events[$eventClass][] = $listenerClass;
                }
            }
        }

        return $events;
    }

    protected function customDiscoverObservers()
    {
        $observers = [];
        $modelsPath = realpath(__DIR__ . '/../Models');
        $observersPath = realpath(__DIR__ . '/../Observers');
        $namespaceModel = 'Innoboxrr\ConsultantManager\Models\\';
        $namespaceObserver = 'Innoboxrr\ConsultantManager\Observers\\';

        // Recorremos cada archivo de modelo en el directorio Models
        $modelFiles = glob("{$modelsPath}/*.php");
        foreach ($modelFiles as $modelFilePath) {
            $modelName = pathinfo($modelFilePath, PATHINFO_FILENAME);
            $modelClass = $namespaceModel . $modelName;
            $observerName = $modelName . 'Observer';
            $observerClass = $namespaceObserver . $observerName;

            // Comprobamos si el observador existe y lo agregamos al array
            if (file_exists($observersPath . '/' . $observerName . '.php') && class_exists($modelClass) && class_exists($observerClass)) {
                $observers[$modelClass] = $observerClass;
            }
        }

        return $observers;
    }

}
