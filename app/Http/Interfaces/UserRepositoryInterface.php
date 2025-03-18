<?php

namespace App\Http\Interfaces;

use App\Http\Requests\validationForm;
use Illuminate\Http\Request;

Interface UserRepositoryInterface {

    public function index();
    public function store(validationForm $request);
    public function show(string $id);
    public function update(Request $request, string $id);
    public function destroy(string $id);

}