<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.index', ['users' => $users]);
    }


    public function store(Request $request)
{
    $userId = 1;
    $password = $request->input('password');
    $name = $request->input('name');

    // Recupere o usuário pelo nome de usuário (ou outro identificador único)
    $user = User::where('id', $userId)->first();

    // Verifique se o usuário existe e a senha fornecida e o mpm corresponde à senha no banco de dados
    if ( ($user && Hash::check($password, $user->password)) && ($user->name == $name) ) {
        // Senha válida, redirecione para a página principal do sistema, caso não tenha fornecedor cadastrado, vai para fonecedor
        if (Supplier::count() === 0) {
            return redirect()->route('suppliers.index');
        }
        return redirect()->route('products.index');
    } else {
        // Senha inválida ou usuário não encontrado, redirecione de volta para o formulário de login com uma mensagem de erro
        return redirect()->route('users.index')->with('error', 'Nome de usuário ou senha inválidos');
    }
}

}
