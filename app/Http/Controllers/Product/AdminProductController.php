<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Services\Products\AdminProductService;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    protected $adminProductService;

    public function __construct(AdminProductService $adminProductService)
    {
        $this->adminProductService = $adminProductService;
    }

    public function index()
    {
        return $this->adminProductService->index();
    }

    public function getProductDetails($id)
    {
        return $this->adminProductService->getProductDetails($id);
    }
}
