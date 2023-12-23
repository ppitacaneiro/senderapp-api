<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\DifficultyLevel;
use Illuminate\Validation\Rules\Enum;

class HickinTrailSearchRequest extends FormRequest
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
            'community_id' => 'required|exists:communities,id',
            'province_id' => 'exists:provinces,id',
            'municipality_id' => 'exists:municipalities,id',
            'difficulty_level' => ['required',new Enum(DifficultyLevel::class)],
        ];
    }

    public function messages() 
    {
        return [
            'community_id.required' => 'Debes indicar una comunidad',
            'community_id.exists' => 'La comunidad debe estar registrada',
            'province_id.exists' => 'La provincia debe estar registrada',
            'municipality_id.exists' => 'El municipio debe estar registrado',
            'difficulty_level.required' => 'Debes indicar un nivel de dificultad válido',
        ];
    }
}
