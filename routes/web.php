<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'App\Http\Controllers\ProdutoControlador@index');

Route::get('/negado', function () {
    return "Acesso negado";
})->name('negado');


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
        $login = ['user'=> $request->input('user')];
        $request->session()->put('login', $login);
        return response("Logado", 200);
    }else{
        $request->session()->flush();
        return response("Erro no login", 404);
    }
});

Route::get('/logout', function (Request $request) {
    $request->session()->flush();
    return response('Deslogado com sucesso');
});