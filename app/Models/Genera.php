<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genera extends Model
{
    use HasFactory;

    public function notas()
    {

        return $this->belongsTo(User::class);

    }

    public function users()
    {

        return $this->hasMany(Nota::class);

    }
}
