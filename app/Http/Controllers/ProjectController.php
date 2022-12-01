<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function addProject(Request $request){
        $this->v['_title'] = 'Thêm Dự Án';
        $method_route = "route_BackEnd_project_addProject";
        $this->v['_title'] = 'Thêm Dự Án';
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
            $modelProject = new Project();
            $res = $modelProject->saveNew($params);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới Dự án thành công!');
            } else {
                Session::flash('error', 'Lỗi thêm mới Dự án!');
            }
        }
        return view('project.addProject',$this->v);
    }
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('imagesProject',$fileName,'public');
    }

    public function listProject(Request $request){
        $project = new Project();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'TIN TỨC';
        $this->v['list'] = $project->loadListWithPager($this->v['extParams']);
        $this->v['user'] = $project->loadListWithPager($this->v['extParams']);
        return view('project.listProject', $this->v);
    }

    public function detailProject($id, Request $request){
        $this->v['_title'] = "Chi tiết Dự Án";
        $modelProject = new Project();
        $objItem = $modelProject->loadOne($id);
        // dd($objItem);
        $this->v['objItem'] = $objItem;
        return view('project.detailProject',$this->v);
    }

    public function updateProject($id,ProjectRequest $request){
        $method_route = 'route_BackEnd_project_detailProject';
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['id'] = $id;

        unset($params['cols']['_token']);
        if ($request->hasFile('cmt_mat_truoc') && $request->file('cmt_mat_truoc')->isValid())
        {
            $params['cols']['images'] = $this->uploadFile($request->file('cmt_mat_truoc'));
        }
        $modelProject = new Project();
        $res =$modelProject->saveUpdate($params);
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
