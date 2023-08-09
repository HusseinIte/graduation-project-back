<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function setAttributes()
    {
        $category = $this->category;
        if ($category->id == 3) {
            return $this->lensesAttribute;
        } elseif ($category->id == 1) {
            return $this->frameAttribute;
        } else {
            return $this->deviceAttribute;
        }
    }

    public function setImages($images)
    {
        $images = $images->map(function ($image) {
            return [
                $image->path
            ];
        });
        $mergedArray = array();
        foreach ($images as $subArray) {
            $mergedArray = array_merge($mergedArray, $subArray);
        }
        return $mergedArray;
    }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'productType' => $this->category->name,
            'numberModel' => $this->numberModel,
            'manufactureCompany' => $this->manufactureCompany,
            'amount' => $this->amount,
            'price' => $this->price,
            'images' => $this->setImages($this->images),
            'attribute' => $this->setAttributes()
        ];
    }
}
