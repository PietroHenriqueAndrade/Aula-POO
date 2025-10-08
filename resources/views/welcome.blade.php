<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>RPG</title>

    <!-- Importando a fonte pixel art -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            color: white;

            /* Centralização vertical e horizontal */
            display: flex;
            flex-direction: column;
            justify-content: center; /* centraliza verticalmente */
            align-items: center;     /* centraliza horizontalmente */
            height: 100vh;           /* altura da tela inteira */
            margin: 0;

            /* Imagem de fundo */
            background: url('https://i.redd.it/86qeqi3lbu8c1.gif') no-repeat center center fixed;
            background-size: cover;

            text-shadow: 2px 2px 4px #000;
        }

        h1 {
            font-size: 2em; /* Ajuste conforme necessário */
            margin-bottom: 40px; /* Espaço entre título e links */
            text-align: center;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: rgba(22, 33, 62, 0.8);
            color: white;
            border-radius: 20px;
            text-decoration: none;
            transition: background 0.3s;
            font-size: 0.8em;
        }

        a:hover {
            background: rgba(15, 52, 96, 0.8);
        }
    </style>
</head>
<body>
    <h1>CARVERNA SOMBRIA</h1>
    <a href="{{ route('characters.create') }}">START GAME</a>
    <a href="{{ route('characters.index') }}">Escolher Personagem</a>
</body>
</html>
