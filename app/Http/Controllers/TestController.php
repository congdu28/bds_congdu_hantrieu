<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    // danh sách người dùng
    public function index(Request $request)
    {
        $test = new Test();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'TRANG CHỦ';
        $this->v['list'] = $test->loadListWithPager($this->v['extParams']);
        $this->v['user'] = $test->loadListWithPager($this->v['extParams']);
        return view('test.index', $this->v);

    }

    // tạo 1 phương thức bất kì hiển thi tên

    public function add(TestRequest $request)
    {
        // tạo ra 1 file request và viết validate trong đấy
        // php artisan make:request NameRequest
        $method_route = "route_BackEnd_test_add";
        $this->v['_title'] = 'Thêm người dùng';
        if ($request->isMethod('post')) {
            // dd($request->post()); // data mà post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelTest = new Test();
            $res = $modelTest->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công!');
            } else {
                Session::flash('error', 'Lỗi thêm mới người dùng!');
            }
        }
        return view('test.add', $this->v);
    }
}
