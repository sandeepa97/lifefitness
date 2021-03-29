<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function index2(){
        return view('home.index2');
    }
    public function about(){
        return view('home.about');
    }
    public function contact(){
        return view('home.contact');
    }
}
