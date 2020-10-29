<?php

namespace App\Transformers;

use App\Models\Product;
use Flugg\Responder\Transformers\Transformer;

class ProductTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'user'=>UserTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the data.
     *
     * @param  mixed $data
     * @return array
     */
    public function transform(Product $product):array
    {
        return [

        ];
    }
}
