<?php

namespace Tee\UserPanel;

use Route, View;

Route::any('/userpanel/signin', [
    'as' => 'userpanel.signin',
    'uses' => __NAMESPACE__.'\Controllers\Front\UserPanel@signin'
]);

Route::any('/user/register', [
    'as' => 'user.register',
    'uses' => __NAMESPACE__.'\Controllers\Front\Register@index'
]);

Route::any('/user/confirm', [
    'as' => 'user.confirm',
    'uses' => __NAMESPACE__.'\Controllers\Front\Register@confirm'
]);

Route::any('/userpanel/signout', [
    'as' => 'userpanel.signout',
    'uses' => __NAMESPACE__.'\Controllers\Front\UserPanel@signout'
]);