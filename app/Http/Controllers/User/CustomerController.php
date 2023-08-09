<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Services\Order\CustomerOrderService;
use App\Services\Users\CustomerService;
use App\Services\Users\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;

    }

    public function index()
    {
        return $this->customerService->index();
    }

    public function register(Request $request)
    {
        return $this->customerService->register($request);
    }

    public function getMyInformation()
    {
        return $this->customerService->getMyInformation();
    }

    public function getCustomerDetails($id)
    {
        return $this->customerService->getCustomerDetails($id);
    }

    public function viewCustomerDetails($id)
    {
        return $this->customerService->viewCustomerDetails($id);
    }
    public function noty()
    {

        $notifications = Auth::user()->notifications();

        return auth()->user()->unreadNotifications;
    }
    public function ReadNotification($id)
    {
        $userUnreadNotification = auth()->user()
                                    ->unreadNotifications
                                    ->where('id', $id)
                                    ->first();
        
        if($userUnreadNotification) 
        {
             $userUnreadNotification->markAsRead();
        }
        return "success";
    }
    public function MarkAsRead_all ()
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) 
        {
            $userUnreadNotification->markAsRead();
            return "success";
            
        }
    }
}
