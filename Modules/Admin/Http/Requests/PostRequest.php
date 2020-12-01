<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'title' => [
                'required'
            ],
            'content' => [
                'required'
            ],
            'image' => [
                'image'
            ],
            'category_id' => [
                'required'
            ]

        ];
        return $rule;
    }

    public function attributes()
    {
        return [
            'title' => 'Tên tiêu đề',
            'content' => 'Nội dung bài viết',
            'image' => 'Ảnh đại diện bài viết',
            'category_id' => 'Chuyên mục bài viết'
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
