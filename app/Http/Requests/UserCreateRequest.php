<?php

namespace App\Http\Requests;

use App\Rules\PasswordValidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', PasswordValidate::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()
            ],
            'city' => ['required'],
            'state' => ['required'],
            'situation' => ['required'],
            'sex' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Necessário preencher o nome',
            'email.required' => 'Necessário inserir email',
            'password.required' => 'Necessário inserir uma senha',
            'city.required' => 'Necessário escolher uma cidade',
            'state.required' => 'Necessário escolher um estado',
            'situation.required' => 'Necessário escolher situação do usuário',
            'sexo.required' => 'Necessário escolher o sexo',
        ];
    }
}
