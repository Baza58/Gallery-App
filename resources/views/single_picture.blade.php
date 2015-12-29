@extends('default')

@section('head')
	<link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
	<div>
	<h1> Fotka z galerie {{$gallery->title}} </h1>
	<a href="/home/{{$gallery->user->name}}/{{$gallery->id}}" class="btn btn-primary go-back">Zpět do galerie</a>
	</div>
	<img src="/pics/{{$picture->gallery_id}}/{{$picture->url}}" class="single-picture" alt="">
@endsection