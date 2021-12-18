<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'preview' => 'required',
            'content' => 'required',
            'is_private' => 'required',
        ];

    }

    public function messages():array
    {
        return [
            'title.required' => 'Название необходимо заполнить',
            'preview.required' => 'Превью необходимо заполнить',
            'content.required' => 'Текст должен быть',
            'is_private.required' => 'Поле приват необходимо заполнить',
        ];
    }



}
