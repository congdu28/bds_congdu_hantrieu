<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request){
        $test = new Category();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $test->loadListWithPager($this->v['extParams']);
        $test1 = new News();
        $this->v['news'] = $test1->loadListWithPager($this->v['extParams']);
        return view('client.index', $this->v);
    }
}

