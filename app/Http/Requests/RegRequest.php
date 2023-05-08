<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class RegRequest extends FormRequest
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
            'login' => 'required|min:5|max:10',
            'pass' => 'required|min:5|max:10',
            'name' => 'required|email',
            'status' => 'required',
        ];
    }

    public function messages(){
        return [
            'login.required' => 'Введите логин. Кол-во символов от 5 до 10',
            'email.required' => 'Вы не ввели поле email',
            'password.required' => 'Вы не ввели пароль',
            'status.required' => 'Идентификатор пользователя'
        ];
    }
}
