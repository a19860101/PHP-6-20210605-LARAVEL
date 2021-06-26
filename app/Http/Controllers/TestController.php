<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    function qwerty($id,$user){
        // return view('qwerty')->with(['qq'=>$id]);
        // return view('qwerty',['qq'=>$id,'user'=>$user]);
        return view('qwerty',compact('id','user'));
        // return $id;
    }
    function qwerty_qwerty(){
        return 'qwerty qwerty';
    }
}
