<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'city' => 'required',
            'email' => 'required',
        ];
    }

    public function messages():array
    {
        return [
            'name' => 'Заполнитеполи имя',
            'birthday' => 'Укажите день рождения',
            'gender' => 'Укажите пол',
            'country' => 'Поле страна необходимо заполнить',
            'city' => 'Поле город необходимо заполнить',
            'email' => 'Поле почта необходимо заполнить',
        ];
    }
}
