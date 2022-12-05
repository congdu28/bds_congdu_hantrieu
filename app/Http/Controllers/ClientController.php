<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index(Request $request){
        $category = new Category();
        $this->v['extParams'] = $request->all();
        $this->v['title'] = 'DANH MỤC';
        $this->v['list'] = $category->loadListWithPager($this->v['extParams']);
        $this->v['user'] = $category->loadListWithPager($this->v['extParams']);
        return view('client.index');
    }
}

