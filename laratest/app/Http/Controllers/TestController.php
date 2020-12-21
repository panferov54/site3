<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index(){
     //   return '<h1 class="text-info">Text from index controller</h1>';
        $r=rand(0,1000);
        $countries=['RUS','ITA','SPA','BEL','USA'];
  return view('test.index',['data1'=>$r,'data2'=>$countries]); //test - папка index - файл
    }
}
