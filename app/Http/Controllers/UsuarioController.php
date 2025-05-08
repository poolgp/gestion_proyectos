<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function showLogin()
    {
        // $usuario1 = new Usuario();

        // $usuario1->nombre_u = 'usuario1';
        // $usuario1->contraseña_u = \bcrypt('user1');

        // $usuario1->save();

        // $usuario2 = new Usuario();

        // $usuario2->nombre_u = 'usuario2';
        // $usuario2->contraseña_u = \bcrypt('user2');

        // $usuario2->save();

        // $usuario3 = new Usuario();

        // $usuario3->nombre_u = 'usuario3';
        // $usuario3->contraseña_u = \bcrypt('user3');

        // $usuario3->save();

        return view("auth.login");
    }

    public function login(Request $request)
    {
        $username = $request->input("username");
        $password = $request->input("password");

        $user = Usuario::where('nombre_u', $username)->first(); /* ERROR */

        if ($user != null && Hash::check($password, $user->contraseña_u)) {
            Auth::login($user);
            $response = redirect('/home');
        } else {
            $request->session()->flash('error', 'Usuari o contraseña incorrectos');
            $response = redirect('/login')->withInput();
        }

        return $response;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
