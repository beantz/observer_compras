<?php 

namespace App\Http\Repository;

use App\Http\Interfaces\PedidosRepositoryInterface;
use App\Http\Requests\validationPedidos;
use Illuminate\Http\Request;
use App\Models\Pedidos;

class PedidosRepository implements PedidosRepositoryInterface {

    public function index() {

        $pedidos = Pedidos::all();

        return $pedidos;

    }

    public function store(validationPedidos $request){

        $pedido = Pedidos::create($request->validated());

        return $pedido;

    }

    public function show($id) {

        $pedido = Pedidos::find($id);

        return $pedido;

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }

}