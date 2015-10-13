@extends('layouts.layout')
@section('content')
	<section class="main_content" id="about-page">
		<h2 class="title">{{$about->title}}</h2>
		<p class="content">{{$about->content}}</p>
	</section>
@stop