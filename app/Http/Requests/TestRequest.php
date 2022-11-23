<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
    {    
        // nơi viết validate
         $rules =[];
         // lấy ra tên phương thức đang hoạt động
         $currentAction = $this->route()->getActionMethod();
         switch($this->method()):
           case 'POST':
             switch ($currentAction){
                case 'add':
                    $rules = [
                        "email"=>'required|unique:users', // kiểm tra email đã tồn tại chưa
                        "user_name"=>'required',
                        "password"=>'required',
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
            'email.required'=>'Hãy nhập Email!',
            'email.unique'=>'Email này đã được sử dụng!',
            'user_name.required'=>'Hãy nhập Tên!',
            'password.required'=>'Hãy nhập Mật khẩu!',
            ];
    }

}
