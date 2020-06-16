<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index(){
        $data = [];
        
        if (\Auth::check()){
            $users = User::orderBy('id', 'desc')->paginate(5);
            $user = \Auth::user();
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(70);
            
            $data = [
                'users' => $users,
                'user' => $user,
                'posts' => $posts
            ];
        }
        return view('welcome', $data);
    }
    
    
    
    public function create(){
         $post = new Post;
         return view('posts.create', ['post' => $post]);
         
    }
    
    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240|mimes:jpeg,gif,png',
            'content' => 'required|max:191'
        ]);
        
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        
        $file = $request->file('file');
        // dd($file);
        $path = Storage::disk('s3')->putFile('posts/'.\Auth::id(), $file, 'public');
        Post::create([
            'user_id' => \Auth::user()->id,
            'image_file_name' => $path,
            'content' => $request->content
        ]);
            
         return redirect('/');
    }
    
   
    public function destroy($id){
        $post = \App\Post::findOrFail($id);
        
        if(\Auth::id() === $post->user_id){
            $post->delete();
        }
        
        return redirect('/');
    }
}
