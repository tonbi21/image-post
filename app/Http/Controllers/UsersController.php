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
            $users = User::orderBy('id', 'desc')->paginate(100);
            $user = \Auth::user();
        }
        
        return view('users.index', [
            'users' => $users,
            'user' => $user
        ]);
    }
    
    //ユーザ詳細
    public function show($id){
        if(\Auth::check()){
            $user = User::find($id);
            $posts = $user->posts()->orderBy('id', 'desc')->paginate(99);
            $user->loadRelationshipCounts();
        }
        return view('users.show', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
    
    //ユーザのプロフィール編集フォーム
    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }
    
    //ユーザのプロフィール編集
    public function update(Request $request, User $user){
        
        $validator = Validator::make($request->all(), [
            // 'file' => 'required|max:10240|mimes:jpeg,gif,png',
            'file' => 'max:10240|mimes:jpeg,gif,png',
            
        ]);
        
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        
        if($request->has('file')) {
            
            $file = $request->file('file');
            // dd($file);
            $path = Storage::disk('s3')->putFile('/', $file, 'public');
            
            $user->user_image_file_name = $path;
        }
        
        
        
        $user->name = $request->name;
        $user->introduction = $request->introduction;
        $user->save();
        
        return redirect('users/' . $user->id);
    }
    
    //ユーザの退会
    public function destroy($id){
        $user = User::findOrFail($id);
        $posts = $user->posts();
        if(\Auth::id() === $user->id){
            $posts->delete();
            $user->delete();
        }
       
        return redirect('/');
        
    }
    
    public function followings($id){
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followings = $user->followings()->paginate(100);
        
        return view('users.followings',[
            'user' => $user,
            'users' => $followings
        ]);
        
        
    }
    
    
    public function followers($id){
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followers = $user->followers()->paginate(100);
        
        return view('users.followers', [
            'user' => $user,
            'users' => $followers
        ]);
    }
    
    
    public function favorites($id){
        if(\Auth::check()){
            $user = User::findOrFail($id);
            $favorites = $user->favorites()->orderBy('id', 'desc')->paginate(90);
            $user->loadRelationshipCounts();
        }
        return view('users.favorites', [
            'user' => $user,
            'posts' => $favorites
        ]);
    }
}
