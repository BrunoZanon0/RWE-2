<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartaoController extends Controller
{
    public function cartao(){
        if(Auth::check()){

            $user = Auth::user();

            return view('admin.cartao', ['user' => $user]);
        }else {
            // O usuário não está autenticado, redireciona para a página de login
            return redirect()->route('site.login')->with('error', 'Usuário ou senha inválida');
        }
    }
}
