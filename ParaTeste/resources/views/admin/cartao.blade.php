@extends('admin.corpoadm')

@section('tittle', 'Eventos')


@section('content')
<div class="container"><br><br><br>
    <img src="img/logo.png" alt="" width="130"><br><br>
    <h1>Veja como fica seu cartao</h1><br><br>

    <div class="cartao-container" style="display: none;"><br>

        <div class="produto-container">
        <h2>{{$user->name}}</h2><br>
        <h4>Email:    {{$user->email}}</h4><br>
        <h4>Telefone: {{$user->telefone}}</h4><br>
        @if($user->link1 != '0')
        <h5>Instagram: {{$user->link1}}</h5>
        @endif<br>
        @if($user->link2 != '0')
        <h5>Facebook: {{$user->link2}}</h5>
        @endif<br>
        @if($user->link3 != '0')
        <h5>Linkedin: {{$user->link3}}</h5>
        @endif
        </div>

        <div class="foto-cartao">

        <img class='perfil-cartao' src="img/events/{{$user->img}}" alt="" width="200">       
            
        </div>
    </div><br><br><br>
    <a class="imprimir" href="javascript:void(0);" onclick="window.print();"><img src="/img/print.png" alt=""></a>
</div>

<script>
    function exibirDiv() {
        document.querySelector('.cartao-container').style.display = 'block';
    }

    setTimeout(exibirDiv, 500);
</script>

@endsection
