<!DOCTYPE html>
<html>
<head>
    <title>Criar Personagem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        form {
            background-color: #34495e;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #ecf0f1;
        }
        input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #7f8c8d;
            background-color: #2c3e50;
            color: #ecf0f1;
        }
        button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #2ecc71;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #27ae60;
        }
        a {
            color: #3498db;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Criar Personagem</h1>
    <form action="{{ route('characters.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="name" required>

        <label>Level:</label>
        <input type="number" name="level" value="1">

        <label>HP:</label>
        <input type="number" name="hp" value="20">

        <label>MP:</label>
        <input type="number" name="mp" value="15">

        <label>Ataque:</label>
        <input type="number" name="attack" value="10">

        <label>Defesa:</label>
        <input type="number" name="defense" value="10">

        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('characters.index') }}">Voltar</a>
</body>
</html>