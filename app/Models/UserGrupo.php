<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGrupo extends Model
{
    use HasFactory;

    public function grupos()
    {
        return $this->hasMany(User::class);
    }

    public function users()
    {
        return $this->hasMany(Grupo::class);
    }
}
