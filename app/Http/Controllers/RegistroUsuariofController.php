<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistroUsuariofController extends Controller
{
    
    /**
     * 1. MUESTRA EL PANEL PRINCIPAL
     * Carga el formulario y el listado de profesores en la misma pantalla (regusuario.blade.php).
     */
    public function mostrarPanel(Request $request)
    {
        // Jalamos todos los usuarios de la base de datos para la tabla derecha
        $users = User::latest()->get();

        // Inicializamos la edición como vacía
        $userToEdit = null;

        // Si el usuario hace clic en "Editar", la URL tendrá un ?edit=ID
        if ($request->has('edit')) {
            $userToEdit = User::find($request->edit);
        }

        // Abrimos tu archivo regusuario.blade.php pasando los datos de forma segura
        return view('regusuarios', compact('users', 'userToEdit'));
    }

    /**
     * 2. GUARDA UN NUEVO PROFESOR
     * Se activa al presionar el botón azul de guardar.
     */
    public function guardarProfesor(Request $request)
    {
        // Validaciones
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'ci_user' => 'required|int',
            'email' => 'required|string|email|max:255',
            
            'password' => 'required|string',
            'estado_activo' => 'required|string',
        ]);

         $inicialapellido = Str::upper(Str::substr($request->last_name, 0, 1));
         $nombrelimpio = Str::ascii($request->name);
         $userNameBase = str_replace(' ', '', $nombrelimpio . $inicialapellido);
         $namemayus = Str::title($request->name);
         $last_namemayus = Str::title($request->last_name);


        // Inserta
        User::create([
            'name' => $namemayus,
            'last_name' => $last_namemayus,
            'ci_user' => $request->ci_user,
            'user_name' => $userNameBase,
            'email' => $request->email,
            
            'password' => Hash::make($request->password), // Contraseña protegida
            'estado_activo' => $request->estado_activo,
        ]);

        // Redireccionamiento
        return redirect()->route('profesores.vista')->with('success', 'Usuario registrado con éxito.');
    }

    /**
     *uPdAtE
     */
    public function actualizarProfesor(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'ci_user' => 'required|int',
            'email' => 'required|string|email',
            
            'password' => 'nullable|string|min:6', // Opcional al editar
            'estado_activo' => 'required|string',
        ]);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->ci_user = $request->ci_user;
        $user->email = $request->email;
    
        $user->estado_activo = $request->estado_activo;

        // Si escribió algo en el campo contraseña, la encriptamos y actualizamos
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profesores.vista')->with('success', 'Usuario actualizado con éxito.');
        
    }

    
}

