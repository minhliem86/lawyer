		<div class="container">
			<div class="row">
				<footer>
					<div class="col-sm-4">
						<a href="{{URL::to('/')}}" id="small-logo"><img src="{{asset('public/frontend')}}/images/small_logo.png" class="img-responsive" alt=""></a>
						<p class="copyright">Copyright @ 2015 by Laywer</p>
					</div>
					<div class="col-sm-5 hidden-xs" >
						<h3 class="cate-footer">Categories</h3>
						<ul class="nav_footer">
							<li><a href="{{URL::to('/')}}">Home</a></li>
							<li><a href="{{URL::to('/about')}}">About Us</a></li>
							<li><a href="{{URL::route('user_service')}}">Services</a></li>
							<li><a href="{{URL::to('/contact')}}">Contact Us</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<h3 class="contact">Contact Us</h3>
						<p class="add"><b>Address:</b> {{$contact->address}}</p>
						<p class="phone"><b>Phone:</b> {{$contact->phone}}</p>
						<p class="email"><b>Email:</b> {{$contact->email}}</p>
					</div>
				</footer>
			</div>
		</div>


	</div>
</div>