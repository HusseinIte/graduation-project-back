<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use App\Services\Products\FilterProduct;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getAllProduct()
    {
        return $this->productService->getAllProduct();
    }

    public function getProductById($id)
    {
        return $this->productService->getProductById($id);
    }

    public function storeDevice(Request $request)
    {
        return $this->productService->storeDevice($request);
    }

    public function storeLenses(Request $request)
    {
        return $this->productService->storeLenses($request);
    }

    public function storeFrame(Request $request)
    {
        return $this->productService->storeFrame($request);
    }

    public function getKidsProduct(FilterProduct $filterProduct)
    {
        return $filterProduct->getKidsProduct();
    }

    public function getMenProduct(FilterProduct $filterProduct)
    {
        return $filterProduct->getMenProduct();
    }

    public function getWomenProduct(FilterProduct $filterProduct)
    {
        return $filterProduct->getWomenProduct();
    }

    public function searchProduct(FilterProduct $filterProduct, $numberModel)
    {
        return $filterProduct->searchProduct($numberModel);
    }

    public function getFrameProducts(FilterProduct $filterProduct)
    {
        return $filterProduct->getFrameProducts();
    }

    public function getDevicesProducts(FilterProduct $filterProduct)
    {
        return $filterProduct->getDevicesProducts();
    }

    public function getLensesProducts(FilterProduct $filterProduct)
    {
        return $filterProduct->getLensesProducts();
    }

    public function getOneImageProduct($id)
    {
        return $this->productService->getOneImageProduct($id);
    }
    public function deletePrudoct($Prudoct_id)
    {
        return $this->productService->deletePrudoct($Prudoct_id);
    }
}
