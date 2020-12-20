<?php

namespace Modules\Host\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'host_id' => [
                'required',
            ],
            'building_id' => [
                'required',
            ],
            'name' => [
                'required'
            ],
            'price' => [
                'required',
                'numeric',
                'gt:0',
            ],
            'room_category_id' => [
                'required'
            ],
            'utility_id' => [
                'required'
            ],
            'acreage' => [
                'required'
            ],
            'max_people' => [
                'required'
            ],
            'floors' => [
                'required'
            ],
        ];
        return $rule;
    }

    public function attributes()
    {
        return [
            'building_id' => 'Nhà cho thuê',
            'name' => 'Tên số phòng',
            'price' => 'Giá thuê phòng',
            'room_category_id' => 'Loại phòng',
            'utility_id' => 'Tiện ích',
            'acreage' => 'Diện tích',
            'max_people' => 'Số người ở tối đa',
            'floors' => 'Số tầng',
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
