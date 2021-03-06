<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }
}
