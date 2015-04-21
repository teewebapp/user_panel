<?php

namespace Tee\UserPanel\Controllers\Front;

use Auth, View, Redirect, Request, Input, Validator;
use Hash, Mail, DB;
use Illuminate\Support\MessageBag;
use Tee\System\Breadcrumbs;
use Tee\UserPanel\Forms\SignupForm;
use Tee\User\Models\User;

class Register extends \Tee\System\Controllers\BaseController
{
    public function index()
    {
        Breadcrumbs::addCrumb('Cadastrar', Request::fullUrl());

        $signupForm = new SignupForm([
            'data' => Input::all(),
            'prefix' => 'signup'
        ]);

        $errors = new MessageBag;

        if(Input::method() == 'POST') {
            if($signupForm->isValid()) {
                try {
                    DB::beginTransaction();
                    $user = new User;
                    $user->name = $signupForm->fullName->value;
                    $user->email = $signupForm->email->value;
                    $user->password = Hash::make($signupForm->password->value);
                    if($user->save()) {
                        Mail::send('user_panel::mails.welcome', ['user'=>$user], function($message) use($user) {
                            $message->to($user->email)->subject('Seja bem vindo');
                        });
                        DB::commit();
                        return Redirect::route('userpanel.signin')->with('success', 'Usuário cadastrado com sucesso!');
                    } else {
                        $errors->add('other', 'Não foi possível cadastrar');
                    }
                } catch(Exception $e) {
                    DB::rollback();
                    throw $e;
                }
            } else {
                $errors = $signupForm->errors();
            }
        }

        return View::make(
            'user_panel::front.register.index',
            compact('signupForm', 'errors')
        );
    }

    public function confirm()
    {
        Breadcrumbs::addCrumb('Confimar email', Request::fullUrl());

        $user = User::find(Input::get('user'));
        $key = Input::get('key');
        $error = $success = null;

        if($user->confirm_key == $key) {
            $user->email_confirmed = 1;
            $user->save();
            $success = 'Email confirmado com sucesso!';
        } else {
            $error = 'Não foi possível confirmar o seu email';
        }

        return View::make(
            'user_panel::front.register.confirm',
            compact('success', 'error')
        );
    }
}