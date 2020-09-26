<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'cpf' => 'required|unique:users|min:11|max:11',
            'password' => 'required|min:8',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'password.required' => 'Password is required!',
            'cpf.required' => 'Cpf is required!',
            'email.unique' => 'The email has already been taken.',
            'cpf.unique' => 'The cpf has already been taken.',
        ];
    }

    /**
     * @return string[]
     */
    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
        ];
    }
}
