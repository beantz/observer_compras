<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão</title>
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
</head>
<body>
    <nav class="navegacao">
        <h2>Bem-vindo à Minha Página</h2>
        @include('site.user.Layouts._partials.topo')
    </nav>

    <div class="conteiner_principal">
        <h3 class="title">@yield('titulo')</h3>
        @yield('conteudo')
    </div>

    <footer class="footer">
        <p>&copy; 2025.</p>
    </footer>

</body>
</html>