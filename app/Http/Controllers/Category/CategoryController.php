<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Services\Products\FilterProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $filterProduct;

    public function __construct(FilterProduct $filterProduct)
    {
        $this->filterProduct = $filterProduct;
    }

    public function getCategory()
    {
        return Category::with('subcategories')->get();
    }

    public function getProductByCategory($category_id)
    {
       return $this->filterProduct->getProductByCategory($category_id);
    }

    public function getProductByCategoryAndSubCategory($category_id, $subCategory_id)
    {
        return $this->filterProduct->getProductByCategoryAndSubCategory($category_id, $subCategory_id);
    }

}
