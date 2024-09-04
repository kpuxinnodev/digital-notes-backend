<?php

namespace App\Http\Controllers;

use App\Models\UserGrupo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerUserGrupo extends Controller
{
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'idusuario' => 'required|exists:users,id',
            'idgrupos' => 'required|exists:grupos,id',
        ]);

        $usergrupo = UserGrupo::create($datosValidados);
    }
}
