<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Escolher Personagem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50; /* Azul escuro */
            color: #ecf0f1; /* Cinza claro */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #3498db; /* Azul */
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            width: 80%;
            max-width: 600px;
        }
        li {
            background-color: #34495e; /* Azul acinzentado */
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        a {
            background-color: #2ecc71; /* Verde */
            color: #fff;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <h1>Escolher Personagem</h1>
    <ul>
        @foreach($characters as $character)
            <li>
                {{ $character->name }} (Nv {{ $character->level }})
                <a href="{{ route('characters.play', $character->id) }}">Jogar</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('characters.create') }}">Criar novo personagem</a>
</body>
</html>