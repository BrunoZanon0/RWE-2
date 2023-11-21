@extends('exem.layouts.corpo')

@section('tittle', 'Eventos')


@section('content')


@if($mensagem = Session::get('erro'))
{{$mensagem}}
@endif
<form action="{{route('login.auth')}}" method="post" autocomplete="off">
    @if($errors->any())
    <div class="alert alert-danger">

            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach

    </div>
    @endif
<br>
    @csrf
    <img src="/img/logo.png" alt="" width="70"><br><br>
    <h3>Login</h3><br>
    <input type="text" name="email" value="bruno@gmail.com" id="idemail" 
    placeholder="Seu email"><br>
    <input type="password" name="password" id="idsenha" placeholder="Sua senha"><br>
    <button type="submit">Logar</button><br><br>

</form>

@endsection
