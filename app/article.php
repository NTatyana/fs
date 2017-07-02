<?php

namespace App;

use App\Categorie;
use App\Tag;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table = 'articles';

    public function categories (){
        return $this->hasOne('App\Categorie', 'id', 'categories_id');
    }
    public function tags (){
        return $this->belongsToMany('App\Tag', 'article_tags', 'article_id', 'tag_id');
    }

    public function comments (){
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }

}
