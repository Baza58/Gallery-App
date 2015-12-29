@extends('default')

@section('head')
	<title>Galerie | Úvod</title>
	<link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
	<div class="jumbotron">
  		<h1>Vítejte v aplikaci Galerie!</h1>
  		<p>Zde můžete vytvářet galerie, přídávat fotky a sdílet s ostatními</p>
  		@if (Auth::check())
			<p><a class="btn btn-primary btn-lg" href="/home/{{Auth::user()->name}}" role="button">Moje galerie</a></p>
  		@else
			<p><a class="btn btn-primary btn-lg" href="/registrovat" role="button">Zaregistrovat</a></p>
		@endif

	</div>
@endsection