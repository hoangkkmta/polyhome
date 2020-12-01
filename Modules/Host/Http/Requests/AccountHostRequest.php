<?php

namespace Modules\Host\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AccountHostRequest extends FormRequest
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
                'required',
                'image',
            ],
            'address' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'facebook' => [
                'url',
                'nullable',
            ],
            'zalo' => [
                'url',
                'nullable',
            ]
        ];
        if (request()->password || request()->password_confirmation) {
            $rule['password'] = 'required|confirmed|min:6|max:32';
        }

        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => 'Tên tài khoản',
            'email' => 'Địa chỉ email',
            'avatar' => 'Ảnh đại diện',
            'password' => 'Mật khẩu',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
            'facebook' => 'Địa chỉ facebook',
            'zalo' => 'Địa chỉ zalo',
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
