<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <form action="{{ route('news_store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Новость</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
                <textarea name="text" style="width: 100%; margin-top: 10px;" placeholder="Введите текст новости"></textarea>
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-success">
                    <i class="fa fa-plus"></i> Добавить новость
                </button>
            </div>
        </div>
    </form>

</div>

