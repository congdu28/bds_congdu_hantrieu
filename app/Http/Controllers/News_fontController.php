<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class News_fontController extends Controller
{
    public function index(){
        return view('news_font.index');
    }
}
