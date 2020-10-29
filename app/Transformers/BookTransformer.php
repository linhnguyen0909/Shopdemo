<?php

namespace App\Transformers;


use App\Models\Book;
use Flugg\Responder\Transformers\Transformer;

class BookTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Models\Book $book
     * @return array
     */
    public function transform(Book $book)
    {
        return [
//            'id' => (string) $book->id,
//            'user_id' => (string) $book->user_id,
            'title' => (string) $book->title,
//            'description' => (string) $book->description,
//            'created_at' => $book->created_at,
//            'updated_at' => $book->updated_at,
//            'deleted_at' => $book->deleted_at,
        ];
    }
}
