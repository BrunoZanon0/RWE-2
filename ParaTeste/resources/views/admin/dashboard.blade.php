@extends('admin.corpoadm')

@section('tittle', 'Eventos')


@section('content')
<div class="container"><br>
    <img src="img/logo.png" alt="" width="130"><br><br>
    <h1>Seja bem vindo(a) ao teste da RWE <br><br> {{$user->name}}</h1><br>
    <h2>Que bom ter você de volta</h2><br>
    <h2>Seu email ainda é: {{$user->email}} ? <br> <br>Caso não seja mais seu email <br><br> <a href="/editar">Clique aqui</a> <br><br>para alterar</h2>
</div>

@endsection
