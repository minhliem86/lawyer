<!-- HEADER -->
<div class="col-xs-12" id="header">
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<a href="{{URL::to('/')}}" target="_blank" id="logo"><img class="img-responsive" src="{{URL::to('public/backend/images/logo-admin.png')}}" style="height:60px;" alt="logo" /></a>
		</div>
		<div class="col-xs-12 col-sm-9">
			<div class="wrap-right-header">
				<!--
				<div id="search-wrap">
					<form action="" method="" id="formSearch">
						<input type="text" name="search" placeholder="Search here" class="form-control" />
					</form>
				</div>	end search-wrap -->

				<div id="user-pannel">
					<a href="javascript:void()" data-toggle="dropdown">
						<img src="{{URL::to('public/backend/images/avatar.png')}}" height="25" width="25"  />
						<span id="user">Hello,{{Auth::user()->username}}  </span><span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!-- <li><a href="{{URL::route('admin_createUser')}}">Create User</a></li> -->
						<li><a href="{{URL::route('getUser',array(Auth::id()))}}">Change Password</a></li>
						<li><a href="{{URL::route('admin_logout')}}">Logout</a></li>
					</ul>
				</div>	<!-- end user-pannel -->
			</div>
		</div>
	</div>
</div>	<!-- end header -->