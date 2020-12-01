<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case "POST":
                $rule['name'] = [
                    'required'
                ];
                $rule['icon'] = [
                    'required',
                    'image',
                ];
                $rule['type'] = [
                    'required',
                ];
            break;

            case "PUT":
                $rule['name'] = [
                    'required'
                ];
                $rule['icon'] = [
                    'image',
                ];
                $rule['type'] = [
                    'required',
                ];
            break;
        }

        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => 'Tên tiện ích',
            'icon' => 'Ảnh icon',
            'type' => 'Kiểu tiện ích'
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
