<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationIntakeForm;

use Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm;
use Illuminate\Foundation\Http\FormRequest;

class PoliciesRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|numeric|exists:Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm,id'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function attributes()
    {
        return [
            //
        ];
    }

    protected function passedValidation()
    {
        //
    }

    public function handle($controllerClass)
    {

        $model = ($this->id) ? ConsultationIntakeForm::findOrFail($this->id) : app(ConsultationIntakeForm::class);

        $result = [];

        $methods = get_class_methods($controllerClass);

        $policyMethodMapping = [
            'show' => 'view', // Mapea 'show' a 'view'
            // Agrega aquí más mapeos si es necesario
        ];

        foreach ($methods as $method) {

            $policyMethod = $policyMethodMapping[$method] ?? $method; // Obtiene el nombre de la política correspondiente, o el mismo nombre del método si no hay mapeo

            if (method_exists($controllerClass, $method) && is_callable([$controllerClass, $method])) {
            
                $result[$method] = $this->user()->can($policyMethod, $model);
        
                $result[$policyMethod] = $this->user()->can($policyMethod, $model);
            
            }

        }

        return response()->json($result);

    }
    
}
