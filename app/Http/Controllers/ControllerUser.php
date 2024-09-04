<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerUser extends Controller
{

    //Esta funcion sirve para crear un usuario.
    public function store(Request $request)
    {
        //Esto valida los datos que llegan del Frontend.
        $datosValidados = $request->validate(
            [
                'name' => 'required|max:30',
                'nickname' => 'required|unique:users|max:20',
                'email' => 'required|unique:users|max:45',
                'password' => 'required|max:40',
            ]
        );

        //Esto crea el usuario si los datos se validaron correctamente.
        User::create([
            'name' => $datosValidados['name'],
            'nickname' => $datosValidados['nickname'],
            'email' => $datosValidados['email'],
            'password' => bcrypt($datosValidados['password']),
        ]);

        return response()->json("Usuario creado", 200);
    }

    //Esta funcion deberia mostrar los datos en el perfil, se debe probar.
    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    //Esta funcion actualiza los datos del usuario, se debe probar.
    public function update(Request $request, $id)
    {
        //Esto busca al usuario por su id para poder actualizar sus datos.
        $user = User::find($id);

        //Esto valida los datos que llegan del Frontend.
        $datosValidados = $request->validate(
            [
                'nickname' => 'unique:users|max:20',
                'password' => 'max:40|confirmed',
                'biografia' => 'max:120',
            ]
        );

        //Esto actualiza los datos del usuario, si los datos se validaron correctamente.
        if ($user) {
            $user->update([
                'nickname' => $datosValidados['nickname'],
                'password' => isset($datosValidados['password']) ? Hash::make($datosValidados['password']) : $user->password,
                'biografia' => $datosValidados['biografia'],
            ]);

            //Esto muestra dos mensajes si se han actualizado los datos correctamente
            //y a su vez muestra si los mismos no se pudieron actualizar.
            return response()->json(['messaje' => 'Se ha actualizado los datos del usuario']);
        } else {
            return response()->json(['messaje' => 'No se pudieron actualizar los datos del usuario'], 404);
        }
    }

    //Esta funcion elimina el usuario, se debe probar.
    public function destroy(Request $request, $id)
    {
        //Esto busca al usuario por su id para poder actualizar sus datos.
        $user = User::find($id);

        //Esto elimina al usuario, si se encuentra su id.
        if ($user) {

        $user->delete();

        //Esto muestra dos mensajes, uno por si se logró eliminar el usuario y otro por si no se logró.
        return response()->json('Usuario eliminado correctamente', 204);
     }  else {
        return response()->json('No se eliminó el usuario', 406);
     }
    }

    //esta funcion sirve para cambiar la contraseña, se debe probar.
    public function cambiarContraseña(Request $request)
    {
        //Esto valida los datos que llegan del Frontend.
        $datosValidados = $request->validate([
            'password' => 'required',
            'newpassword' => 'required|min:8|confirmed',
        ]);

        //Esto autentica al usuario que se utiliza.
        $user = Auth::user();

        //Esto chequea si la contraseña actual es correcta.
        if (!Hash::check($datosValidados['password'], $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['La contraseña actual es incorrecta.'],
            ]);
        }

        //Esto cambia la contraseña.
        $user->password = Hash::make($datosValidados['newpassword']);

        //Esto guarda la contraseña.
        $user->save();

        //Esto muestra un mensaje si la contraseña se cambio correctamente.
        return response()->json(['message' => 'Contraseña cambiada correctamente.']);
    }
}
