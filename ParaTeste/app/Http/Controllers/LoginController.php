<?php

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function dashboard(){
    if (Auth::check()) {
        // Obtém os dados do usuário autenticado
        $user = Auth::user();

        // Agora você pode acessar os atributos do usuário, por exemplo:
        $nome = $user->name;
        $email = $user->email;

        // Ou você pode passar o objeto $user diretamente para a view
        return view('admin.dashboard', ['user' => $user]);
    } else {
        // O usuário não está autenticado, redireciona para a página de login
        return redirect()->route('site.login')->with('error', 'Usuário ou senha inválida');
    }
    }

    public function exit(){
        if(Auth::check()){
            Auth::logout(); // Desloga o usuário
            session()->flush(); // Destrói todos os dados da sessão
            session()->regenerate(); // Regenera o ID da sessão
            return redirect('/')->with('msg', 'Conta Deslogada com Sucesso.');
        }else {
            // O usuário não está autenticado, redireciona para a página de login
            return redirect()->route('site.login')->with('error', 'Usuário ou senha inválida');
        }
    }

    public function editar(){
        if (Auth::check()) {
            // Obtém os dados do usuário autenticado
            $user = Auth::user();
    
            // Agora você pode acessar os atributos do usuário, por exemplo:
            $nome = $user->name;
            $email = $user->email;
    
            // Ou você pode passar o objeto $user diretamente para a view
            return view('admin.alterar', ['user' => $user]);
        } else {
            // O usuário não está autenticado, redireciona para a página de login
            return redirect()->route('site.login')->with('error', 'Usuário ou senha inválida');
        }
    }
    public function auth(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('/dashboard');
        } else {

            return redirect()->route('site.login')->with('error', 'Credenciais inválidas');
        }
    }
}
