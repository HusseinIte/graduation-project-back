<?php


namespace App\Services\Shopping;


use App\Http\Resources\Product\CartItemResourse;
use App\Models\Product\LensesAttribute;
use App\Models\Shopping\CartItem;
use App\Models\Shopping\ShoppingSession;
use App\Models\User\User;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;
use function Symfony\Component\HttpFoundation\Session\Storage\Handler\beginTransaction;
use function Symfony\Component\HttpFoundation\Session\Storage\Handler\rollback;

class CartService
{
    public function getCartForUser()
    {
        $user = Auth::user();
        return $user->cart;
    }

    public function updateTotalPriceCart(CartItem $cartItem)
    {
        $product = $cartItem->product;
        $cart = $cartItem->cart;
        $oldTotal = $cart->totalPrice;
        $cart->totalPrice = $oldTotal + ($cartItem->quantity * $product->price);
        $cart->save();
    }

    public function addToCart($id)
    {

        $cart = $this->getCartForUser();
        try {
            $cartItem = CartItem::create([
                'product_id' => $id,
                'cart_id' => $cart->id,
                'quantity' => 1
            ]);
        } catch (QueryException $e) {
            $errorMessage = 'هذا المنتج مضاف إلى السلة';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        $this->updateTotalPriceCart($cartItem);
        return response()->json([
            'status' => 'success',
            'message' => 'تم إضافة المنتج إلى السلة'
        ]);


    }

//    public function getCartItem()
//    {
//        $cart = $this->getCartForUser();
//        return response()->json([
//            'status' => 'success',
//            'totalPrice' => $cart->totalPrice,
//            'Item' => CartItemResourse::collection($cart->cartItems)
//        ]);
//    }

    public function getLensesToAddCart(Request $request)
    {
        $lenses = LensesAttribute::where([
            ['spherical', $request->spherical],
            ['cylinder', $request->cylinder],
            ['lensesClass', $request->lensesClass],
            ['classType', $request->classType]])->get();

        return $lenses;

    }

    public function addLensesToCart(Request $request)
    {
        $lensesProduct = $this->getLensesToAddCart($request);
        if ($lensesProduct->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'هذا المنتج غير موجود'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'lenses' => $lensesProduct->first(),
            'product' => $lensesProduct->first()->product
        ]);

    }
}
