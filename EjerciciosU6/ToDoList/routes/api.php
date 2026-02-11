<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Definimos rutas PUBLICAS
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rutas PRIVADAS
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/todos', TodosController::class);
    Route::post('logout', [AuthController::class, 'logout']);

    // 1. El middleware 'auth:sanctum' intercepta la petición
    // middleware('auth:sanctum')

    // 2. Extrae el token del header Authorization
    // $token = "1|xyz123abc456def789...";

    // 3. Busca en la tabla 'personal_access_tokens'
    // SELECT * FROM personal_access_tokens WHERE token = '...'

    // 4. Encuentra el user_id asociado al token (ej: user_id = 5)

    // 5. Busca al usuario:
    // SELECT * FROM users WHERE id = 5

    // 6. INYECTA el usuario en $request
    // Ahora: $request->user() = User {id: 5, name: "Juan", email: "juan@test.com"}

    // 7. Ejecuta la función de la ruta
    Route::get('/user', function (Request $request) {
        // $request->user() devuelve el usuario autenticado
        // Es equivalente a: Auth::user()
        return $request->user();
    });
});
