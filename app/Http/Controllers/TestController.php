<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    private $v;
    public function __construct()
    {
        $this-> v=[];
    }


    public function index( Request $request){
        $test = new Test();
        $this->v['extParams'] = $request->all();
        $this->v['title'] ='TRANG CHỦ';
        $this->v['list'] = $test->loadListWithPager($this->v['extParams']);
        $this->v['user'] = $test->loadListWithPager($this->v['extParams']);
        return view('test.index',$this->v);
      
        
    }
   
}
