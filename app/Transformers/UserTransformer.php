<?php

namespace App\Transformers;

use App\User;
use Flugg\Responder\Transformers\Transformer;

class UserTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'books'=>BookTransformer::class,
        'contacts'=>ContactTransformer::class,
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\User  $user
     * @return array
     */
    public function transform(User $user):array
    {
        return [
            'id' => (string) $user->id,
            'name' => (string) $user->name,
            'email' => (string) $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'deleted_at' => $user->deleted_at,
        ];
    }
}
