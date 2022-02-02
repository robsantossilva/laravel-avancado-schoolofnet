<?php

namespace Robsantossilva\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //use HasFactory;

    protected $fillable = [];

    protected function getAuthorAttribute()
    {
        return 'Robson Silva';
    }

    // protected static function newFactory()
    // {
    //     return \Robsantossilva\Blog\Database\factories\PostFactory::new();
    // }
}
