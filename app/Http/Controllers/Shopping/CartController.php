<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Services\Shopping\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function getCartItem()
    {
        return $this->cartService->getCartItem();
    }

    public function addToCart($id)
    {
        return $this->cartService->addToCart($id);
    }

    public function addLensesToCart(Request $request)
    {
        return $this->cartService->addLensesToCart($request);
    }

// parameter : id for cart Item
    public function minusQuantityItem($id)
    {
        return $this->cartService->minusQuantityItem($id);
    }

    public function plusQuantityItem($id)
    {
        return $this->cartService->plusQuantityItem($id);
    }

}
