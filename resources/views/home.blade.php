@extends('default')

@section('head')
	<title>Galerie | Moje Galerie</title>
	<meta name="author" content="{{ $author }}" >
@endsection

@section('content')
<h1>Moje Galerie</h1>
<div class="app"></div>
@endsection

@section('scripts')
<script src="/js/galleryHome.js"></script>
@endsection