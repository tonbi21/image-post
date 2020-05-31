<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    //ユーザの一覧表示
    public function index(){
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users
        ]);
    }
    
    //ユーザ詳細
    public function show($id){
        $user = User::findOrFail($id);
        
        return view('users.show', [
            'user' => $user
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
