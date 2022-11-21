<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Contracts\Session\Session as Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function getLogin()
    {
        return view('auth.login'); // return đến resources/views/auth...
    }
    public function postLogin(Request $request)
    {
        //    dd($request->all());
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        //thông báo tiếng Việt
        $messages = [
            'email.required' => 'Hãy nhập Email!',
            'email.email' => 'Hãy nhập đúng định dạng Email!',
            'password.required' => 'Hãy nhập Mật khẩu!',

        ];

        // Validation
        $validator = Validator::make($request->all(), $rules, $messages);
        // Nếu sai
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator);
        }
        // nếu đúng
        else{
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('test');
        }
         else{
        Session::flash('error', 'Sai Email và Mật Khẩu');
        return redirect('login');
         }
    }}

    public function getLogout(){
       Auth::logout();
       return redirect('login');
    }


}
