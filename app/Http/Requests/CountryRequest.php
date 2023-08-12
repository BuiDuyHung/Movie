<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules =[
            'title' => 'required|min:6',
            'description' => 'required|min:6',
            'status' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn trạng thái');
                }
            }],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute có độ dài từ :min ký tự',
            'integer' => ':attribute phải là số',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'description' => 'Mô tả',
            'status' => 'Trạng thái',
        ];
    }
}
