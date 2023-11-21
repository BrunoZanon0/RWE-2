<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Alter;


class EventController extends Controller
{
    public function index(){
        // $eventos = Event::all();

        return view('index');
    }

    public function login(){
        return view('exem.layouts.login');
    }

    public function create(){
        return view('exem.layouts.create');
    }

    public function alter(Request $request){
        // Busca o evento pelo nome e e-mail
        $user = Auth::user();
        $event = Alter::where('name', $user->name)
                      ->where('email', $user->email)
                      ->first();
    
        // Verifica se o evento foi encontrado
        if (!$event) {
            return redirect('/editar')->with('msg', 'Evento não encontrado');
        }
    
        // Atualiza os campos do evento
        $event->name = $request->name;
        $event->telefone = $request->telefone;
        $event->email = $request->email;
        $event->link1 = $request->link1;
        $event->link2 = $request->link2;
        $event->link3 = $request->link3;
    
        // Verifica se um novo arquivo de imagem foi enviado
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->file('imagem');
            $extension = $requestImage->getClientOriginalExtension();
            $imageName = md5(uniqid() . time()) . '.' . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->img = $imageName;
        }
    
        // Adiciona um valor padrão para os campos link1, link2 e link3
        if ($event->link1 == null) {
            $event->link1 = 0;
        }
        if ($event->link2 == null) {
            $event->link2 = 0;
        }
        if ($event->link3 == null) {
            $event->link3 = 0;
        }
    
        // Salva as alterações
        $event->save();
    
        return redirect('/editar')->with('msg', 'Dados do evento alterados com sucesso!');
    }
    public function store(Request $request){
        // Verifica se o email já existe no banco de dados
        $existingEmail = Event::where('email', $request->email)->exists();
    
        // Se o email já existe, redireciona com uma mensagem de erro
        if ($existingEmail) {
            return redirect('/create')->with('msg', 'Email já existente');
        }
    
        // Se o email não existe, continua com o processo de criação do evento
        $event = new Event;
    
        $event->name = $request->nome;
        $event->password = bcrypt($request->password);
        $event->telefone = $request->telefone;
        $event->email = $request->email;
    
        // Verifica se um arquivo foi enviado no formulário
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->file('imagem');
    
            // Pegando a extensão do arquivo, !importante
            $extension = $requestImage->getClientOriginalExtension();
    
            // Olha o nome em
            $imageName = md5(uniqid() . time()) . '.' . $extension;
    
            // Nessa parte você vai mover para o arquivo de destino
            $requestImage->move(public_path('img/events'), $imageName);
    
            $event->img = $imageName;
        }
    
        // Para dar opção do usuario ter ou não links
        if ($event->link1 == null) {
            $event->link1 = 0;
        }
        if ($event->link2 == null) {
            $event->link2 = 0;
        }
        if ($event->link3 == null) {
            $event->link3 = 0;
        }
    
        $event->save();
    
        return redirect('/')->with('msg', 'Conta criada com Sucesso!');
    }
    
}
