<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function favorite($id){
        \Auth::user()->favorite($id);
        
        return back();
        
    }
    
    public function unfavorite($id){
        \Auth::user()->unfavorite($id);
        
        return back();
    }
}
