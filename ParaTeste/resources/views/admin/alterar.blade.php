@extends('admin.corpoadm')

@section('tittle', 'Perfil')


@section('content')
<div class="container"><br>
    <form action="/alter" method="post" enctype="multipart/form-data" class="formulario">
        @csrf
    <h1>Alterar seus dados?</h1>
    <div class="container-img"><img class='perfil-img' src="img/events/{{$user->img}}" alt=""></div>
        <input type="text" name="name" id="idname" placeholder="{{$user->name}}" class="validando">
        <input type="tel" name="telefone" id="idtelefone" placeholder="{{$user->telefone}}" class="validando">
        <input type="email" name="email" id="idemail" placeholder="{{$user->email}}" class="validando">
        <input type="file" name="imagem" id="imagem" placeholder="Sua imagem">
            <h5>Instagram</h5>
        <input type="link1" name="link1" id="idlink1" placeholder="{{$user->link1}}" class="validando">
        <h5>Facebook</h5>
        <input type="link2" name="link2" id="idlink2" placeholder="{{$user->link2}}" class="validando">
        <h5>Linkedin</h5>
        <input type="link3" name="link3" id="idlink3" placeholder="{{$user->link3}}" class="validando"><br>
        <button type="submit">Confirmar</button>
        <br><br>
    </form>
    <script src="/js/alter.js"></script>
</div>

@endsection
