<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request,ProductFilter $filter){
        return Product::filter()->get();
    }
}
