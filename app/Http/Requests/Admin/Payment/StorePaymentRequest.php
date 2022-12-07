<?php

namespace App\Http\Requests\Admin\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'price' => 'required|integer',
            'file' => 'required|mimes:pdf|max:10240',
            'account' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'لطفا قیمت را وارد کنید',
            'file.required' => 'لطفا ضمائم را وارد کنید',
            'file.mimes' => 'فایل باید از نوع pdf باشد',
            'file.max' => 'خجم فایل نباید بیشتر از ۱۰ مگابایت باشد',
            'account.required' => 'لطفا طرف حساب دریافت کننده مبلغ وارد کنید',
        ];
    }
}
