<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // ====================
    // Listar usuarios
    // ====================
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // ====================
    // Crear usuario
    // ====================
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'document' => 'numeric|digits_between:1,20|unique:users,document',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/', // Alfanumérica
            'role' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:7,20',
            'gender' => 'required|string|in:male,female,other',
            'birthdate' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ], [
            'document.numeric' => 'El campo documento debe ser numérico.',
            'document.digits_between' => 'El documento debe tener entre 1 y 20 dígitos.',
            'document.unique' => 'El documento ya está registrado.',
            'phone.numeric' => 'El campo teléfono debe ser numérico.',
            'phone.digits_between' => 'El teléfono debe tener entre 7 y 20 dígitos.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos una letra y un número.',
        ]);

        $user = new User();
        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->status = true; // Establecer el estado inicial como activo

        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('', 'public');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    // ====================
    // Mostrar usuario
    // ====================
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // ====================
    // Editar usuario
    // ====================
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:7,20',
            'gender' => 'required|string|in:male,female,other',
            'birthdate' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/', // Alfanumérica
            ],
        ], [
            'phone.numeric' => 'El campo teléfono debe ser numérico.',
            'phone.digits_between' => 'El teléfono debe tener entre 7 y 20 dígitos.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos una letra y un número.',
        ]);

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('', 'public');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario ' . $user->fullname . ' actualizado exitosamente.');
    }

    // ====================
    // Buscar usuarios
    // ====================
    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('fullname', 'LIKE', "%{$query}%")->get();

        $html = view('users.partials.user_list', compact('users'))->render();

        return response()->json(['html' => $html]);
    }

    // ====================
    // Deshabilitar usuario
    // ====================
    public function disable(User $user)
    {
        return view('users.disable', compact('user'));
    }

    public function toggleStatus(Request $request, User $user)
    {
        $user->status = !$user->status;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Estado del usuario actualizado exitosamente.');
    }
}
