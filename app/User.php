<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts(){
        return $this->hasMany(Post::class);
    }
    
    public function followings(){
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    
    public function followers(){
        return $this->belongsToMany(User::class, 'user_follow',  'follow_id', 'user_id')->withTimestamps();
    }
    
    
    public function loadRelationshipCounts(){
        $this->loadCount(['posts', 'followings', 'followers']);
    }
    
    
    public function follow($user_Id){
        $exist = $this->is_following($user_Id);
        $its_me = $this->id == $user_Id;
        
        if($exist || $its_me){
            return false;
        }else{
            $this->followings()->attach($user_Id);
            return true;
        }
    }
    
    
    public function unfollow($user_Id){
        $exist = $this->is_following($user_Id);
        $its_me = $this->id == $user_Id;
        
        if($exist || !$its_me){
            $this->followings()->detach($user_Id);
            return true;
        }else{
            return false;
        }
    }
    
    public function is_following($user_Id){
        return $this->followings()->where('follow_id', $user_Id)->exists();
        
    }
    
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
