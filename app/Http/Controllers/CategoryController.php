<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function addCategory(Request $request){
        $this->v['_title'] = 'Thêm Danh Mục';
        $method_route = "route_BackEnd_category_addCategory";
        $this->v['_title'] = 'Thêm danh muc';
        if ($request->isMethod('post')) {
            // dd($request->post()); // data mà post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            // dd($params['cols']);
            unset($params['cols']['_token']);
            $modelCategory = new Category();
            $res = $modelCategory->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới danh mục thành công!');
            } else {
                Session::flash('error', 'Lỗi thêm mới danh mục!');
            }
        }

        return view('category.addCategory',$this->v);
    }

    public function listCategory(Request $request){
        $test = new Category();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'DANH MỤC';
        $this->v['category'] = $test->loadListWithPager($this->v['extParams']);
        $this->v['user'] = $test->loadListWithPager($this->v['extParams']);
        return view('category.listCategory', $this->v);
    }

    public function detailCategory($id, Request $request){
        $this->v['_title'] = "Chi tiết Danh Mục";
        $modelCategory = new Category();
        $objItem = $modelCategory->loadOne($id);
        // dd($objItem);
        $this->v['objItem'] = $objItem;
        return view('category.detailCategory',$this->v);
    }

    public function updateCategory($id,CategoryRequest $request){
        $method_route = 'route_BackEnd_category_detailCategory';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;

        unset($params['cols']['_token']);
        // if(is_null($params['cols']['password'])){
        //     $params['cols']['password'] =  Hash::make($params['cols']['id']);
        // }
        $modelCategory = new Category();
        $res =$modelCategory->saveUpdate($params);
        // dd($params);
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
