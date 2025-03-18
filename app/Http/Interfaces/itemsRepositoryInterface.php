<?php 

namespace App\Http\Interfaces;

use App\Http\Requests\validationItens;
use Illuminate\Http\Request;

Interface itemsRepositoryInterface {

    public function index();
    public function store(validationItens $request);
    public function show($id);
    public function update(Request $request, $id);
    public function destroy($id);
    
}