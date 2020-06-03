<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //ユーザの一覧表示
    public function index(){
        if(\Auth::check()){
            $users = User::orderBy('id', 'desc')->paginate(10);
        }
        
        return view('users.index', [
            'users' => $users
        ]);
    }
    
    //ユーザ詳細
    public function show($id){
        if(\Auth::check()){
            $user = User::findOrFail($id);
            $posts = $user->posts()->orderBy('id', 'desc')->paginate();
            $user->loadRelationshipCounts();
        }
        return view('users.show', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
    
    //ユーザのプロフィール編集フォーム
    public function edit($id){
        
    }
    
    //ユーザのプロフィール編集
    public function update($id){
        
    }
    
    //ユーザの退会
    public function destroy($id){
        
    }
    
    
}
