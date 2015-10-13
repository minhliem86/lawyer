@extends('layouts.layout')
@section('content')
	<section class="main_content" id="service-page">
		<section class="service">
			@foreach($newsfeed as $item)
				<div class="col-sm-6">
					<article class="each_service">
						<div class="img-wrap">
							<a href="{{URL::route('user_newsfeed_slug', array($item->slug))}}"><img src="{{asset($item->urlHinh)}}" class="img-responsive" alt=""></a>
						</div>
						<div class="content_service_wrap">
							<h3 class="title"><a href="{{URL::route('user_newsfeed_slug', array($item->slug))}}">{{$item->title}}</a></h3>
							<p class="text_service">{{Str::words($item->content,10)}}</p>
							<a href="{{URL::route('user_newsfeed_slug', array($item->slug))}}" class="">See more</a>
						</div>
					</article>
				</div>
				
			@endforeach
			
		</section>

		<section class="pagination">
			{{$newsfeed->links()}}
		</section>
	</section>
@stop