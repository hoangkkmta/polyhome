<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'name' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'image' => [
                'image'
            ],
            'status' => [
                'required'
            ],
        ];
        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => 'Tên thể loại',
            'description' => 'Nội dung mô tả',
            'image' => 'Ảnh chuyên mục',
            'status' => 'Trạng thái',
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
