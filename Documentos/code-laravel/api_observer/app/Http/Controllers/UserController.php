<?php

namespace App\Http\Controllers;

use App\Events\UserEvent;
use App\Http\Repository\UserRepository;
use App\Http\Requests\validationForm;
use Illuminate\Http\Request;
use App\Http\Controllers\logingUserController;

class UserController extends Controller 
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepository->index();

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
        $user = $this->userRepository->store($request);
            
        //chamando evento que notifca as classes necessarias da criação de um novo usuario
        event(new UserEvent($user));
        
        //fazendo uso do singleton apenas para testes, aq no caso ele está registrando todos os cadastros de usuarios feitos
        $log = app(logingUserController::class);
        $message = $log->message("Usuário $user->name logado com sucesso!");

        return response()->json([
            'success' => 'true',
            'message' => $message,
            'user' => $user,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userRepository->show($id);

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
        $user = $this->userRepository->show($id);

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
        $user = $this->userRepository->show($id);

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
