<?php

namespace App\Http\Requests;

use App\Enums\DifficultyLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class HickingTrailPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'distance_kms' => 'required|numeric',
            'time_minutes' => 'required|numeric',
            'community_id' => 'required|exists:communities,id',
            'province_id' => 'required|exists:provinces,id',
            'municipality_id' => 'required|exists:municipalities,id',
            'origin_name' => 'required',
            'origin_lat' => ['required','regex:/^-?([0-8]?[0-9]|90)(\.[0-9]{1,10})?$/'],
            'origin_lng' => ['required','regex:/^-?([0-9]{1,2}|1[0-7][0-9]|180)(\.[0-9]{1,10})$/'],
            'destination_name' => 'required',
            'destination_lat' => ['required','regex:/^-?([0-8]?[0-9]|90)(\.[0-9]{1,10})?$/'],
            'destination_lng' => ['required','regex:/^-?([0-9]{1,2}|1[0-7][0-9]|180)(\.[0-9]{1,10})$/'],
            'difficulty_level' => ['required',new Enum(DifficultyLevel::class)],
            'steps' => 'required|array',
            'steps.*.lat' => ['required','regex:/^-?([0-8]?[0-9]|90)(\.[0-9]{1,10})?$/'],
            'steps.*.lng' => ['required','regex:/^-?([0-9]{1,2}|1[0-7][0-9]|180)(\.[0-9]{1,10})$/'],
            'photos' => 'array',
            // TODO: validate photos array
        ];
    }

    public function messages() 
    {
        return [
            'user_id.required' => 'Debes indicar el usuario',
            'user_id.exists' => 'El usuario debe estar registrado',
            'distance_kms.required' => 'Debes especificar una distancia de la ruta en Kms',
            'distance_kms.numeric' => 'EL formato de la distancia de la ruta en Kms debe ser númerico',
            'time_minutes.required' => 'Debes especificar un tiempo',
            'time_minutes.numeric' => 'EL tiempo debe ser un número',
            'community_id.required' => 'Debes especificar una comunidad autónoma',
            'community_id.exists' => 'La comunidad debe estar registrada',
            'province_id.required' => 'Debes especificar una provincia',
            'province_id.exists' => 'La provincia debe estar registrada',
            'municipaliy_id.required' => 'Debes especificar un municipio',
            'municipaliy_id.exists' => 'El municipio debe de estar registrado',
            'origin_name.required' => 'Debes indicar un origen de la ruta',
            'origin_lat.required' => 'Debes indicar una latitud',
            'origin_lat.regex' => 'Debes indicar una latitud valida',
            'origin_lng.required' => 'Debes indicar una longitud',
            'origin_lng.regex' => 'Debes indicar una longitud valida',
            'destination_name.required' => 'Debes indicar un destino de la ruta',
            'destination_lat.required' => 'Debes indicar una latitud',
            'destination_lat.regex' => 'Debes indicar una latitud valida',
            'destination_lng.required' => 'Debes indicar una longitud',
            'destination_lng.regex' => 'Debes indicar una longitud valida',
            'difficulty_level.required' => 'Debes indicar un nivel de dificultad válido',
            'steps.required' => 'Debes indicar los pasos de la ruta',
            'steps.*.lat.required' => 'Debes indicar una latitud para el paso',
            'steps.*.lat.regex' => 'Debes indicar una latitud valida para el paso',
        ];
    }
}
