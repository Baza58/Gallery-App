@if(session()->has('info'))

	<div class="alert alert-info">
		{{session()->get('info')}}
	</div>
@endif