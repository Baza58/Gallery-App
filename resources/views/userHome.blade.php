@extends('default')

@section('head')
	<title>Galerie | {{ $author }}</title>
	<meta name="author" content="{{ $author }}" >
@endsection

@section('content')
	<div class="app"></div>
@endsection

@section('scripts')
<script src="/js/galleryHomePublic.js"></script>
@endsection