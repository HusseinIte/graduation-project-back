<?php


namespace App\Services\Products;


use App\Models\Product\Product;

class AdminProductService
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', ['products' => $products]);
    }

    public function getProductDetails($id)
    {
        $product = Product::find($id);
        return view('admin.product.product_details', ['product' => $product]);
    }
}
