@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
@include('news.create');
@if (count($all_news) > 0)
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped task-table">	    
            <!-- Заголовок таблицы -->
            <thead>
                <tr>
                    <th>Новости</th>
                    <th colspan="2">Действие</th>
                </tr>
            </thead>
            <!-- Тело таблицы -->
            <tbody>
                @foreach ($all_news as $news)
                <tr>
                    <!-- Имя задачи -->
                    <td class="table-text">
                        <div><a href="{{route('news_show', $news->id)}}">{{ $news->name }}</a></div>
                    </td>

                    <td>
                        <form action="{{route('news_destroy',$news->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="hidden" name='id' value=""/>
                            <button type="submit" class="btn btn-default bg-danger">
                                <i class="fa fa-trash"></i> Удалить
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('news_edit',$news->id)}}" method="post">
                            {{method_field('get')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-default bg-warning">
                                <i class="fa fa-edit"></i>Редактировать
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
