<?php

namespace App\Transformers;

use App\Models\Post;
use Flugg\Responder\Transformers\Transformer;

class PostTransformer extends Transformer
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
     * @param  \App\Models\Post  $post
     * @return array
     */
    public function transform(Post $post):array
    {
        return [
            'id' => (string) $post->id,
            'user_id' => (string) $post->user_id,
            'title' => (string) $post->title,
            'descripton' => (string) $post->description,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ];
    }
}
