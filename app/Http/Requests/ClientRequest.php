<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'city' => ['required',],
            'state' => ['required'],
            'situation' => ['required'],
            'document' => ['required'],
            'phone' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Necessário preencher o nome',
            'email.required' => 'Necessário inserir email',
            'city.required' => 'Necessário escolher uma cidade',
            'state.required' => 'Necessário escolher um estado',
            'situation.required' => 'Necessário escolher situação do cliente',
            'document.required' => 'Necessário preencher documento do cliente',
            'phone.required' => 'Necessário preencher telefone do cliente',
        ];
    }
}
