<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Transformers\UserTransformer;
use App\User;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;
use Illuminate\Http\Request;

class UserController extends ApiController
{
//        public function __construct()
//        {
//            $this->authorizeResource(User::class);
//        }
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @param  UserFilter  $userFilter
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, UserFilter $userFilter)
    {
        return $this->httpOK(User::query()->filter($userFilter), UserTransformer::class)->only('email','name');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function destroy($id)
    {
        //
    }


}
