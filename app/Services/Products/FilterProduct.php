<?php


namespace App\Services\Products;


use App\Http\Resources\Product\ProductFilterCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category\Category;
use App\Models\Product\FrameAttribute;
use App\Models\Product\Product;
use http\Exception;

class FilterProduct
{

    public function getKidsProduct()
    {
        $Frame = FrameAttribute::where('frameClass', 'أطفال')->get();
        $menFrames = $Frame->map(function ($menFram) {
            return $menFram->product;
        });
        return response()->json([
            'status' => 'success',
            'products' => ProductResource::collection($menFrames)
        ]);
    }

    public function getMenProduct()
    {
        $Frame = FrameAttribute::where('frameClass', 'رجالي')->get();
        $menFrames = $Frame->map(function ($menFram) {
            return $menFram->product;
        });
        return response()->json([
            'status' => 'success',
            'products' => ProductResource::collection($menFrames)
        ]);
    }

    public function getWomenProduct()
    {
        $Frame = FrameAttribute::where('frameClass', 'نسائي')->get();
        $menFrames = $Frame->map(function ($menFram) {
            return $menFram->product;
        });
        return response()->json([
            'status' => 'success',
            'products' => ProductResource::collection($menFrames)
        ]);

    }

    public function getFrameProducts()
    {
//        category 1
        $category = Category::find(1);
        $products = $category->products;
        return ProductResource::collection($products);

    }

    public function getDevicesProducts()
    {
//        category 2
        $category = Category::find(2);
        $products = $category->products;
        return ProductResource::collection($products);

    }

    public function getLensesProducts()
    {
//        category 3
        $category = Category::find(3);
        $products = $category->products;
        return ProductResource::collection($products);
    }

    public function searchProduct($numberModel)
    {
        try {
            $products = Product::where('numberModel', $numberModel)->get();
            return ProductResource::collection($products);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()]);
        }
    }

    public function getProductByCategory($category_id)
    {
        $category = Category::find($category_id);
        $products = $category->products;
        return ProductResource::collection($products);
    }

    public function getProductByCategoryAndSubCategory($category_id, $subCategory_id)
    {
        if ($subCategory_id == 1) {
            $Frame = FrameAttribute::where('frameClass', 'رجالي')->get();
            $menFrames = $Frame->map(function ($menFram) {
                return $menFram->product;
            });
            return response()->json([
                'status' => 'success',
                'products' => ProductResource::collection($menFrames)
            ]);
        } elseif ($subCategory_id == 2) {
            $Frame = FrameAttribute::where('frameClass', 'أطفال')->get();
            $menFrames = $Frame->map(function ($menFram) {
                return $menFram->product;
            });
            return response()->json([
                'status' => 'success',
                'products' => ProductResource::collection($menFrames)
            ]);
        } else {
            $Frame = FrameAttribute::where('frameClass', 'نسائي')->get();
            $menFrames = $Frame->map(function ($menFram) {
                return $menFram->product;
            });
            return response()->json([
                'status' => 'success',
                'products' => ProductResource::collection($menFrames)
            ]);
        }

    }
}
