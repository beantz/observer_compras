<?php 

namespace App\Http\Interfaces;

use Illuminate\Http\Request;

Interface PedidosRepositoryInterface {

    public function index();
    public function store(Request $request);
    public function show($id);
    public function update(Request $request, $id);
    public function destroy($id);

}