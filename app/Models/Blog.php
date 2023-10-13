<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'intro', 'body', 'reading_time', 'category_id', 'user_id'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeFilter($blogQuery,$filters){
        
        if($search = $filters['search']??null){

            $blogQuery = $blogQuery->where(function($query) use ($search){
                $query-> where('title','LIKE','%'.$search.'%')->orWhere('body',"LIKE",'%'.$search."%");
            });
          
         
        }

        if($category = $filters['category']??null){
        
            $blogQuery->whereHas('category',function($query) use ($category){
                $query->where('slug',$category);
            });
        }
        if($username = $filters['author']??null){
            $blogQuery->whereHas('user',function($query) use ($username){
                $query->where('username',$username);
            });
        }
    }
    public function user()
    {
        return $this->belongsTo((User::class));
    }
}
