<?php


namespace App\Services\Users;


use App\Http\Resources\UserResource;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public function storeUser(Request $request, $user_type)
    {
        $verification_code = rand(1000,9999);
        //return("ggggggggggggg");
        return User::create([
            'user_type_id' => $user_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verification_code
        ]);

    }

    public function login(Request $request)
    {
        //return("bnvnvbnvb");
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        if ($user->is_verified) {
            return response()->json([
                'status' => 'success',
                'user' => new UserResource($user),
                //'user_id' => new UserResource($user->id),
                //'user_type' => new UserResource($user->user_type),
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'الرجاء إدخال كود التحقق'
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
}
