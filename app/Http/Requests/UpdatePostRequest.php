<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'id' => 'required',
        ];
        return $rules;


    }

    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'id.required' => 'Thieu tham so',
        ];
    }

}
