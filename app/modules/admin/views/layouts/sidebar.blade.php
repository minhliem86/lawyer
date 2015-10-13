<div class="col-xs-3 col-sm-2" id="sidebar">
	<ul class="sidebar-menu">
		<li><a href="{{URL::to('admin/homepage')}}" class="{{Active::setActive('2','homepage')}}"><span class=""></span>Home Page</a></li>
		<li><a href="{{URL::to('admin/about')}}" class="{{Active::setActive('2','about')}}"><span class=""></span>About Us Page</a></li>
		<li><a href="{{URL::to('admin/contact')}}" class="{{Active::setActive('2','contact')}}"><span class=""></span>Contact Us Page</a></li>
		<li><a href="{{URL::to('admin/service')}}" class="{{Active::setActive('2','service')}}"><span class=""></span>Services Page</a></li>
		<li><a href="{{URL::to('admin/testimonial')}}" class="{{Active::setActive('2','testimonial')}}"><span class=""></span>Testimonial Page</a></li>
		<li><a href="{{URL::to('admin/newsfeed')}}" class="{{Active::setActive('2','newsfeed')}}"><span class=""></span>News Feed Page</a></li>
		<li><a href="{{URL::route('admin_getAlbum')}}" class="{{Active::setActive('2','album')}}"><span class=""></span>Albums</a></li>
		<li><a href="{{URL::route('admin_getImage')}}" class="{{Active::setActive('2','hinhanh')}}"><span class=""></span>Images</a></li>
		<li><a href="{{URL::route('admin.customer.index')}}" class="{{Active::setActive('2','customer')}}"><span class=""></span>Customer' Email</a></li>
		
		<li role="presentation" class="divider"></li>
		
		
		<li><a href="{{URL::route('admin_getMeta')}}" class="{{Active::setActive('2','config-system')}}"><span class="glyphicon glyphicon-cog"></span>Config System</a></li>
		<!-- <li><a href=" class="{{Active::setActive('2','managmentUser')}}"><span class="glyphicon glyphicon-user"></span>Quản lý Users</a></li> -->

	</ul>
</div>	<!-- end sidebar -->