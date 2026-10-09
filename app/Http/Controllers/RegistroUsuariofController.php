<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegistroUsuariofController extends Controller
{
    public function mostrarPanel(Request $request)
    {
        $users = User::with('rol')->latest()->get();
        $roles = Rol::orderBy('nombre_rol')->get();
        $userToEdit = $request->filled('edit') ? User::find($request->integer('edit')) : null;

        return view('regusuarios', compact('users', 'roles', 'userToEdit'));
    }

    public function guardarProfesor(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'ci_user' => 'required|string|max:255',
            'id_rol' => 'required|exists:roles,id',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|string|min:8',
            'estado_activo' => 'required|boolean',
        ]);

        $inicialApellido = Str::upper(Str::substr($data['last_name'], 0, 1));
        $nombreLimpio = Str::ascii($data['name']);

        User::create([
            ...$data,
            'name' => Str::title($data['name']),
            'last_name' => Str::title($data['last_name']),
            'user_name' => str_replace(' ', '', $nombreLimpio.$inicialApellido),
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('profesores.vista')->with('success', 'Usuario registrado con éxito.');
    }

    public function actualizarProfesor(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'ci_user' => 'required|string|max:255',
            'id_rol' => 'required|exists:roles,id',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|string|min:8',
            'estado_activo' => 'required|boolean',
        ]);

        if (filled($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->fill([
            ...$data,
            'name' => Str::title($data['name']),
            'last_name' => Str::title($data['last_name']),
        ]);
        $user->save();

        return redirect()->route('profesores.vista')->with('success', 'Usuario actualizado con éxito.');
    }
}
