<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->only(['email', 'password']);

        //attempt verifica se as credenciais correspondem a um user no banco de dados
        //se bem sucedida retorna um token
        if(!$token = auth()->attempt($credentials)) {
            //lança um exceção http com o codigo 401 e a msg ai
            abort(401, 'Unauthorized');
        }

        /*getTLL pega o tempo de expiração do token e o multiplica por 60 resultando em 3600 seg
        o factory nesse contexto vem do proprio pacote do jwt e é responsavel por criar e configurar o token*/
        return response()->json([
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' =>  auth()->factory()->getTTL() * 60
            ]
        ]);
    }
}
