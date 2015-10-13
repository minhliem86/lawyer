@extends('layouts.layout')
@section('content')
	<section class="main_content" id="testimonial-page">
		<section class="service">
			@foreach($testi as $item)
				<div class="col-sm-6">
					<article class="each_testimonial">
						<div class="img-wrap">
							<a href="{{route('user_testimonials_slug',$item->slug)}}"><img src="{{asset($item->urlHinh)}}" class="img-responsive" alt=""></a>	
						</div>
						<div class="content_service_wrap">
							<!-- <h3 class="title"><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </a></h3> -->
							{{Str::words($item->content,35)}}
							<p class="owner">{{$item->owner}}</p>
						</div>
					</article>
				</div>
				
			@endforeach
			
		</section>

		<section class="pagination">
			{{$testi->links()}}
		</section>
	</section>
@stop