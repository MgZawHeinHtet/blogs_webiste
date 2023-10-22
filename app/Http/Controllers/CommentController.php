<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Blog;
class CommentController extends Controller
{
    //

    
    public function store(Blog $blog){
        request()->validate([
            'body' => ['required','max:300']
        ]);
        $blog->comments()->create(
            [
                'body' => request('body'),
                'user_id' => auth()->user()->id,
            ]
        );
        return back();
    }

    public function destory(Comment $comment){
        $comment->delete();
        return back()->with('success','Delete Successfully!');
    }
    
    public function edit(Comment $comment){
        $page = request('page');
        return redirect("/blogs/{$comment->blog->slug}?page={$page}&edit={$comment->id}");
    }

    public function update(Comment $comment,CommentRequest $request){
     
        $comment->update(['body'=>request('body')]);
        $comment->save();
        
        return redirect("/blogs/{$comment->blog->slug}")->with('success','Updated Successfully!');
    }
}
