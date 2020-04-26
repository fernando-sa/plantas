<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PlantCare extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'plants' => 'required',
            'beginDate' => 'required|date',
            'endDate' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'plants.required' => "Adicione pelo menos uma planta",
            'beginDate' => "Escolha um dia de inicio",
            'endDate' => "Escolha um dia de término"
        ];
    }
}
