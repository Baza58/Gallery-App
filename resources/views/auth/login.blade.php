@extends('default')

@section('content')
	
</form>

	<h1>Přihlaste se</h1>

	<form method="POST" action="prihlasit" >
    {!! csrf_field() !!}

    

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

    <div class="form-group">
        <input type="checkbox" name="remember" class=""> Zapamatovat
    </div>

    

    <div>
        <button type="submit" class="btn btn-primary">Přihlásit se</button>
    </div>
</form>

@endsection