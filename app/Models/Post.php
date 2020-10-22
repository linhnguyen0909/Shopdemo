<?php

namespace App\Models;


use App\Traits\HasUuid;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUuid;
    protected $table = 'posts';
    protected $fillable = [
        'title', 'description'
    ];
public function users(){
    return $this->belongsTo(User::class);
}
}
