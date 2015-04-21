@extends('layouts.mail')

@section('content')
    <div style="font-size:1.2em;font-weight:bold;">Oi {{{ $user->first_name }}},</div>
    <p>
        Estamos muito felizes em ver que uma pessoa incrível como você se uniu à nós.
    </p>
    <p>
        Só precisamos que você confirme o seu email clicando no link abaixo.
    </p>
    <div style="text-align:center;">
        <a href="{{{ $user->confirm_url }}}" style="text-decoration:none;color:#ffffff;font-weight:bold;padding:14px 32px;display:block;background-color:rgb(98, 169, 63);display:block;margin:2em auto 0;max-width:200px;">Confirmar email</a>
    </div>
@stop