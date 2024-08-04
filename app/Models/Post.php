<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'short_description',
        'content',
        'img_url'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
