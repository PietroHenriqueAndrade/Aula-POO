<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>RPG - Jogar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1a1a2e;
            color: white;
            text-align: center;
            padding: 30px;
        }
        h1 { font-size: 2.5em; margin-bottom: 20px; }
        button {
            margin: 10px;
            padding: 12px 20px;
            background: #16213e;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: #0f3460; }
        .stats, .enemy-stats {
            background: #16213e;
            margin: 20px auto;
            padding: 15px;
            border-radius: 8px;
            width: 300px;
            text-align: left;
        }
        .message { margin: 20px 0; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Fase {{ $phase ?? 1 }} - Batalha</h1>

    @if(isset($message))
        <p class="message">{!! $message !!}</p>
    @endif

    <div style="display: flex; justify-content: center; align-items: flex-start; gap: 60px; margin-top: 40px;">
        <!-- Personagem -->
        <div class="stats" style="background: #222a44; min-width: 320px; border-radius: 16px; box-shadow: 0 0 24px #28a745;">
            <div style="text-align:center;">
                @php
                    $avatarGifs = [
                        'guerreiro.png' => 'https://64.media.tumblr.com/638654cc72111ed14a8d1ca7c615f654/tumblr_pclhvhLxfk1xbwp7jo2_r1_400.gifv',
                        'arqueiro.png' => 'https://64.media.tumblr.com/350c7e11c02d7d8a64faaa365884db5a/tumblr_pclhvhLxfk1xbwp7jo1_r1_400.gif',
                        'mago.png' => 'https://64.media.tumblr.com/ff2ec7a3596e6aa2abca06a04827dcf3/tumblr_pclhvhLxfk1xbwp7jo4_r1_400.gifv',
                    ];
                    $charMaxHp = session('char_max_hp', $character->hp);
                    if($character->hp > $charMaxHp) $charMaxHp = $character->hp;
                    session(['char_max_hp' => $charMaxHp]);
                @endphp
                <img src="{{ $avatarGifs[$character->avatar ?? 'guerreiro.png'] ?? $avatarGifs['guerreiro.png'] }}" alt="Avatar" style="width:120px; height:120px; border-radius:12px; background:#111; box-shadow:0 0 16px #28a745; margin-bottom:10px;">
                <div style="margin: 10px 0 5px 0;">
                    <div style="background:#333; border-radius:8px; width:90%; margin:0 auto; height:22px; position:relative; box-shadow:0 0 8px #28a745;">
                        <div style="background:linear-gradient(90deg,#4caf50,#8bc34a); height:100%; border-radius:8px; width:{{ max(0, min(100, round(($character->hp/$charMaxHp)*100))) }}%; transition:width 0.3s;"></div>
                        <span style="position:absolute; left:50%; top:2px; transform:translateX(-50%); color:#fff; font-weight:bold; font-size:1em; text-shadow:1px 1px 2px #000;">HP: {{ $character->hp }} / {{ $charMaxHp }}</span>
                    </div>
                </div>
                <div id="char-attack-info" style="margin-top:4px; color:#8bc34a; font-weight:bold; min-height:22px;"></div>
            </div>
            <h2>{{ $character->name }} <span style="font-size:0.8em; color:#aaa;">(Você)</span></h2>
            <div style="font-size:1.1em;">
                <b>Level:</b> {{ $character->level ?? 1 }}<br>
                <b>MP:</b> {{ $character->mp ?? 50 }} | <b>EXP:</b> {{ $character->exp }}<br>
                <b>Ataque:</b> {{ $character->attack }} | <b>Defesa:</b> {{ $character->defense }}<br>
                <b>Ataque Esp.:</b> {{ $character->special_attack }} | <b>Def. Esp.:</b> {{ $character->special_defense }}<br>
                <b>Velocidade:</b> {{ $character->speed }}
            </div>
        </div>

        <!-- VS -->
        <div style="font-size:2.5em; color:#28a745; align-self:center;">VS</div>

        <!-- Inimigo -->
        <div class="enemy-stats" style="background: #442222; min-width: 320px; border-radius: 16px; box-shadow: 0 0 24px #c0392b;">
            <div style="text-align:center;">
                @php
                    $enemyMaxHp = session('enemy_max_hp', $enemy->hp);
                    if($enemy->hp > $enemyMaxHp) $enemyMaxHp = $enemy->hp;
                    session(['enemy_max_hp' => $enemyMaxHp]);
                @endphp
                <img src="{{ $enemy->img ?? '' }}" alt="Inimigo" style="width:120px; height:120px; border-radius:12px; background:#111; box-shadow:0 0 16px #c0392b; margin-bottom:10px;">
                <div style="margin: 10px 0 5px 0;">
                    <div style="background:#333; border-radius:8px; width:90%; margin:0 auto; height:22px; position:relative; box-shadow:0 0 8px #c0392b;">
                        <div style="background:linear-gradient(90deg,#e53935,#ffb300); height:100%; border-radius:8px; width:{{ max(0, min(100, round(($enemy->hp/$enemyMaxHp)*100))) }}%; transition:width 0.3s;"></div>
                        <span style="position:absolute; left:50%; top:2px; transform:translateX(-50%); color:#fff; font-weight:bold; font-size:1em; text-shadow:1px 1px 2px #000;">HP: {{ $enemy->hp }} / {{ $enemyMaxHp }}</span>
                    </div>
                </div>
            </div>
            <h2>{{ $enemy->name }} <span style="font-size:0.8em; color:#faa;">(Inimigo)</span></h2>
            <div style="font-size:1.1em;">
                <b>Ataque:</b> {{ $enemy->attack }} | <b>Defesa:</b> {{ $enemy->defense }}<br>
                <b>Ataque Esp.:</b> {{ $enemy->special_attack }} | <b>Def. Esp.:</b> {{ $enemy->special_defense }}<br>
                <b>Velocidade:</b> {{ $enemy->speed }}
            </div>
        </div>
    </div>

    <!-- Barra central de vantagem -->
    <div style="width: 60vw; margin: 40px auto 0 auto;">
        @php
            $charPercent = $charMaxHp > 0 ? max(0, min(100, round(($character->hp/$charMaxHp)*100))) : 0;
            $enemyPercent = $enemyMaxHp > 0 ? max(0, min(100, round(($enemy->hp/$enemyMaxHp)*100))) : 0;
        @endphp
        <div style="background:#222; border-radius:12px; height:28px; position:relative; box-shadow:0 0 12px #333; display:flex; align-items:center;">
            <div style="background:linear-gradient(90deg,#4caf50,#8bc34a); height:100%; border-radius:12px 0 0 12px; width:{{ $charPercent }}%; transition:width 0.3s;"></div>
            <div style="background:linear-gradient(90deg,#e53935,#ffb300); height:100%; border-radius:0 12px 12px 0; width:{{ $enemyPercent }}%; transition:width 0.3s;"></div>
            <span style="position:absolute; left:50%; top:2px; transform:translateX(-50%); color:#fff; font-weight:bold; font-size:1em; text-shadow:1px 1px 2px #000;">
                @if($charPercent > $enemyPercent)
                    Você está vencendo!
                @elseif($enemyPercent > $charPercent)
                    O inimigo está vencendo!
                @else
                    Equilíbrio!
                @endif
            </span>
        </div>
    </div>

    @if(!($gameOver ?? false))
        <form method="POST" action="{{ route('characters.action', $character->id) }}" style="margin-top:40px;">
            @csrf
            <button type="submit" name="action" value="attack">Atacar</button>
            <button type="submit" name="action" value="special">Ataque Especial</button>
            <button type="submit" name="action" value="heal">Curar</button>
        </form>
    @else
        <div style="margin-top:40px;">
            <a href="{{ route('characters.index') }}" style="display:inline-block; margin-top:20px; text-decoration:none; color:#0f3460; font-weight:bold; font-size:1.2em;">Voltar para lista</a>
        </div>
    @endif

    <script>
        // Bloqueia cliques rápidos em botões
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('button[name="action"]');
            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    buttons.forEach(b => b.disabled = true);
                    setTimeout(() => buttons.forEach(b => b.disabled = false), 1000);
                });
            });
        });
    </script>
</body>
</html>
