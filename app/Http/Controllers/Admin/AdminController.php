<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Método para impersonar a un usuario
    public function impersonate($userId)
    {
        $user = User::find($userId);

        if ($user) {
            // Guardar el ID del administrador en la sesión
            session()->put('impersonate', Auth::id());

            // Iniciar sesión como el usuario seleccionado
            Auth::login($user);

            // Redireccionar con un mensaje de éxito
            session()->flash('flash.banner', 'Has iniciado sesión como ' . $user->name);
            session()->flash('flash.bannerStyle', 'success');

            return redirect('/');
        }

        return redirect()->back()->with('error', 'Usuario no encontrado');
    }

    // Método para dejar de impersonar a un usuario y volver a la cuenta de administrador
    public function stopImpersonating()
    {
        $adminId = session()->pull('impersonate');

        if ($adminId) {
            Auth::loginUsingId($adminId);

            session()->flash('flash.banner', 'Has vuelto a tu cuenta de administrador');
            session()->flash('flash.bannerStyle', 'success');

            return redirect('/');
        }

        return redirect()->back()->with('error', 'No se pudo dejar de impersonar al usuario');
    }
}
