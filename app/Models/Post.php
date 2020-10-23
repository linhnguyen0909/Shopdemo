<?php

namespace App\Models;


use App\Traits\AuthRelationship;
use App\Traits\HasUuid;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasUuid;
    use AuthRelationship;

    protected $table = 'posts';
    protected $fillable = [
        'title', 'description'
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
