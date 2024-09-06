<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'manufacturer',
        'releasedate',
        'description',
    ];

    // Relationship: Category has many games
    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

    // Relationship: Category has many users through games
    public function users()
    {
        return $this->hasManyThrough('App\Models\User', 'App\Models\Game');
    }
}
