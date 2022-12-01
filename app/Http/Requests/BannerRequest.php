<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    { // nơi viết validate
        $rules = [];
        // lấy ra tên phương thức đang hoạt động
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            "banner_name" => 'required',
                            "links" => 'required',
                            "images" => 'required',
                        ];
                        break;

                    default:
                        break;
                }
                break;
        endswitch;

        return $rules;
    }

    public function messages()
    {
        return [
            'banner_name.required' => 'Hãy nhập Tiêu đề!',
            'links.required' => 'Hãy nhập Links!',
            'images.required' => 'Hãy nhập Ảnh!',
        ];
    }
}
