<?php

use Illuminate\Http\Request;
use App\Task;
use App\News;

Route::get('/', function() {
    return view('index');
})->name('home');

Route::group(['prefix' => 'news'], function() {
    Route::get('/', function() {
	$all_news = News::all();
	return view('news.index', [
	    'all_news' => $all_news,
	]);
    })->name('news_index');

    Route::post('/', function(Request $request) {
	
    })->name('news_store');

    Route::delete('/{news}', function(News $news) {
	
    })->name('news_destroy');
    
     Route::get('/{task}/edit', function(Task $task) {
	 
     })->name('news_edit');

    Route::patch('/{news}', function(Request $request, News $news) {
	
    })->name('news_update');
});

Route::group(['prefix' => 'tasks'], function() {
    Route::get('/', function () {
	$tasks = Task::all();
	return view('tasks.index', [
	    'tasks' => $tasks, //значение переменной tasks спроєцируется в переменную tasks внутри view
	]); // в уроке это вид tasks
    })->name('tasks_index');

    Route::post('/', function(Request $request) {

	$validator = Validator::make($request->all(), [
		    'name' => 'required|max:255',
	]);
	if ($validator->fails()) {
	    return redirect(route('tasks_index'))
			    ->withInput()
			    ->withErrors($validator);
	}
	$task = new Task();
	$task->name = $request->name;
	$task->save();
	return redirect(route('tasks_index'));
    })->name('tasks_store');

    Route::delete('/{task}', function(Task $task) {
	$task->delete();
	return redirect(route('tasks_index'));
    })->name('tasks_destroy');

    Route::get('/{task}/edit', function(Task $task) {
	return view('tasks.edit', [
	    'task' => $task,
	]);
    })->name('tasks_edit');

    Route::patch('/{task}', function(Request $request, Task $task) {
	$validator = Validator::make($request->all(), [
		    'name' => 'required|max:255',
	]);
	if ($validator->fails()) {
	    return redirect(route('tasks_edit', $task->id))
			    ->withInput()
			    ->withErrors($validator);
	}
	$task->name = $request->name;
	$task->save();
	return redirect(route('tasks_index'));
    })->name('tasks_update');
});



