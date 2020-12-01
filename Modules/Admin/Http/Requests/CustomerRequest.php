<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            $unique = Rule::unique('customers')
            ->where(function($query) {
                $query->where('id', '=', auth()->user()->id);
            }),
            'name' => 'required|min:2',
            'email' => 'required|email',

        ];
        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => 'Tên khách hàng',
            'email' => 'Địa chỉ email'
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
