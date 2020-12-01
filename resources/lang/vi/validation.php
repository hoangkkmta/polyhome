<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute phải được chấp nhận',
    'active_url' => ':attribute không phải là một url',
    'after' => ':attribute phải là một ngày sau :date',
    'after_or_equal' => ':attribute phải là một ngày sau hoặc bằng với :date',
    'alpha' => ':attribute chỉ nhận vào chữ cái',
    'alpha_dash' => ':attribute chỉ nhận vào chữ cái, số và gạch ngang, gạch dưới',
    'alpha_num' => ':attribute chỉ nhận vào chữ cái và số',
    'array' => ':attribute chỉ nhận vào một array',
    'before' => ':attribute phải là một ngày sau :date',
    'before_or_equal' => ':attribute phải là một ngày sau hoặc bằng :date',
    'between' => [
        'numeric' => ':attribute chỉ nằm trong khoảng :min và :max',
        'file' => ':attribute chỉ nằm trong khoảng :min và :max kilobytes',
        'string' => ':attribute chỉ nằm trong khoảng :min và :max ký tự',
        'array' => ':attribute chỉ nằm trong khoảng :min và :max bản ghi',
    ],
    'boolean' => ':attribute chỉ nhận vào true và false',
    'confirmed' => ':attribute không phù hợp',
    'date' => ':attribute ngày không đúng định dạng',
    'date_equals' => ':attribute phải là một ngày bằng với :date',
    'date_format' => ':attribute không phù hợp với định dạng :format',
    'different' => ':attribute và :other phải khác nhau',
    'digits' => ':attribute phải là :digits',
    'digits_between' => ':attribute chỉ nằm trong khoảng :min và :max',
    'dimensions' => ':attribute kích thước hình ảnh không hợp lệ',
    'distinct' => ':attribute trường hợp có giá trị trùng',
    'email' => ':attribute chỉ nhận vào là một email',
    'ends_with' => ':attribute phải kết thúc bằng một trong những giá trị sau: :values',
    'exists' => ':attribute được chọn không hợp lệ',
    'file' => ':attribute phải là một file',
    'filled' => ':attribute phải có giá trị',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value',
        'file' => ':attribute phải lớn hơn :value kilobytes',
        'string' => ':attribute phải lớn hơn :value ký tự',
        'array' => ':attribute phải lớn hơn :value bản ghi',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobytes',
        'string' => ':attribute phải lớn hơn hoặc bằng :value ký tự',
        'array' => ':attribute phải có hoặc nhiều hơn :value bản ghi',
    ],
    'image' => ':attribute phải là định dạng ảnh',
    'in' => ':attribute được chọn không hợp lệ',
    'in_array' => ':attribute giá trị không tồn tại trong :other',
    'integer' => ':attribute phải là một số nguyên',
    'ip' => ':attribute phải là một địa chỉ IP',
    'ipv4' => ':attribute phải là một địa IPv4',
    'ipv6' => ':attribute phải là địa chỉ IPv6',
    'json' => ':attribute phải là một JSON string',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value',
        'file' => ':attribute phải nhỏ hơn :value kilobytes',
        'string' => ':attribute phải nhỏ hơn :value ký tự',
        'array' => ':attribute phải nhỏ hơn :value bản ghi',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value',
        'file' => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes',
        'string' => ':attribute phải nhỏ hơn hoặc bằng :value ký tự',
        'array' => ':attribute must not have more than :value bản ghi',
    ],
    'max' => [
        'numeric' => ':attribute có thể không lớn hơn :max',
        'file' => ':attribute có thể không lớn hơn :max kilobytes',
        'string' => ':attribute có thể không lớn hơn :max ký tự',
        'array' => ':attribute có thể không lớn hơn :max bản ghi',
    ],
    'mimes' => ':attribute phải thuộc loại tệp tin sau: :values',
    'mimetypes' => ':attribute phải thuộc loại tệp tin sau: :values',
    'min' => [
        'numeric' => ':attribute phải ít nhất :min',
        'file' => ':attribute phải ít nhất :min kilobytes',
        'string' => ':attribute phải ít nhất :min characters',
        'array' => ':attribute phải có ít nhất :min bản ghi',
    ],
    'not_in' => ':attribute đã chọn không hợp lệ',
    'not_regex' => ':attribute định dạng không hợp lệ',
    'numeric' => ':attribute phải là một số',
    'password' => 'Mật khẩu không đúng',
    'present' => ':attribute field must be present',
    'regex' => ':attribute định dạng không hợp lệ',
    'required' => ':attribute không được để trống',
    'required_if' => ':attribute không được để trống khi :other là :value',
    'required_unless' => ':attribute không được để trống trừ khi :other là :values',
    'required_with' => ':attribute không được để trống khi :values is present',
    'required_with_all' => ':attribute không được để trống khi :values are present',
    'required_without' => ':attribute không được để trống khi :values is not present',
    'required_without_all' => ':attribute không được để trống khi không có :values are present',
    'same' => ':attribute và :other phải khớp',
    'size' => [
        'numeric' => ':attribute cần phải :size',
        'file' => ':attribute cần phải :size kilobytes',
        'string' => ':attribute cần phải :size ký tự',
        'array' => ':attribute phải chứa :size bản ghi',
    ],
    'starts_with' => ':attribute phải bắt đầu với một trong những giá trị sau: :values',
    'string' => ':attribute phải là một chuỗi',
    'timezone' => ':attribute timezone không hợp lệ',
    'unique' => ':attribute đã tồn tại trên hệ thống',
    'uploaded' => ':attribute không thể upload',
    'url' => ':attribute không đúng định dạng url',
    'uuid' => ':attribute không đúng định dạng UUID',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => 'Email',
        'full_name' => 'Họ tên',
        'role' => 'Quyền',
        'phone' => 'Số điện thoại',
        'address' => 'Địa chỉ',
        'seat' => "Số ghế"
    ],
    'exception' => [
        'message' => 'Dữ liệu không hợp lệ!'
    ]

];
