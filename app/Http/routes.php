<?php

use Illuminate\Http\Request;
use App\Task;

Route::get('/', function () {
    return view('tasks.index'); // в уроке это вид tasks
});

Route::post('/task', function(Request $request) {

    $validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
	return redirect('/')
			->withInput()
			->withErrors($validator);
    }
    $task = new Task();
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});
