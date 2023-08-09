<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductFilterCollection extends ResourceCollection
{
    public function toArray(Request $request)
    {

        return $this->collection->map(function ($productAtt) {
            $product = $productAtt->product;
            return new ProductResource($product);
        });

    }
}
