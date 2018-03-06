<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
