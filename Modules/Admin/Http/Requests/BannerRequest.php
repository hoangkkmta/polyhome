<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'name' => 'required',
            'title' => 'min:2',
            'image' => '',
            'desc' => 'min:10',
            'url' => 'min:10',
            'location' => 'numeric',
            'avtive' => 'numeric',

        ];
        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => 'Tên',
            'title' => "Tiêu đề",
            'image' => "Ảnh banner",
            'desc' => "mô tả",
            'url' => "Đường dẫn",
            'location' => 'Vị trí đặt banner',
            'active' => 'Trạng thái',
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
