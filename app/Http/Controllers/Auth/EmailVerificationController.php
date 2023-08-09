<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailNotificationRequest;
use App\Http\Resources\CustomerResource;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmailVerificationController extends Controller
{

    public function email_verification(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $validate = $this->validateVerificationCode($user, $request->code);
        if (!$validate) {
            return response()->json([
                'status' => 'error',
                'message' => 'هذا الكود غير صحيح'
            ]);
        }
        $user->email_verified_at = now();
        $user->is_verified = true;
        $user->save();
        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'customer' => new CustomerResource($user->customer),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function validateVerificationCode($user, $code)
    {
        $verification_code = $user->verification_code;
        if ($verification_code == $code) {
            return true;
        }
        return false;
    }
}
