<?php 

namespace App\Http\Repository;

use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Requests\validationForm;
use Illuminate\Http\Request;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {

    public function index() {

        $users = User::all();

        return $users;

    }

    public function store(validationForm $request) {

        $request->validated();

        $user = User::create($request->all());
        
        return $user;

    }

    public function show(string $id) {

        $user = User::find($id);

        return $user;

    }

    public function update(Request $request, string $id) {

    }

    public function destroy(string $id) {

    }

}