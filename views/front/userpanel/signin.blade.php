@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <h2 style="padding-top:0;margin-top:0;">Entrar</h2>
                <form method="POST" action="{{ route('userpanel.signin') }}" novalidate="novalidate">
                    <div class="form-group">
                        {{ $signinForm->email->label() }}
                        {{ $signinForm->email->text(['placeholder'=>'seu-email@exemplo.com', 'class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ $signinForm->password->label() }}
                        {{ $signinForm->password->password(['class'=>'form-control']) }}
                    </div>
                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                    <div class="row checkbox">
                        <div class="col-md-6">
                            <label>
                                {{ $signinForm->remember->checkbox(1) }}
                                {{ $signinForm->remember->label }}
                            </label>
                        </div>
                        <div class="col-md-6" style="text-align:right;">
                            <a href="#">Esqueci minha senha</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Entrar</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div style="padding:19px;">
                <p class="lead">Cadastre-se agora <span class="text-success">Gratuitamente</span></p>
                <ul class="list-unstyled" style="line-height: 2">
                    <li><span class="fa fa-check text-success"></span> Veja todos os seus pedidos</li>
                    <li><span class="fa fa-check text-success"></span> Refaça pedidos antigos</li>
                    <li><span class="fa fa-check text-success"></span> Marque os seus favoritos</li>
                    <li><span class="fa fa-check text-success"></span> Compre rapidamente</li>
                </ul>
                <p><a href="{{ route('user.register') }}" class="btn btn-info btn-block">Cadastrar</a></p>
            </div>
        </div>
    </div>
@stop