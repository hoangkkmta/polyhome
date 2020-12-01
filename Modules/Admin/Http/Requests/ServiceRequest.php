<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'detail' => 'min:6',
            'image' => 'image',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'estimate' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên dịch vụ',
            'detail' => 'Chi tiết dịch vụ',
            'image' => 'Ảnh dịch vụ',
            'price' => 'Giá dịch vụ',
            'sale_price' => 'Giá dịch vụ sau khi giảm',
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
