<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class Project_fontController extends Controller
{
    public function index(Request $request){
        $project = new Project();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'TIN TỨC';
        $this->v['list'] = $project->loadListWithPager($this->v['extParams']);
        return view('project_font.index', $this->v);
    }
}
