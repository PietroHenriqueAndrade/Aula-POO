<!DOCTYPE html>
<html>
<head>
    <title>Personagens</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Segoe UI', 'Arial', sans-serif; 
            background: url('https://i.pinimg.com/originals/22/2b/85/222b8545bea5db87448c2618c5ec8c0b.gif') no-repeat center center fixed; 
            background-size: cover; 
            color: white; 
            text-align: center; 
            padding: 50px; 
        }
        .pixel-btn {
            display: block;
            margin: 24px auto 0 auto;
            color: #fff;
            font-size: 0.8rem;
            text-decoration: none;
            border-radius: 14px;
            padding: 14px 36px;
            background: linear-gradient(90deg,#00c6ff,#0072ff);
            font-family: 'Press Start 2P', cursive;
            font-weight: 600;
            box-shadow: 0 2px 12px #00c6ff44;
            text-align: center;
            width: fit-content;
            transition: background 0.2s, box-shadow 0.2s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .pixel-btn:hover {
            background: linear-gradient(90deg,#0072ff,#00c6ff);
            box-shadow: 0 4px 24px #00c6ff77;
            color: #fff;
        }
        .character-item {
            background: rgba(22, 33, 62, 0.8);
            margin:20px auto;
            padding:20px;
            border-radius:16px;
            width:420px;
            display: flex;
            align-items: center;
            gap: 24px;
            box-shadow: 0 4px 24px #0008;
        }
        .avatar-preview {
            min-width: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .avatar-preview img {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            background: #222;
            box-shadow: 0 0 12px #28a745;
        }
        .character-info {
            flex: 1;
        }
        .character-info strong {
            font-size: 1.2em;
        }
        .character-attr {
            margin: 2px 0;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <h1 style="font-family: 'Press Start 2P', cursive; font-size:2.2rem; margin-bottom: 32px; letter-spacing:2px;">Personagens</h1>
    <a href="{{ route('characters.create') }}" class="pixel-btn">Criar Novo Personagem</a>
    <ul style="list-style:none; padding:0;">
        @php
            $avatarGifs = [
                'guerreiro.png' => 'https://64.media.tumblr.com/638654cc72111ed14a8d1ca7c615f654/tumblr_pclhvhLxfk1xbwp7jo2_r1_400.gifv',
                'arqueiro.png' => 'https://64.media.tumblr.com/350c7e11c02d7d8a64faaa365884db5a/tumblr_pclhvhLxfk1xbwp7jo1_r1_400.gif',
                'mago.png' => 'https://64.media.tumblr.com/ff2ec7a3596e6aa2abca06a04827dcf3/tumblr_pclhvhLxfk1xbwp7jo4_r1_400.gifv',
            ];
        @endphp
        @foreach($characters as $character)
            <li class="character-item">
                <div class="avatar-preview">
                    <img src="{{ $avatarGifs[$character->avatar ?? 'guerreiro.png'] ?? $avatarGifs['guerreiro.png'] }}" alt="Avatar">
                </div>
                <div class="character-info">
                    <strong>{{ $character->name }}</strong> <span style="font-size:0.95em; color:#aaa;">- Level {{ $character->level ?? 1 }}</span>
                    <div class="character-attr">HP: <b>{{ $character->hp }}</b> | MP: <b>{{ $character->mp ?? 50 }}</b> | EXP: <b>{{ $character->exp }}</b></div>
                    <div class="character-attr">Ataque: <b>{{ $character->attack }}</b> | Defesa: <b>{{ $character->defense }}</b></div>
                    <div class="character-attr">Ataque Especial: <b>{{ $character->special_attack }}</b> | Defesa Especial: <b>{{ $character->special_defense }}</b></div>
                    <div class="character-attr">Velocidade: <b>{{ $character->speed }}</b></div>
                    <div style="margin-top:18px;">
                        <a href="{{ route('characters.play', $character->id) }}" class="pixel-btn" style="margin:0;">Jogar</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>
