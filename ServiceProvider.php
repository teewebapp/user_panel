<?php

namespace Tee\UserPanel;

use App;
use Event;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function register()
    {
        Event::listen('front::menu.load', function($menu) {
            $menu->add('Entrar', route('userpanel.signin'));
        });
    }
}
