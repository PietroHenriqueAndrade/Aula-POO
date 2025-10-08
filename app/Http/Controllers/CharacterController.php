<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    // Listar personagens existentes
    public function index()
    {
        $characters = Character::all();
        return view('characters.index', compact('characters'));
    }

    // Formulário de criação
    public function create()
    {
        return view('characters.create');
    }

    // Salvar personagem novo
    public function store(Request $request)
    {
    $character = new Character();
    $character->name = $request->name;
    $character->level = 1;
    $character->hp = $request->hp ?? 20;
    $character->mp = $request->mp ?? 15;
    $character->attack = $request->attack ?? 10;
    $character->defense = $request->defense ?? 5;
    $character->special_attack = $request->special_attack ?? 15;
    $character->special_defense = $request->special_defense ?? 5;
    $character->speed = $request->speed ?? 10;
    $character->exp = $request->exp ?? 0;
    $character->avatar = $request->avatar ?? 'guerreiro.png';

    $character->save();

    return redirect()->route('characters.index');
    }

    // Tela de jogo
    public function play(Request $request, $id)
    {
        $character = Character::findOrFail($id);
        $phase = $request->session()->get('phase', 1);
        $enemy = $this->createEnemy($phase);
        $message = null;
        $gameOver = false;
        $victory = false;
        return view('characters.play', compact('character', 'enemy', 'phase', 'message', 'gameOver', 'victory'));
    }

    public function action(Request $request, $id)
    {
        $character = Character::findOrFail($id);
        $phase = $request->session()->get('phase', 1);
        $enemy = $this->createEnemy($phase);
        $message = '';
        $gameOver = false;
        $victory = false;

        // Carregar HP do inimigo e personagem da sessão
        $enemy->hp = $request->session()->get('enemy_hp', $enemy->hp);
        $character->hp = $request->session()->get('char_hp', $character->hp);

        // Ação do jogador
        switch($request->action){
            case 'attack':
                $damage = $character->attack($enemy);
                $message .= "Você atacou o {$enemy->name} causando $damage de dano!<br>";
                break;
            case 'special':
                $damage = $character->specialAttack($enemy);
                $message .= "Você usou ataque especial no {$enemy->name} causando $damage de dano!<br>";
                break;
            case 'heal':
                $heal = $character->heal();
                $message .= "Você se curou recuperando $heal de HP!<br>";
                break;
        }

        // Checar se inimigo ainda está vivo
        if($enemy->isAlive()){
            $enemyDamage = $enemy->attack($character);
            $message .= "{$enemy->name} atacou você causando $enemyDamage de dano!";
        } else {
            $message .= "Você derrotou o {$enemy->name}!<br>";
            $character->exp += 30 * $phase;
            $victory = true;
            // Level up simples
            if($character->exp >= 100){
                $character->exp = 0;
                $character->level += 1;
                $character->hp += 20;
                $character->attack += 5;
                $character->defense += 5;
                $character->special_attack += 5;
                $character->special_defense += 5;
                $character->speed += 2;
                $message .= "<br>Parabéns! Você subiu de nível!";
            }
            $character->save();
            // Avançar de fase
            if($phase < 4){
                $phase++;
                $request->session()->put('phase', $phase);
                $request->session()->forget('enemy_hp');
                $request->session()->put('char_hp', $character->hp);
            } else {
                $gameOver = true;
                $message .= "<br>Você venceu todas as fases!";
                $request->session()->forget('phase');
                $request->session()->forget('enemy_hp');
                $request->session()->forget('char_hp');
            }
            return view('characters.play', compact('character', 'enemy', 'phase', 'message', 'gameOver', 'victory'));
        }

        // Checar se personagem morreu
        if(!$character->isAlive()){
            $gameOver = true;
            $message .= "<br>Você foi derrotado!";
            $request->session()->forget('phase');
            $request->session()->forget('enemy_hp');
            $request->session()->forget('char_hp');
        } else {
            // Salvar HPs na sessão
            $request->session()->put('enemy_hp', $enemy->hp);
            $request->session()->put('char_hp', $character->hp);
        }

        return view('characters.play', compact('character', 'enemy', 'phase', 'message', 'gameOver', 'victory'));
    }

    private function createEnemy($phase)
    {
        $enemies = [
            1 => [
                'name' => 'Slime',
                'hp' => 40,
                'attack' => 8,
                'defense' => 3,
                'special_attack' => 10,
                'special_defense' => 2,
                'speed' => 5,
                'img' => 'https://i.pinimg.com/originals/92/e5/6f/92e56ffb13f7181271c0e4c199250dc3.gif',
            ],
            2 => [
                'name' => 'Orc',
                'hp' => 70,
                'attack' => 15,
                'defense' => 8,
                'special_attack' => 18,
                'special_defense' => 6,
                'speed' => 8,
                'img' => 'https://pa1.aminoapps.com/7580/3b1fb38c9c08729ba394a19e9d2278f4a4faa7d1r1-360-450_hq.gif',
            ],
            3 => [
                'name' => 'Cavaleiro Negro',
                'hp' => 120,
                'attack' => 22,
                'defense' => 15,
                'special_attack' => 25,
                'special_defense' => 12,
                'speed' => 12,
                'img' => 'https://i.pinimg.com/originals/b6/08/77/b60877a20f69fd9ec29699f3e23a0f7c.gif',
            ],
            4 => [
                'name' => 'Final Boss',
                'hp' => 200,
                'attack' => 30,
                'defense' => 20,
                'special_attack' => 40,
                'special_defense' => 18,
                'speed' => 15,
                'img' => 'https://i.pinimg.com/originals/b6/08/77/b60877a20f69fd9ec29699f3e23a0f7c.gif',
            ],
        ];
        $e = $enemies[$phase] ?? $enemies[1];
        $enemy = new Character([
            'name' => $e['name'],
            'hp' => $e['hp'],
            'attack' => $e['attack'],
            'defense' => $e['defense'],
            'special_attack' => $e['special_attack'],
            'special_defense' => $e['special_defense'],
            'speed' => $e['speed'],
        ]);
        $enemy->img = $e['img'];
        return $enemy;
    }
}