<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Personagem</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            background: url('https://i.pinimg.com/originals/22/2b/85/222b8545bea5db87448c2618c5ec8c0b.gif') no-repeat center center fixed; 
            background-size: cover; 
            color: white; 
            text-align: center; 
            padding: 50px; 
        }

        .form-container {
            background: rgba(0, 0, 0, 0.7);
            display: inline-block;
            padding: 30px;
            border-radius: 10px;
        }

        h1 { 
            font-size: 2.5em; 
            margin-bottom: 20px; 
        }

        input, button, select { 
            padding: 10px; 
            margin: 10px 0; 
            border-radius: 5px; 
            border: none; 
            font-size: 1em;
        }

        button { 
            background: #28a745; 
            color: white; 
            cursor: pointer; 
            transition: 0.3s;
        }

        button:hover { 
            background: #218838; 
        }

        a { 
            color: #f8f9fa; 
            text-decoration: none; 
            display: inline-block; 
            margin-top: 15px; 
        }

        .characters {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
        }

        .characters label {
            cursor: pointer;
            transition: transform 0.2s;
        }

        .characters input {
            display: none;
        }

        .characters img {
            width: 100px;
            height: 100px;
            border: 3px solid transparent;
            border-radius: 10px;
        }

        .characters input:checked + img {
            border-color: #28a745;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="form-container" style="display: flex; align-items: flex-start; gap: 40px; justify-content: center;">
        <div style="flex:1; min-width:320px;">
            <h1>Criar Personagem</h1>
            <form action="{{ route('characters.store') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Digite o nome" required><br>
                <input type="number" name="hp" placeholder="Vida (HP)" min="10" max="500" required><br>
                <input type="number" name="mp" placeholder="Mana (MP)" min="1" max="500" required><br>
                <input type="number" name="attack" placeholder="Ataque" min="1" max="100" required><br>
                <input type="number" name="defense" placeholder="Defesa" min="1" max="100" required><br>
                <input type="number" name="special_attack" placeholder="Ataque Especial" min="1" max="100" required><br>
                <input type="number" name="special_defense" placeholder="Defesa Especial" min="1" max="100" required><br>
                <input type="number" name="speed" placeholder="Velocidade" min="1" max="100" required><br>
                <input type="number" name="exp" placeholder="Experiência (EXP)" min="0" max="9999" value="0" required><br>

                <p>Escolha seu personagem:</p>
                <div class="characters">
                    <label>
                        <input type="radio" name="avatar" value="guerreiro.png" data-gif="https://64.media.tumblr.com/638654cc72111ed14a8d1ca7c615f654/tumblr_pclhvhLxfk1xbwp7jo2_r1_400.gifv" required>
                        <img src="https://64.media.tumblr.com/638654cc72111ed14a8d1ca7c615f654/tumblr_pclhvhLxfk1xbwp7jo2_r1_400.gifv" alt="Guerreiro">
                    </label>
                    <label>
                        <input type="radio" name="avatar" value="arqueiro.png" data-gif="https://64.media.tumblr.com/350c7e11c02d7d8a64faaa365884db5a/tumblr_pclhvhLxfk1xbwp7jo1_r1_400.gif">
                        <img src="https://64.media.tumblr.com/350c7e11c02d7d8a64faaa365884db5a/tumblr_pclhvhLxfk1xbwp7jo1_r1_400.gif" alt="Arqueiro">
                    </label>
                    <label>
                        <input type="radio" name="avatar" value="mago.png" data-gif="https://64.media.tumblr.com/ff2ec7a3596e6aa2abca06a04827dcf3/tumblr_pclhvhLxfk1xbwp7jo4_r1_400.gifv">
                        <img src="https://64.media.tumblr.com/ff2ec7a3596e6aa2abca06a04827dcf3/tumblr_pclhvhLxfk1xbwp7jo4_r1_400.gifv" alt="Mago">
                    </label>
                </div>

                <button type="submit">Criar</button>
            </form>
            <a href="{{ route('characters.index') }}">Voltar para lista</a>
        </div>
        <div id="avatar-preview" style="flex:1; min-width:180px; display:flex; align-items:center; justify-content:center;">
            <img id="avatar-gif" src="https://64.media.tumblr.com/638654cc72111ed14a8d1ca7c615f654/tumblr_pclhvhLxfk1xbwp7jo2_r1_400.gifv" alt="Avatar" style="width:180px; height:180px; border-radius:16px; box-shadow:0 0 24px #28a745; background:#222;">
        </div>
    </div>
    <script>
        // Troca o avatar animado ao lado do formulário conforme a escolha
        document.querySelectorAll('input[name="avatar"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                var gif = this.getAttribute('data-gif');
                document.getElementById('avatar-gif').src = gif;
            });
        });
    </script>
</body>
</html>
