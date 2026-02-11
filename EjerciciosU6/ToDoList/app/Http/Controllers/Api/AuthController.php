<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // public function login(Request $request)
    // {

    //     // PRIMERO: Validamos los datos que nos vienen del login
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     // SEGUNDO: Buscamos al usuario con ese email
    //     $user = User::where('email', $request->email)->first();

    //     // TERCERO: Si no existe ese user, usamos el response->json([]) para moldear la respuesta
    //     if (!$user) {
    //         return response()->json([
    //             "message" => "Usuario no encontrado"
    //         ], 404);
    //     }

    //     // Si si que existe, verificamos que su contraseña sea correcta
    //     if (!Hash::check($request->password, $user->password)) {
    //         return response()->json([
    //             "message" => "Credenciales incorrectas"
    //         ], 401);
    //     }

    //     // CUARTO: Crear el token, lo que equivaldria en una sesion en php a pelo
    //     return response()->json([
    //         'succes' => true,
    //         'access_token' => $user->createToken('api-token')->plainTextToken,
    //         'token_type'=>'Bearer',
    //         'user' => $user
    //     ]);
    // }

    // public function register(Request $request)
    // {

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password), // ← IMPORTANTE: hashear
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Usuario creado correctamente',
    //         'user' => $user
    //     ], 201); // ← 201 = Created (más semántico que 200)
    // }

    // // Desde el request, recoge el usaurio, recoge su toke y lo elimina. Devuelve mensaje de existo
    // public function logout(Request $rquest){
    //     // Simplemente obtiene el token del usuario actual y lo borra
    //     $rquest->user()->currentAccessToken()->delete();

    //     // Devolvemos que la sesion se cerro correctamente
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Sesion cerrada correctamente.'
    //     ]);
    // }



    // FUNCION LOGIN
    public function login(Request $request)
    {
        // PRIMERO: Validamos los datos que nos vienen del login
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // SEGUNDO: Buscamos al usuario con ese email (usar first() o firstOrFail para que devuelva el usuario)
        $user = User::where('email', $request->email)->first();
        // TERCERO: Si no existe ese user, usamos el response->json([]) para moldear la respuesta, estado 404
        if (!$user) {
            return response()->json([
                "succes" => false,
                "message" => "Usuario no encontrado"
            ], 404);
        }

        // Si si que existe, check que su contraseña sea correcta
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                "success" => false,
                "message" => "Contraseña incorrecta"
            ], 401);
        }
        // CUARTO: Crear el token, lo que equivaldria en una sesion en php a pelo (importante -> plainTextToken)
        $token = $user->createToken('api-token')->plainTextToken;

        // QUINTO: Respuesta en caso de que todo haya ido bien (access_token, token_type, sucess, message)
        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }



    // FUNCION REGISTER
    public function register(Request $request)
    {

        // PRIMERO: Validamos los datos del request (confirmed en password y en postman luego password_confirmation, para no tener que validar las dos), validacion de email,
        // unico referenciando a la tabla usuarios y al email
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|confirmed"
        ]);

        // SEGUNDO: Creamos el usuario con los datos validados, usamos User::create([]) para meter contraseña Hash::make() (como si fuera un seeder)
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        // TERCERO: Respuesta json([]) acordase de los estados (201, 400, 500)
        // OPCIONAL: Si nos pidieran asignar un token al usuario al registrarse, solo tendriamos que hacer lo mismo que en el login
        // $token = $user->createToken('api-token')->plainTextToken;
        // y añadirlo al response con access_token y token_type
        return response()->json([
            "success" => true,
            "data" => $user
        ], 201);
    }

    // FUNCION LOGOUT
    public function logout(Request $request)
    {
        // PRIMERO: De la request cogemos el user autenticado, su currentAccesToken y lo borramos
        $request->user()->currentAccessToken()->delete();

        // SEGUNDO: Devolvemos respuesta json([])
        return response()->json([
            "success" => true,
            "message" => "Sesion cerrada correctamente"
        ],200);
    }
}
