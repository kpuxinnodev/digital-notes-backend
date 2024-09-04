<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoChat extends Model
{
    use HasFactory;

    public function grupos()
    {

        return $this->belongsTo(Chat::class);

    }

    public function chats()
    {

        return $this->belongsTo(Grupo::class);

    }
}
