@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="well" style="padding:19px;">
                <h2 style="padding-top:0;margin-top:0;">Cadastre-se</h2>
                @if($errors && $errors->any())
                    <div class="alert alert-danger" role="alert">
                        <h4>Atenção</h4>
                        <p>
                            <ul>
                                @foreach($errors->all() as $message)
                                <li>
                                    {{ $message }}
                                </li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                @endif
                <form method="POST" action="{{ route('user.register') }}" novalidate="novalidate">
                    <div class="form-group">
                        {{ $signupForm->fullName->label() }}
                        {{ $signupForm->fullName->text(['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ $signupForm->email->label() }}
                        {{ $signupForm->email->email(['placeholder'=>'seu-email@exemplo.com', 'class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ $signupForm->password->label() }}
                        {{ $signupForm->password->password(['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ $signupForm->passwordConfirm->label() }}
                        {{ $signupForm->passwordConfirm->password(['class'=>'form-control']) }}
                    </div>
                    <div class="alert alert-info">
                        Mais informações serão solicitadas assim que necessárias.
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Finalizar cadastro</button>
                </form>
            </div>
        </div>
    </div>
@stop