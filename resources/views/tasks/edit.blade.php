@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{ route('tasks_update', $task->id) }}" method="POST" class="form-horizontal">
        {{csrf_field()}}
        {{method_field('patch')}}
        <input type="hidden" name="id" value="{{$task['id']}}"/>
        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">                
                <button type="submit" class="btn btn-default bg-success">
                    Сохранить изменения
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
