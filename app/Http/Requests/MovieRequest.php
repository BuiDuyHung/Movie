<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'title_english' => 'required|min:6',
            'slug' => 'required|min:6',
            'description' => 'required|min:6',
            'image' => 'required',
            'time' => 'required',
            'topview' => 'required',
            'tag' => 'required',
            'year' => 'required|integer',

            'status' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn trạng thái');
                }
            }],
            'hot' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn hot');
                }
            }],
            'sub' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn phụ đề');
                }
            }],
            'resolution' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn định dạng');
                }
            }],
            'genre_id' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn thể loại');
                }
            }],
            'category_id' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn danh mục');
                }
            }],
            'country_id' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn quốc gia');
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
            'title_english' => 'Tiêu đề tiếng anh',
            'slug' => 'Slug',
            'description' => 'Mô tả',
            'status' => 'Trạng thái',
            'image' => 'Hình ảnh',
            'Hot' => 'Hot',
            'sub' => 'Phụ đề',
            'resolution' => 'Định dạng',
            'genre_id' => 'Thể loại',
            'category_id' => 'Danh mục',
            'country_id' => 'Quốc gia',
            'year' => 'Năm sản xuất',
            'time' => 'Thời lượng phim',
            'tag' => 'Tag',
            'topview' => 'Top view',
        ];
    }
}
