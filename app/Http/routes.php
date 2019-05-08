<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('tasks.index'); // в уроке это вид tasks
});

Route::post('/task',function(Request $request){
    
});
