<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Dotenv\Result\Success;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\False_;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return  response()->json(['message'=>'Success','data'=>$article],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= $this->validateArticle();
        if($validator->fails()){
            return response()->json(['messages'=>$validator->messages(),'data'=>null],400);
        }
        if (Article::created($validator->validate())){
            return response()->json(['message'=>'Article Create','data'=>$validator->validate()],200);
        }
        return response()->json(['message'=>'Error','data'=>null],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return response()->json(['message'=>'Sussess','data'=>$article],200);
    }
    public function show_comment(Article $article){
        $comment=$article->comments();
        if (count($comment)>0){
            return response()->json(['message'=>'Sussess','data'=>$comment],200);
        }
        return response()->json(['message'=>'No Comment Found','data'=>null],200);

    }
    public function show_best_comment(Article $article){
        $comment = Comment::find($article->set_best_id);
        return response()->json(['message'=>'Success','data'=>$comment],200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy(Article $article)
    {
        if ($article->delete()){
            return response()->json(['message'=>'Article Delete','data'=>null],200);
        }
        return response()->json(['message'=>'Error','data'=>null],200);
    }
    public function validateArticle(){
        return Validator::make(request()->all(),[
            'title'=>'required|string|min:3|max:255',
            'slug'=>'required|string|min:3|max:25',
            'body'=>'required|string|min:5|max:255',
        ]);

    }
}
