<?php

namespace App\Models;

use App\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    use OverridesBuilder;

    protected $fillable = [
        'name', 'guard_name','display_name','description'
    ];
}
