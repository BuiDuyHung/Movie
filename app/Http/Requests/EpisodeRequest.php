<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
        $rules = [
            'link' => 'required',
            'movie_id' => ['required', function($attribute, $value, $fail) {
                if($value == '0'){
                    $fail('Vui lòng chọn phim');
                }
            }],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống'
        ];
    }

    public function attributes()
    {
        return [
            'link' => 'Link phim',
            'movie_id' => 'Phim'
        ];
    }
}
