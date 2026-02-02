<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => "required|string",
            'password' => "required",
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email no registrado en la BD'
            ], 401); // No autorizado
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                "message" => "Contraseña incorreta"
            ], 401); // No autorizado
        }

        $token = $user->createToken("api-token")->plainTextToken;

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'Bearer', // "Portador" del token
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        // Obtiene el token actual que se está usando para la petición
        // y lo elimina de la base de datos (lo revoca)
        // Esto invalida el token y el usuario deberá hacer login nuevamente

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success'=>true,
            'message'=> 'Sesión cerrada correctamente'
        ]);
    }

}
