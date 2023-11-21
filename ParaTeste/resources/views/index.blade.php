@extends('exem.layouts.corpo')

@section('tittle', 'Cadastro')


@section('content')
@if(session('msg'))
<p class="confirm">{{session('msg')}}</p><br>
<div class="img"><img  src="/img/confirm.gif" alt=""></div><br>

@endif
<div class="container1">
    <br>
    <img src="/img/logo.png" alt="" width="150"><br><br><br><br><br><br>
    <h5>Este site foi criado exclusivamente para fins de teste para empresa RWE. <br> Por favor, note que todas as informações e funcionalidades presentes neste site <br> são destinadas apenas para avaliação e experimentação, e não refletem necessariamente  <br> a versão final ou as características definitivas do produto ou serviço oferecido por mim.<br> Agradeço a compreensão e cooperação durante este período de teste.</h5><br><br>
    <h4>Site feito por <a href="https://brunozanon.com" target="_blank">Bruno Nascimento</a> &copy 2024</h4>
</div>

    
@endsection
