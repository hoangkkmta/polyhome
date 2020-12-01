<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'status',
        'like',
        'category_id',
        'author_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Admin::class, 'author_id', 'id');
    }
}
