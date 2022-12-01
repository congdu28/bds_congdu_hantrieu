<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function addNews(Request $request){
        $this->v['_title'] = 'Thêm Tin Tức';
        $method_route = "route_BackEnd_news_addNews";
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
            $modelNews = new News();
            $res = $modelNews->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới Tin tức thành công!');
            } else {
                Session::flash('error', 'Lỗi thêm mới Tin tức!');
            }
        }

        return view('news.addNews',$this->v);
    }
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('imagesNews',$fileName,'public');
    }

    public function listNews(Request $request){
        $news = new News();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'TIN TỨC';
        $this->v['list'] = $news->loadListWithPager($this->v['extParams']);
        $this->v['user'] = $news->loadListWithPager($this->v['extParams']);
        return view('news.listNews', $this->v);
    }

    public function detailNews($id, Request $request){
        $this->v['_title'] = "Chi tiết Tin tức";
        $modelNews = new News();
        $objItem = $modelNews->loadOne($id);
        // dd($objItem);
        $this->v['objItem'] = $objItem;
        return view('news.detailNews',$this->v);
    }

    public function updateNews($id,NewsRequest $request){
        $method_route = 'route_BackEnd_news_detailNews';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;

        unset($params['cols']['_token']);
        if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid())
        {
            $params['cols']['images'] = $this->uploadFile($request->file('cmt_mat_truoc'));
        }
        // if(is_null($params['cols']['password'])){
        //     $params['cols']['password'] =  Hash::make($params['cols']['id']);
        // }
        $modelNews = new News();
        $res =$modelNews->saveUpdate($params);
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
