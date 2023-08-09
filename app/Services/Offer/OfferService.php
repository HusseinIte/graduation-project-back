<?php


namespace App\Services\Offer;


use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferService
{
    public function index()
    {
        $products = Product::all();
        return view('admin.offers.index', ['products' => $products]);
    }

    public function addDiscount(Request $request)
    {
        $validator =
            Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    }

}
