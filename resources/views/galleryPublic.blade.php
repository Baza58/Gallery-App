@extends('default')

@section('head')
	<title>Galerie | {{ $gallery_title }}</title>
	<meta name="author" content="{{ $author }}">
	<meta name="description" content="{{ $description }}">
@endsection

@section('content')

	<div class="app"></div>

@endsection

@section('scripts')
	<script src="/js/galleryViewPublic.js"></script>
@endsection