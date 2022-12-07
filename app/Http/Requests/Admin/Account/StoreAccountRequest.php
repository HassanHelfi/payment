<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'price' => 'required|integer',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'لطفا کاربر را وارد کنید',
            'price.required' => 'لطفا قیمت را وارد کنید',
            'type.required' => 'لطفا نوع حساب را وارد کنید',
        ];
    }
}
