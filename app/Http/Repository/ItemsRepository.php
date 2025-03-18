<?php 

namespace App\Http\Repository;

use App\Http\Interfaces\itemsRepositoryInterface;
use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Requests\validationItens;

class ItemsRepository implements itemsRepositoryInterface {

    public function index() {

        $itens = Items::all();

        return $itens;

    }

    public function store(validationItens $request) {

        //fazer validação
        $request->validated();

        $item = Items::create($request->all());

        return $item;

    }

    public function show($id) {

        $item = Items::find($id);

        return $item;

    }

    public function update(Request $request, $id){

    }

    public function destroy($id) {

    }

}