<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Project;
use Illuminate\Http\Request;

class Project_fontController extends Controller
{
    public function index(Request $request){
        $project = new Project();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'Dự án';
        $this->v['list'] = $project->loadListWithPager($this->v['extParams']);
        $banner = new Banner();
        $this->v['banner'] = $banner->loadListWithPager($this->v['extParams']);
        return view('project_font.index', $this->v);
    }
    public function detailProject_font($id, Request $request){
        $this->v['_title'] = "Chi tiết Dự Án";
        $modelProject = new Project();
        $objItem = $modelProject->loadOne($id);
        // dd($objItem);
        $this->v['objItem'] = $objItem;
        return view('project_font.detailProject_font',$this->v);
    }
}
