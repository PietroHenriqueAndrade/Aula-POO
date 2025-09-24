<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Jogando com {{ $character->name }}</title>
    <style>
        body { margin: 0; padding: 0; background: #2c3e50; }
        #game-container { margin: auto; width: 800px; height: 600px; border: 2px solid #3498db; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/phaser@3.55.2/dist/phaser.min.js"></script>
    <script src="{{ asset('js/game.js') }}"></script>
</head>
<body>
    <div id="game-container"></div>
    <a href="{{ route('characters.index') }}">Voltar</a>
</body>
</html>