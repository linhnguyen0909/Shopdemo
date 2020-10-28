<?php

namespace App\Models;

use App\Traits\HasUuid;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasUuid;

    protected $table = 'books';
    protected $fillable = ['user_id', 'title', 'description'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
