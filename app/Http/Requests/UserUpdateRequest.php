<?php

namespace App\Http\Requests;

use App\Rules\ValidateCurrentPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required'],
            'state' => ['required'],
            'situation' => ['required'],
            'sex' => ['required'],
        ];

        if ($request->get('password')) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        return $rules;
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
