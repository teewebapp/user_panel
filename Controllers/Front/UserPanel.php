<?php

namespace Tee\UserPanel\Controllers\Front;

use Auth, View, Redirect, Request, Input, Validator;
use Hash;
use Illuminate\Support\MessageBag;
use Tee\System\Breadcrumbs;
use Tee\UserPanel\Forms\SigninForm;
use Tee\UserPanel\Forms\SignupForm;
use Tee\User\Models\User;

class UserPanel extends \Tee\System\Controllers\BaseController
{
    public function signin()
    {
        Breadcrumbs::addCrumb('Entrar', Request::fullUrl());

        $signinForm = new SigninForm(['data'=>Input::all(),'prefix'=>'signin']);

        return View::make(
            'user_panel::front.userpanel.signin',
            compact('signinForm')
        );
    }

    public function signout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}