<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Http\Requests\CreateUserRequest;
use App\Sorts\UserSort;
use App\Transformers\UserTransformer;
use App\User;
use App\Builders\Builder;
use Flugg\Responder\Responder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends ApiController
{
    public function __construct()
    {
//        $this->middleware('auth:user');

//        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @param  UserFilter  $userFilter
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, UserFilter $userFilter, UserSort $userSort)
    {
        return $this->httpOK(User::query()->filter($userFilter)->sortBy($userSort)->paginate(2),
            UserTransformer::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request, Responder $responder)
    {
        $request->validated();
        $user = new User();
        $user->fill($request->all());
        $user->save();
        return $responder->success($user->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if (Gate::allows('isAmin')) {
            $user->delete();
            return $this->httpNoContent();
        } else {
            return 'You are not Admin';
        }
    }


}
