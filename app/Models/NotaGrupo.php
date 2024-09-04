<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaGrupo extends Model
{
    use HasFactory;

    public function notas()
    {

        return $this->belongsTo(Grupo::class);

    }

    public function grupos()
    {

        return $this->hasMany(Nota::class);

    }
}
