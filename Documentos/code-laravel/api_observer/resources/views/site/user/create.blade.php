@extends('site.user.Layouts.basico')

@section('titulo', 'Realize seu cadastramento')

@section('conteudo')
    <div class="form_create_user">
        <form action="{{ route('usuario.store') }}" method="post">
            @csrf

            <input type="text" name="name" id="name" placeholder="Digite seu nome" value="{{ old('name') }}">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
    
            <input type="number" name="cpf" id="cpf" placeholder="Digite seu CPF" value="{{ old('cpf') }}">
            @error('cpf')
                <span class="error">{{ $message }}</span>
            @enderror

            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}">
            @error('data_nascimento')
                <span class="error">{{ $message }}</span>
            @enderror

            <input type="email" name="email" id="email" placeholder="Digite seu e-mail" value="{{ old('email') }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
           
            <input type="password" name="password" id="password" placeholder="Digite seu sua senha" value="{{ old('password') }}">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror

            <button type="submit">Cadastrar</button>
        </form>
    </div>
@endsection