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
        'name', 'email', 'password', 'introduction', 'user_image_file_name'
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
    
    
    public function favorites(){
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimestamps();
    }
    
    
    public function loadRelationshipCounts(){
        $this->loadCount(['posts', 'followings', 'followers', 'favorites']);
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
    
    
    public function feed_posts(){
        $userIds = $this->followings()->pluck('users.id')->toArray();
        $userIds[] = $this->id;
        
        return Post::whereIn('user_id', $userIds);
    }
    
    
    public function favorite($post_id){
        $exist = $this->is_favorites($post_id);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($post_id);
            return true;
           
        }
    }
    
    
    public function unfavorite($post_id){
        $exist = $this->is_favorites($post_id);

        if($exist){
            $this->favorites()->detach($post_id);
            return true;
        }else{
            return false;
        }
    }
    
    
    public function is_favorites($post_id){
        return $this->favorites()->where('post_id', $post_id)->exists();
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
