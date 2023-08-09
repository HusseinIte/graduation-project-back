<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Services\Offer\OfferService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    protected $offerService;

    public function __construct(OfferService $offerService)
    {
        $this->offerService = $offerService;
    }

    public function index()
    {
        return $this->offerService->index();
    }

    public function addDiscount(Request $request)
    {
        return $this->offerService->addDiscount($request);
    }
}
