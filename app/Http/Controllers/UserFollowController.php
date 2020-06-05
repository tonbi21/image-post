<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    public function follow($id){
        //Userモデルに定義したfollow()を呼び出し
        \Auth::user()->follow($id);
        return back();
    }
    
    public function unfollow($id){
        //Userモデルに定義したfunollow()を呼び出し
        \Auth::user()->unfollow($id);
        return back();
    }
}
