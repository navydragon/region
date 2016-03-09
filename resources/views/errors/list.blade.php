@if ($errors->any())
<div class="alert alert-danger margin-bottom-30"><!-- DANGER -->
	<strong>Внимание!</strong> Действие не выполнено вследствие следующих ошибок:
	<ul>
		@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif