@extends('layouts.layout')

@section('content')
	<section class="main_content" id="contact-page">
		<div class="col-sm-7">
			{{Form::open(array('route'=>'contactPost', 'class'=> 'form-contact'))}}
				<fieldset>
					<legend>Contact Us</legend>
					<div class="form-group">
						<label for="fullname">Full name</label>
						{{Form::text('fullname','',array('class'=> 'form-control fullname'))}}
						<span class="error">{{$errors->first('fullname')}}</span>
						
					</div>
					<div class="form-group">
						<label for="phone">Your Phone</label>
						{{Form::text('phone','',array('class'=> 'form-control phone'))}}
						<span class="error">{{$errors->first('phone')}}</span>
					</div>
					<div class="form-group">
						<label for="email">Your Email</label>
						{{Form::text('email','',array('class'=> 'form-control email'))}}
						<span class="error">{{$errors->first('email')}}</span>
					</div>
					<div class="form-group">
						<label for="message">Your Message</label>
						{{Form::textarea('message','',array('class'=> 'form-control message'))}}
					</div>
					<div class="form-group">
						<label for="message">Please enter the captcha code</label>
						<div class="row">
							<div class="col-sm-6">
								{{HTML::image(Captcha::img(), 'Captcha Image')}}
							</div>
							<div class="col-sm-6">
								{{Form::text('captcha','',array('class'=>'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group form-submit">
						{{Form::submit('Send',array('class'=> 'btn btn-primary submit'))}}
						@if(Session::has('noti'))
							<h4 class="success">{{Session::get('noti')}}</h4>
						@endif
					</div>
				</fieldset>
			{{Form::close()}}
		</div>

		<div class="col-sm-5">
			<section class="map">
				{{$contact->map}}
			</section>
		</div>
	</section>
@stop

@section('script')
	{{HTML::script('public/frontend/js/jquery.validate.min.js')}}
	<script type="text/javascript">
		$(document).ready(function(){
			$(".form-contact").validate({
				errorElement: "span",
				rules: {
					fullname: "required",
					email: {required: true, email: true},
					phone: { required: true, digits: true, minlength: 10, maxlength: 11 },
				},
				// submitHandler:function(){
				// 	// $.ajax({
				// 	// 	url:"{{URL::route('contactPost')}}",
				// 	// 	type:'POST',
				// 	// 	data:{name:name, phone:phone, email:email, message: message},
				// 	// 	beforeSend:function(){
							
				// 	// 		$(".form-submit").append('<p class="alert-contact">Please wait a moment while server progress ... </p>');
				// 	// 	},
				// 	// 	success:function(data){
				// 	// 		$(".form-submit p.alert-contact").remove();
				// 	// 		$(".form-submit").append('<h3>'+data.kq +'</h3>');
				// 	// 	}
				// 	// })
				// }
			});
			// $(".form-contact").submit(function(e){
			// 	var name = $(".fullname").val();
			// 	var phone = $(".phone").val();
			// 	var email = $(".email").val();
			// 	var message = $(".message").val();
			// 	e.preventDefault();
				
			// });
		
			
		})
	</script>
@stop()

