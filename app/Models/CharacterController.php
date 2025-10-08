<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::all();
        return view('characters.index', compact('characters'));
    }

    public function create()
    {
        return view('characters.create');
    }

    public function store(Request $request)
    {
        Character::create([
            'name' => $request->name,
            'hp' => 100,
            'mp' => 50,
            'attack' => 10,
            'defense' => 5,
            'special_attack' => 15,
            'special_defense' => 5,
            'speed' => 10,
            'exp' => 0,
            'level' => 1
        ]);

        return redirect()->route('characters.index');
    }

    public function play($id)
    {
        $character = Character::findOrFail($id);
        $enemy = $this->createEnemy();

        return view('characters.play', compact('character', 'enemy'));
    }

    public function action(Request $request, $id)
    {
        $character = Character::findOrFail($id);
        $enemy = $this->createEnemy();
        $message = '';

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
            $message .= "Você derrotou o {$enemy->name} e ganhou 20 de EXP!";
            $character->exp += 20;

            // Level up simples
            if($character->exp >= 100){
                $character->exp = 0;
                $character->level += 1;
                $character->hp += 20;
                $character->attack += 5;
                $character->defense += 5;
                $message .= " Parabéns! Você subiu de nível!";
            }
        }

        return view('characters.play', compact('character','enemy','message'));
    }

    private function createEnemy()
    {
        return new \App\Models\Character([
            'name' => 'Goblin',
            'hp' => 50,
            'attack' => 8,
            'defense' => 3,
            'special_attack' => 10,
            'special_defense' => 2,
            'speed' => 5,
            'exp' => 0
        ]);
    }
}
