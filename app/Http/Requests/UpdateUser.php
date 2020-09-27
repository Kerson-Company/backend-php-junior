<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateUser extends FormRequest
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
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];
        return $this->getOnlyFilledFields($rules);
    }

    /**
     * @param $rules
     * @return array
     */
    private function getOnlyFilledFields($rules){
        return Arr::only($rules, array_keys($this->all()));
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
