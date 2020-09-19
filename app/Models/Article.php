<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;

    protected $fillable = ['title', 'description', 'body', 'background', 'user_id'];

    public function getBackgroundAttribute($value)
    {
        return asset($value ? 'storage/' . $value : '/img/post-bg.jpg');
    }

    public function setBackgroundAttribute($value)
    {
        $attribute_name = "background";
        $disk = "public";
        $destination_path = 'backgrounds';

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function path()
    {
        return route('articles.show', $this);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
