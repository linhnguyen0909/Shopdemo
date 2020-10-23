<?php


namespace App\Traits;


use Illuminate\Support\Facades\Auth;

trait AuthRelationship
{
    public static function boot()
    {
        parent::boot();
        if (Auth::id()) {
            static::creating(function ($post) {
                $post->user_id = Auth::id();
            });
        }
    }
}
