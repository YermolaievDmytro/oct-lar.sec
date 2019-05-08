<?php

use Illuminate\Http\Request;
use App\Task;

Route::get('/', function () {
    $tasks = Task::all();
    return view('tasks.index', [
	'tasks' => $tasks, //значение переменной tasks спроєцируется в переменную tasks внутри view
    ]); // в уроке это вид tasks
});

Route::post('/tasks', function(Request $request) {

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

Route::delete('/tasks/{task}', function(Request $request, Task $task) {
    $task->delete();
    return redirect('/');
});

Route::get('/tasks/{task}/edit', function(Task $task) {
    $task = Task::find();
    return view('tasks.edit', [
	'task' => $task,
    ]);
});
