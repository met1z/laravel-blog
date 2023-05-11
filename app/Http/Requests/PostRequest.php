<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules() {
        $rules = [
            'title' => 'required|unique:posts|min:3|max:100',
            'excerpt' => 'required|min:100|max:200',
            'body' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:5000',
        ];
        if ($this->isMethod('PATCH')) {
            $rules['title'] = 'required|min:3|max:100';
        }
        return $rules;
    }
       

    public function messages() {
        return [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'unique' => 'Такое значение поля «:attribute» уже используется',
            'min' => [
                'string' => 'Поле «:attribute» должно быть не меньше :min символов',
                'file' => 'Файл «:attribute» должен быть не меньше :min Кбайт'
            ],
            'max' => [
                'string' => 'Поле «:attribute» должно быть не больше :max символов',
                'file' => 'Файл «:attribute» должен быть не больше :max Кбайт'
            ],
            'mimes' => 'Файл «:attribute» должен иметь формат :values',
        ];
    }

    public function attributes() {
        return [
            'title' => 'Заголовок',
            'excerpt' => 'Анонс поста',
            'body' => 'Текст поста',
            'image' => 'Изображение',
        ];
    }
       
       
}
