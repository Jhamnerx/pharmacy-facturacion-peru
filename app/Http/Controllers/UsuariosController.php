<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    public function index()
    {

        return view('admin.usuarios.index');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.usuarios.index')->with('delete', 'usuario eliminado');
    }
}
