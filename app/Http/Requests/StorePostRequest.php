<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function rules()
    {
        $rules = [
            'title' => 'required',
            'image' => 'required',
        ];
        return $rules;


    }

    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'image.required' => 'Chưa chọn ảnh',

        ];
    }


}


