<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    //
    public function handleSubscribe(Blog $blog){
        $user = User::find(auth()->id());
        if($user->isSubscribe($blog)){
            $user->subscribeBlogs()->detach($blog->id);
        }else{
            $user->subscribeBlogs()->attach($blog->id);
        }
        return back();
    }
}
