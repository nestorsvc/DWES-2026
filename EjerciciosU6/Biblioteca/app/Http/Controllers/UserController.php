<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Listar todos los usuarios (Bibliotecario y Admin)
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Mostrar formulario de edición de usuario (Bibliotecario y Admin)
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = [
            UserRole::USER->value => 'Socio',
            UserRole::LIBRARIAN->value => 'Bibliotecario',
            UserRole::ADMIN->value => 'Administrador',
        ];
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Actualizar usuario (Bibliotecario y Admin)
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:user,librarian,admin',
            'is_active' => 'boolean',
        ]);

        // Solo admin puede cambiar roles a admin
        if ($validated['role'] === 'admin' && !auth()->user()->isAdmin()) {
            return redirect()->back()
                ->withErrors(['role' => 'Solo un administrador puede asignar el rol de administrador.']);
        }

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => UserRole::from($validated['role']),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Activar/Desactivar usuario (Bibliotecario y Admin)
     */
    public function toggleActive($id)
    {
        $user = User::findOrFail($id);

        // No permitir desactivarse a sí mismo
        if ($user->id === auth()->id()) {
            return redirect()->back()
                ->withErrors(['message' => 'No puedes desactivar tu propia cuenta.']);
        }

        $user->update(['is_active' => !$user->is_active]);

        $status = $user->is_active ? 'activado' : 'desactivado';
        return redirect()->back()
            ->with('success', "Usuario {$status} correctamente.");
    }

    /**
     * Eliminar usuario (Solo Admin)
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // No permitir eliminarse a sí mismo
        if ($user->id === auth()->id()) {
            return redirect()->back()
                ->withErrors(['message' => 'No puedes eliminar tu propia cuenta.']);
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
