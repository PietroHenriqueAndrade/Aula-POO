<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>RPG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1a1a2e;
            color: white;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #16213e;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }
        a:hover {
            background: #0f3460;
        }
    </style>
</head>
<body>
    <h1>⚔️ Bem-vindo ao RPG!</h1>

    <a href="{{ route('characters.create') }}">Criar Personagem</a>
    <a href="{{ route('characters.index') }}">Escolher Personagem</a>
</body>
</html>
