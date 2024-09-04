<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerChat extends Controller
{
    //Esta funcion sirve para crear el chat, se debe probar.
    public function store(Request $request)
    {
        //Esto valida los datos que llegan del Frontend.
        $datosValidados = $request->validate(
            [
            'nickname' => 'required|unique:chats|max:20',
            'mensaje' => 'required|max:120',
            ]
        );

        //Esto crea un chat si los datos se validaron correctamente.
        $chat = Chat::create($datosValidados);

    }

}
