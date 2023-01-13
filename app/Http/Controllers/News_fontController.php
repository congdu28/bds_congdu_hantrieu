<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\News;
use Illuminate\Http\Request;

class News_fontController extends Controller
{
    public function index(Request $request){
        $new = new News();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'TIN TỨC';
        $this->v['news'] = $new->loadListWithPager($this->v['extParams']);
        $banner = new Banner();
        $this->v['banner'] = $banner->loadListWithPager($this->v['extParams']);
        return view('news_font.index', $this->v);
    }
    public function detailNews_font($id, Request $request){
        $this->v['_title'] = "Chi tiết Tin tức";
        $modelNews = new News();
        $objItem = $modelNews->loadOne($id);
        // dd($objItem);
        $this->v['objItem'] = $objItem;
        return view('news_font.detailNews_font',$this->v);
    }
    public function listBanner(Request $request){
        $banner = new Banner();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'BANNER';
        $this->v['banner'] = $banner->loadListWithPager($this->v['extParams']);
        return view('news_font.index', $this->v);
    }
}
