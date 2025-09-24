<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'hp',
        'ap',
        'attack',
        'defense',
        'special_attack',
        'special_defense',
        'speed',
        'exp'
    ];
    public function move(){}
    public function attack(){}
    public function specialattack(){}
    public function heal(){}
}
