@if (count($errors) > 0)
<!-- Список ошибок формы -->
<div class="alert alert-danger">
    <span style='margin: 5px'>Упс! Что-то пошло не так!</span>>
    <ul>
	@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
	@endforeach
    </ul>
</div>
@endif
