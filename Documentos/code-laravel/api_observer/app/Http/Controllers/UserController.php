<?php

namespace App\Http\Controllers;

use App\Events\UserEvent;
use App\Http\Requests\validationForm;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'message' => 'Exibindo todos os usuarios',
            'users' => $users,
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validationForm $request)
    {
        //validações
        $request->validated();

        $user = User::create($request->all());
            
        //chamando evento que notifca as classes necessarias da criação de um novo usuario
        event(new UserEvent($user));
        
        return response()->json([
            'success' => 'true',
            'message' => 'Usuário criado com sucesso',
            'user' => $user,
        ], 201);   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => "Usuário de id $id não encontrado",
                'user' => $user,
            ], 201);
        }

        return response()->json([
            'success' => true,
            'message' => 'Exibindo um único usuário',
            'user' => $user,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => "Usuário de id $id não encontrado",
                'user' => $user,
            ], 201);
        }

        $user->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Dado atualizado com sucesso',
            'userUpdate' => $user,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => "Usuário de id $id não encontrado",
                'user' => $user,
            ], 201);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Dado deletado com sucesso'
        ], 201);
    }
}
