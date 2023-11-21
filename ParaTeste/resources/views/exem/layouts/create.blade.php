@extends('exem.layouts.corpo')

@section('tittle', 'Eventos')


@section('content')

@if(session('msg'))
<p class="negative">{{session('msg')}}</p><br>
<div class="img"><img  src="/img/x.gif" alt=""></div><br>

@endif

<form action="/event" method="post" enctype="multipart/form-data" autocomplete="off" class="formulario"><br>
    <img src="/img/logo.png" alt="" width="70"><br>
    <img src="/img/icon.png" alt="" width="70">
    <h3>Cadastramento</h3>
    @csrf
    <input type="text" name="nome" id="idnome" placeholder="Seu nome" class="validando"><br>
    <input type="password" name="password" id="idsenha" placeholder="Sua senha" class="validando senha1"><br>
    <input type="password" name="senha2" id="idsenha" placeholder="Comfirme sua senha" class="validando senha2"><br>
    <input type="text" name="telefone" id="idtelefone" placeholder="contato/cel" class="validando"><br>
    <input type="email" name="email" id="idtelefone" placeholder="Email" class="validando"><br>
    <input type="file" name="imagem" id="imagem" class="imagem validando"><p>Por favor imagens menores que 2MB</p>
    
    <button type="submit">Cadastrar</button><br><br>
</form>

<script src="/js/cadastro.js"></script>

@endsection
