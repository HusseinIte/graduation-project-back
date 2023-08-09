<?php


namespace App\Services\Users;


use App\Http\Requests\User\LoginRequest;

class AdminService
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showAdminLogin()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.showLogin');

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.showLogin');
    }

}
