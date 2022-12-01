<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function addBanner(Request $request){
        $this->v['_title'] = 'Thêm Banner';
        $method_route = "route_BackEnd_banner_addBanner";
        if ($request->isMethod('post')) {
            // dd($request->post()); // data mà post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            // dd($params['cols']);
            unset($params['cols']['_token']);
            if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid())
            {
                $params['cols']['images'] = $this->uploadFile($request->file('cmt_mat_truoc'));
            }
            $modelBanner = new Banner();
            $res = $modelBanner->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới Banner thành công!');
            } else {
                Session::flash('error', 'Lỗi thêm mới Banner!');
            }
        }

        return view('banner.addBanner',$this->v);
    }
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('imagesBanner',$fileName,'public');
    }

    public function listBanner(Request $request){
        $banner = new Banner();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'BANNER';
        $this->v['list'] = $banner->loadListWithPager($this->v['extParams']);
        $this->v['user'] = $banner->loadListWithPager($this->v['extParams']);
        return view('banner.listBanner', $this->v);
    }

    public function detailBanner($id, Request $request){
        $this->v['_title'] = "Chi tiết Banner";
        $modelBanner = new Banner();
        $objItem = $modelBanner->loadOne($id);
        // dd($objItem);
        $this->v['objItem'] = $objItem;
        return view('banner.detailBanner',$this->v);
    }

    public function updateBanner($id,BannerRequest $request){
        $method_route = 'route_BackEnd_banner_detailBanner';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;
        unset($params['cols']['_token']);
        if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid())
        {
            $params['cols']['images'] = $this->uploadFile($request->file('cmt_mat_truoc'));
        }
        $modelBanner = new Banner();
        $res =$modelBanner->saveUpdate($params);
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
