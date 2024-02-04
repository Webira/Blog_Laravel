<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";

    protected $fillable = [
            'title',
            'content',
            'image', 
            //'user_id',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($post) {
            if (request()->category && !request()->routeIs('categories.*'))
                $post->category()->associate(Category::find(request()->category));
            $post->user()->associate(auth()->user()->id);
        });
        self::updating(function ($post){
            $post->category()->associate(request()->category);
            $post->user()->associate(auth()->user()->id);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
        
    }
    public function getTitleAttribute($attribute)
    {
        return Str::title($attribute);
    }


}
