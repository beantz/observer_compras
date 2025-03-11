<?php 

namespace App\Http\Interfaces;

use App\Http\Requests\validationPedidos;
use Illuminate\Http\Request;

Interface PedidosRepositoryInterface {

    public function index();
    public function store(validationPedidos $request);
    public function show($id);
    public function update(Request $request, $id);
    public function destroy($id);

}