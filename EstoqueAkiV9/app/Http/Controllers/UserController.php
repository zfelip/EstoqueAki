<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.index', ['users' => $users]);
    }


    public function store(Request $request)
{
    $password = $request->input('password');

    // Compare a senha com a senha fixa no banco de dados
    if ($password == 'estoqueAki') {
        // Senha válida, redirecione para a página principal do sistema
        return redirect()->route('products.index'); 
    } else {
        // Senha inválida, redirecione de volta para o formulário de login com uma mensagem de erro
        return redirect()->route('users.index')->with('error', 'Senha inválida');
    }
}

}
