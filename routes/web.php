<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'App\Http\Controllers\ProdutoControlador@index');

Route::post('/login', function (Request $request) {

    $login_ok = false;

    switch($request->input('user')) {
        case 'joao': 
            $login_ok = $request->input('password') === "senhajoao";
            break;
        case 'marcos': 
            $login_ok = $request->input('password') === "senhamarcos";
            break;
        case 'default':
            $login_ok = false;
    }
    if($login_ok){
        return response("Logado", 200);
    }else{
        return response("Erro no login", 404);
    }
});