<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Validamos siempre
    }

    public function rules(): array
    {
        return [
            'nombre'   => 'required|string|min:1|max:255',
            'email'    => 'required|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'   => 'El nombre es obligatorio.',
            'nombre.min'        => 'El nombre debe tener al menos 1 carácter.',
            'nombre.max'        => 'El nombre no puede superar los 255 caracteres.',
            'email.required'    => 'El email es obligatorio.',
            'email.email'       => 'El email debe ser válido.',
            'email.unique'      => 'El email ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min'      => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed'=> 'Las contraseñas no coinciden.',
        ];
    }
}
