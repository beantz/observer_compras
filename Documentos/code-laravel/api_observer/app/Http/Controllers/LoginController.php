<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->only(['email', 'password']);

        if(!$token = auth()->attempt($credentials)) {
            abort(401, 'Unauthorized');
        }

        return response()->json([
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' =>  auth()->factory()->getTTL() * 60
            ]
        ]);
    }
}
