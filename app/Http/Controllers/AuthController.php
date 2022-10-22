<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'username' => 'required',
                    'password' => 'required',
                ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors(),
                ], 401);
            }

            if (!Auth::attempt($request->only(['username', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Username & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('username', $request->username)->first();
            if ($user->status == "suspended") {
                return response()->json([
                    'status' => false,
                    'message' => 'Username suspended.',
                ], 401);
            }
            // return redirect()->intended('admin/dashboard');
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("auth_token")->plainTextToken,
                'token_type' => 'Bearer',
            ], 200);

           

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Register User
     * @param Request $request
     * @return User
     */
    public function register(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'last_name' => 'required',
                    'username' => 'required|string|max:255|unique:users,username',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6',
                    'status' => 'required',
                    'dni' => 'required|string|unique:users',
                ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validateUser->errors(),
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
                'dni' => $request->dni,

            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("auth_token")->plainTextToken,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ],
        ]);
    }

}
