<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeskRequest extends FormRequest
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
            'img' => "required",
            'title' => "required|min:5",
            'price' => "required|min:1",
            'text' => "required|min:30",
            'discount' => "required|min:1|max:2",
            'star' => "required|min:1|max:1",
        ];
    }

    public function messages(){
        return [
            'img.required' => 'Поле img обязательным',
            'title.required' => 'Поля title являеться обязательным',
            'price.required' => 'Поля price являеться обязательным',
            'text.required' => 'Поля text являеться обязательным',
            'discount.required' => 'Поля discount являеться обязательным',
            'star.required' => 'Поля star являеться обязательным',
        ];
    }
}
