<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1/auth',
], function () {
    Route::post('register', 'UserControllerAPI@register');
    Route::post('login', 'UserControllerAPI@login');
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'v1/user',
], function () {
    Route::get('profile', 'UserControllerAPI@getAuthenticatedUser');
    
});


