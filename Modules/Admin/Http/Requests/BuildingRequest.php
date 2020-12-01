<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
            'electricity_price' => [
                'required',
                'numeric',
            ],
            'water_price' => [
                'required',
                'numeric',
            ],
            'internet_price' => [
                'required',
                'numeric',
            ],
            'cleaning_price' => [
                'required',
                'numeric',
            ],
            'elevator_price' => [
                'required',
                'numeric',
            ],
            'parking_price' => [
                'required'
            ],
            'description' => [
                'required',
            ],
            'district_id' => [
                'required'
            ],
            'address' => [
                'required'
            ],
            'utility_id' => [
                'required'
            ],
            'school_id' => [
                'required',
            ]
        ];
        switch ($this->method()) {
            case "POST":
                $rule['image'] = [
                        'required',
                        'image',
                ];
                break;

            case "PUT":
                $rule['image'] = [
                    'image',
                ];
                break;
        }
        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => 'Tên số phòng',
            'image' => 'Hình ảnh',
            'electricity_price' => 'Giá điện',
            'water_price' => 'Giá nước',
            'internet_price' => 'Giá mạng internet',
            'cleaning_price' => 'Giá vệ sinh',
            'elevator_price' => 'Giá thang máy',
            'parking_price' => 'Giá gửi xe',
            'description' => 'Mô tả',
            'district_id' => 'Quận',
            'address' => 'Địa chỉ',
            'google_map' => 'Đường dẫn google map',
            'utility_id' => 'Tiện ích',
            'school_id' => 'Trường học',
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
