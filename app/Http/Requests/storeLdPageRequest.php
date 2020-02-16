<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeLdPageRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $roles = [
            'title' => 'required',
        ];
        if($this->type == 1 && ($this->position == 1 || $this->position ==2)){
            $roles['image'] = 'required';
        }
        return $roles;
    }
    public function messages()
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'image.required' => 'Chưa chọn ảnh',


        ];
    }
}
