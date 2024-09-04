<?php

namespace App\Http\Controllers;

use App\Models\NotaGrupo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerNotaGrupo extends Controller
{
    public function store(Request $request)
    {

        $datosValidados = $request->validate([
           'idgrupos' => 'required|exists:grupos,id',
           'idnotas' => 'required|exists:notas,id',
        ]);

        $notagrupo = NotaGrupo::create($datosValidados);
    }
}
