<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class MyAccountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();
        $rule =  [
            'name' => [
                'required',
                'min:1','max:255',
            ],
            'email' => [
                'required',
                'email',
            ],
            'avatar' => [
                'image',
            ],
            'address' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
        ];

        return $rule;

    }

    public function attributes()
    {
        return [
            'name' => 'Tên tài khoản',
            'email' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
