<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Test;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    // // ds danh mục
    // public function listCategory(Request $request)
    // {
    //     $test = new Category();
    //     $this->v['extParams'] = $request->all();
    //     $this->v['title'] = 'Danh Mục';
    //     $this->v['list'] = $test->loadListWithPager($this->v['extParams']);
    //     $this->v['category'] = $test->loadListWithPager($this->v['extParams']);
    //     return view('test.category', $this->v);

    // }

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
            if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid())
            {
                $params['cols']['hinh'] = $this->uploadFile($request->file('cmt_mat_truoc'));
            }
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

    // up ảnh
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('cmnd',$fileName,'public');
    }

    public function detail($id, Request $request){
        $this->v['_title'] = "Chi tiết Người dùng";
        $modelNguoiDung = new Test();
        $objItem = $modelNguoiDung->loadOne($id);
        // dd($objItem);
        $this->v['objItem'] = $objItem;
        return view('test.detail',$this->v);
    }

    public function update($id,TestRequest $request){
        $method_route = 'route_BackEnd_test_detail';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;
        unset($params['cols']['_token']);
        if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid())
        {
            $params['cols']['hinh'] = $this->uploadFile($request->file('cmt_mat_truoc'));
        }
        if(is_null($params['cols']['password'])){
            $params['cols']['password'] =  Hash::make($params['cols']['id']);
        }
        $modelNguoiDung = new Test();
        $res =$modelNguoiDung->saveUpdate($params);
        if($res == null){
            return redirect()->route($method_route,['id'=>$id]);
        }elseif($res == 1){
            Session::flash('success','Cập nhật bản ghi '.$id.' thành công');
            return redirect()->route($method_route,['id'=>$id]);
        }else{
            Session::flash('error','Không thể cập nhật bản ghi'.$id);
            return redirect()->route($method_route,['id'=>$id]);
        }

    }
}
