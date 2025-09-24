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
        $character->hp = 20;
        $character->mp = 15;
        $character->attack = 15;
        $character->defense = 20;
        $character->special_attack = 35;
        $character->special_defense = 10;
        $character->speed = 50;
        $character->exp = 0;

        $character->save();

        return redirect()->route('characters.index');
    }

    // Tela de jogo
    public function play($id)
    {
        $character = Character::findOrFail($id);
        // AQUI está a linha corrigida
        return view('characters.play', compact('character'));
    }
}