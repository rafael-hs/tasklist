<?php

/*
| Web Routes
*/

Route::group(["prefix" => "tarefas"], function() {
    Route::get('/',"TarefasController@index");
    Route::get("/novo","TarefasController@novoView");
    Route::get("/{id}/editar","TarefasController@editarView");
    Route::post("/store","TarefasController@store");
});