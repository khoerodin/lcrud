<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content', 'image'
    ];

    // public function getCreatedAtAttribute()
    // {
    //     return \Carbon\Carbon::parse($this->attributes['created_at'])
    //     ->format('d, M Y H:i');
    // }

    // public function getUpdatedAtAttribute()
    // {
    //     return \Carbon\Carbon::parse($this->attributes['updated_at'])
    //     ->diffForHumans();
    // }

    protected static function boot() {
        parent::boot();

        static::deleting(function($book) {
            $book->tags()->detach();
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
