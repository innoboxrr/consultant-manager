<?php

namespace Innoboxrr\ConsultantManager\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function map()
    {

        $this->mapApiRoutes();      

    }

    protected function mapApiRoutes()
    {

        foreach (glob(__DIR__ . '/../../routes/api/models/*.php') as $file) {

            $name = basename($file, '.php');

            Route::middleware('api')
                ->prefix('api/innoboxrr/consultant-manager/' . $name)
                ->as('api.innoboxrr.consultant.manager.' . $name . '.')
                ->namespace('Innoboxrr\ConsultantManager\Http\Controllers')
                ->group($file);

        }

    }

}
