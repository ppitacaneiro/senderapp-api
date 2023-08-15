<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de usuario es obligatorio',
            'name.unique' => 'EL nombre de usuario ya ha sido registrado',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Debes indicar un e-mail válido',
            'email.unique' => 'El email indicado ya ha sido registrado',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 10 caracteres'
        ];
    }
}
