
@if ($errors->any())
		При обработке запроса возникли ошибки:
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
@endif