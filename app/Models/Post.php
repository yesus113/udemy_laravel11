<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'category_id', 'description', 'posted', 'image'];

   public function category()  {
    return $this->belongsTo(Category::class);

   }
}
