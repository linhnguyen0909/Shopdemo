<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignRoleRequest;
use App\User;
use Illuminate\Support\Arr;

class UserRoleController extends ApiController
{
    public function update(AssignRoleRequest $request, User $user)
    {
        $data = $request->validated();
        $user->syncRoles(Arr::get($data, 'roles', []));
        return $this->httpNoContent();
    }
}
