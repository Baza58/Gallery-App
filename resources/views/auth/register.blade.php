@extends('default')

@section('content')
	
	<h1>Zaregistujte se</h1>

	<form method="POST" action="registrovat" >
    {!! csrf_field() !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="control-label">Jméno</label>
        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" >
        @if($errors->has('name'))
			@foreach($errors->get('name') as $error)
				<p class="control-label">{{ $error }}</p>
			@endforeach
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control" >
        @if($errors->has('email'))
			@foreach($errors->get('email') as $error)
				<p class="control-label">{{ $error }}</p>
			@endforeach
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="heslo" class="control-label">Heslo</label>
        <input type="password" name="password" id="heslo" class="form-control" >
        @if($errors->has('password'))
			@foreach($errors->get('password') as $error)
				<p class="control-label">{{ $error }}</p>
			@endforeach
        @endif
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="heslo-znova class="control-label"">Heslo kontrola</label>
        <input type="password" name="password_confirmation" id="heslo-znova" class="form-control" >
        @if($errors->has('password_confirmation'))
			@foreach($errors->get('password_confirmation') as $error)
				<p class="control-label">{{ $error }}</p>
			@endforeach
        @endif
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Registrovat</button>
    </div>
</form>

@endsection