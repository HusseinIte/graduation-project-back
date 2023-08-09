<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Services\Users\AdminService;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function showAdminLogin()
    {
        return $this->adminService->showAdminLogin();
    }

    public function login(LoginRequest $request)
    {
        return $this->adminService->login($request);
    }

    public function logout()
    {
        $this->adminService->logout();
    }
}
