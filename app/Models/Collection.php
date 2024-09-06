<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
    ];

    // Relación: Collection pertenece a un usuario
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // Relación: Collection pertenece a un juego
    public function game() {
        return $this->belongsTo('App\Models\Game');
    }
}
