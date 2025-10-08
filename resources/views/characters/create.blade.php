<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Personagem</title>

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', 'Arial', sans-serif;
            background: 
                linear-gradient(rgba(10, 20, 40, 0.85), rgba(10, 20, 40, 0.85)),
                url('https://i.pinimg.com/originals/22/2b/85/222b8545bea5db87448c2618c5ec8c0b.gif') 
                center/cover no-repeat;
            min-height: 100vh;
            margin: 0;
            color: #fff;
        }

        /* 🧙 Estilo de título com fonte pixel */
        .create-title {
            font-family: 'Press Start 2P', cursive;
            font-size: 1.8rem;
            font-weight: 400;
            color: #fff;
            margin-bottom: 24px;
            letter-spacing: 2px;
            text-shadow: 0 2px 12px #000a;
            text-align: center;
            line-height: 1.4;
        }

        .create-container {
            max-width: 950px;
            margin: 48px auto;
            background: rgba(24, 32, 48, 0.9);
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            padding: 48px 32px 32px 32px;
            display: flex;
            gap: 48px;
            align-items: flex-start;
        }

        .create-form {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        /* Labels com a mesma fonte pixel */
        .create-form label {
            font-family: 'Press Start 2P', cursive;
            font-size: 0.7rem;
            font-weight: 400;
            color: #b8e0ff;
            margin-bottom: 6px;
            display: block;
        }

        .create-form input[type="text"],
        .create-form input[type="number"] {
            background: #1a2536;
            color: #fff;
            border: 1.5px solid #3a5a8c;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 1.1rem;
            outline: none;
            transition: border 0.2s;
            font-family: 'Segoe UI', 'Arial', sans-serif;
        }

        .create-form input:focus {
            border-color: #00c6ff;
        }

        .characters {
            display: flex;
            gap: 28px;
            margin-top: 10px;
            justify-content: flex-start;
        }

        .characters label {
            cursor: pointer;
            border-radius: 14px;
            transition: box-shadow 0.2s, border 0.2s, transform 0.2s;
            padding: 4px;
            background: rgba(20,30,40,0.7);
        }

        .characters input[type="radio"] {
            display: none;
        }

        .characters img {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            border: 3px solid transparent;
            background: #222;
            transition: border 0.2s, box-shadow 0.2s, transform 0.2s;
        }

        .characters input[type="radio"]:checked + img {
            border-color: #00c6ff;
            box-shadow: 0 0 0 4px #00c6ff55;
            transform: scale(1.08);
        }

        .create-btn {
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            padding: 14px 36px;
            border-radius: 14px;
            background: linear-gradient(90deg,#00c6ff,#0072ff);
            border: none;
            color: #fff;
            font-weight: 600;
            margin-top: 18px;
            box-shadow: 0 2px 12px #00c6ff44;
            transition: background 0.2s, box-shadow 0.2s;
            cursor: pointer;
            text-transform: uppercase;
        }

        .create-btn:hover {
            background: linear-gradient(90deg,#0072ff,#00c6ff);
            box-shadow: 0 4px 24px #00c6ff77;
        }

        .avatar-preview {
            min-width: 200px;
            max-width: 240px;
            background: rgba(20,30,40,0.95);
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.4);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 32px 12px 24px 12px;
            margin-top: 12px;
        }

        .avatar-preview img {
            width: 140px;
            height: 140px;
            border-radius: 16px;
            background: #222;
            border: 3px solid #00c6ff;
            margin-bottom: 18px;
            box-shadow: 0 0 24px #00c6ff55;
        }

        .avatar-preview span {
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            font-size: 0.8rem;
            font-weight: 400;
            text-align: center;
        }

        @media (max-width: 900px) {
            .create-container {
                flex-direction: column;
                align-items: center;
                gap: 24px;
                padding: 32px 8px;
            }
            .avatar-preview { margin-top: 0; }
        }
    </style>
</head>
<body>
    <div class="create-container">
        <form method="POST" action="{{ route('characters.store') }}" class="create-form">
            <div class="create-title">CRIAR PERSONAGEM</div>
            @csrf
            <div>
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Digite o nome" required>
            </div>
            <div>
                <label for="hp">Vida (HP)</label>
                <input type="number" id="hp" name="hp" placeholder="Vida (HP)" required>
            </div>
            <div>
                <label for="mp">Mana (MP)</label>
                <input type="number" id="mp" name="mp" placeholder="Mana (MP)" required>
            </div>
            <div>
                <label for="attack">Ataque</label>
                <input type="number" id="attack" name="attack" placeholder="Ataque" required>
            </div>
            <div>
                <label for="defense">Defesa</label>
                <input type="number" id="defense" name="defense" placeholder="Defesa" required>
            </div>
            <div>
                <label for="attack1">Ataque I</label>
                <input type="number" id="attack1" name="attack1" placeholder="Ataque I" required>
            </div>
            <div>
                <label for="defense1">Defesa I</label>
                <input type="number" id="defense1" name="defense1" placeholder="Defesa I" required>
            </div>
            <div>
                <label for="speed">Velocidade</label>
                <input type="number" id="speed" name="speed" placeholder="Velocidade" required>
            </div>
            <div>
                <label for="level">Nível</label>
                <input type="number" id="level" name="level" placeholder="Nível" required>
            </div>
            <div>
                <label>Escolha seu personagem:</label>
                <div class="characters">
                    <label>
                        <input type="radio" name="avatar" value="guerreiro.png" data-gif="https://64.media.tumblr.com/638654cc72111ed14a8d1ca7c615f654/tumblr_pclhvhLxfk1xbwp7jo2_r1_400.gifv" checked>
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
            </div>
            <button type="submit" class="create-btn">Criar</button>
            <a href="{{ route('characters.index') }}" class="create-btn" style="text-align:center; text-decoration:none; margin-top:16px;">Voltar para lista</a>
        </form>

        <div class="avatar-preview">
            <img id="avatar-gif" src="https://64.media.tumblr.com/638654cc72111ed14a8d1ca7c615f654/tumblr_pclhvhLxfk1xbwp7jo2_r1_400.gifv" alt="Avatar">
            <span id="avatarLabel">Guerreiro</span>
        </div>
    </div>

    <script>
        const avatarLabel = document.getElementById('avatarLabel');
        const avatarNames = {
            'guerreiro.png': 'Guerreiro',
            'arqueiro.png': 'Arqueiro',
            'mago.png': 'Mago',
        };
        document.querySelectorAll('input[name="avatar"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const gif = this.getAttribute('data-gif');
                document.getElementById('avatar-gif').src = gif;
                avatarLabel.textContent = avatarNames[this.value] || 'Avatar';
            });
        });
    </script>
</body>
</html>
