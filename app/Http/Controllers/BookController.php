<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\User;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        return User::query()->where('name', 'like', '%'.$request->name.'%')
            ->when($request->title, function ($query) use ($request) {
                $query->whereHas('books', function ($query) use ($request) {
                    $query->where('title', 'like', $request->title);
                });
            })
->get();

//    public function index(ModelFilters $modelFilters)
//    {
//        if (!empty($modelFilters->filters())) {
//
//            $perpage = Request::input('name');
//            Request::offsetUnset('name');
//            $users = User::filter($modelFilters)->with('book')->orderByDesc('id')->paginate($perpage, ['*'], 'page');
//        } else {
//            $users = User::with('book')->orderByDesc('id')->paginate(10);
//        }
//    }
    }
}
