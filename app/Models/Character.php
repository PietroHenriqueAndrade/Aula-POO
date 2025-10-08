<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'hp',
        'mp',
        'attack',
        'defense',
        'special_attack',
        'special_defense',
        'speed',
        'exp',
        'level',
        'avatar'
    ];

    // Ataque normal
    public function attack($enemy)
    {
        $damage = $this->attack - ($enemy->defense / 2);
        $damage = max(0, (int)$damage);
        $enemy->hp -= $damage;
        $enemy->hp = max(0, $enemy->hp);
        return $damage;
    }

    // Ataque especial
    public function specialAttack($enemy)
    {
        $damage = $this->special_attack - ($enemy->special_defense / 2);
        $damage = max(0, (int)$damage);
        $enemy->hp -= $damage;
        $enemy->hp = max(0, $enemy->hp);
        return $damage;
    }

    // Curar
    public function heal()
    {
        $healAmount = 20;
        $this->hp += $healAmount;
        return $healAmount;
    }

    public function isAlive()
    {
        return $this->hp > 0;
    }
}
