<?php

// LOGIN

Route::get('admin',function(){
	return View::make('admin::login')->with('title', 'Login');
});

Route::post('admin/login',array('as'=>'admin_login_post','before'=>'csrf','uses'=>'admin\controllers\UserController@postlogin'));
Route::get('admin/logout',array('as'=>'admin_logout','before'=>'checkLogin','uses'=>'admin\controllers\UserController@logout'));

// REST PASSWORD
Route::post('admin/forgetPassword',array('as'=>'post_forgetPassword','uses'=>'admin\controllers\UserController@post_forgetPassword'));
Route::get('admin/resetpassword/{id}/{code}',array('as'=>'requestResetPassword','uses'=>'admin\controllers\UserController@checkCodeReset'))->where('id','[0-9]+')->where('code','[0-9a-zA-Z]+');

Route::group(array('prefix'=>'admin','before'=>'checkLogin'),function(){
	Route::get('home',array('as'=>'admin_home',function(){
		return View::make('admin::pages.home')->with('title','Dashboard');
	}));

	// Home
	Route::controller('homepage','admin\controllers\HomeController',array('getIndex'=>'home', 'postSave'=>'home.edit'));

	// ABOUT
	Route::controller('about','admin\controllers\AboutController',array('getIndex'=>'about', 'postSave'=>'about.edit'));

	// CONTACT
	Route::controller('contact', 'admin\controllers\ContactController', array('getIndex'=>'contact','postSave'=>'contact.edit'));


	// NEWSFEED
	Route::post('newsfeed/deleteall',array('as'=>'newsfeedDeleteAll','uses'=>'admin\controllers\NewsfeedController@deleteAll'));
	Route::get('newsfeed/delete/{id}',array('as'=>'newsfeedDelete','uses'=>'admin\controllers\NewsfeedController@delete'))->where('id','[0-9]+');
	Route::post('newsfeed/visible',array('as'=>'admin_newsfeedVisible', 'uses'=>'admin\controllers\NewsfeedController@visible' ));
	Route::resource('newsfeed','admin\controllers\NewsfeedController');

	// TESTIMONIAL
	Route::post('testimonial/deleteall',array('as'=>'testimonialDeleteAll','uses'=>'admin\controllers\TestiController@deleteAll'));
	Route::get('testimonial/delete/{id}',array('as'=>'testimonialDelete','uses'=>'admin\controllers\TestiController@delete'))->where('id','[0-9]+');
	Route::post('testimonial/visible',array('as'=>'admin_testimonialVisible', 'uses'=>'admin\controllers\TestiController@visible' ));
	Route::resource('testimonial','admin\controllers\TestiController');

	//SERVICE
	Route::post('service/deleteall',array('as'=>'serviceDeleteAll','uses'=>'admin\controllers\ServicesController@deleteAll'));
	Route::get('service/delete/{id}',array('as'=>'serviceDelete','uses'=>'admin\controllers\ServicesController@delete'))->where('id','[0-9]+');
	Route::post('service/visible',array('as'=>'admin_serviceVisible', 'uses'=>'admin\controllers\ServicesController@visible' ));
	Route::resource('service','admin\controllers\ServicesController');

	// CUSTOMER REQUEST
	Route::resource('customer','admin\controllers\CustomerController');
	Route::get('customer/delete/{id}',array('as'=>'admin_customerDelete','uses'=>'admin\controllers\CustomerController@delete'))->where('id','[0-9]+');
	Route::post('customer/deleteAll',array('as'=>'admin_customerDeleteAll','uses'=>'admin\controllers\CustomerController@deleteAll'));	
	// ALBUM
	Route::get('album',array('as'=>'admin_getAlbum','uses'=>'admin\controllers\AlbumController@getAlbum'));
	Route::get('album/{id}',array('as'=>'admin_editAlbum','uses'=>'admin\controllers\AlbumController@editAlbum'))->where('id','[0-9]+');
	Route::post('album/{id}',array('as'=>'admin_post_editAlbum','uses'=>'admin\controllers\AlbumController@post_editAlbum'))->where('id','[0-9]+');
	Route::get('album/add',array('as'=>'admin_addAlbum','uses'=>'admin\controllers\AlbumController@addAlbum'));
	Route::post('album/add',array('as'=>'admin_post_addAlbum','before'=>'csrf','uses'=>'admin\controllers\AlbumController@post_addAlbum'));
	Route::get('album/delete/{id?}',array('as'=>'admin_deleteAlbum','uses'=>'admin\controllers\AlbumController@deleteAlbum'))->where('id','[0-9]+');
	Route::post('album/vitri',array('as'=>'admin_vitriAlbum','uses'=>'admin\controllers\AlbumController@vitriAlbum'));
	Route::post('album/show',array('as'=>'admin_AjaxAlbum','uses'=>'admin\controllers\AlbumController@show'));
	Route::post('album/deleteall',array('as'=>'admin_DeleteAlbum','uses'=>'admin\controllers\AlbumController@deleteAll'));

	//HINH ANH
	Route::get('hinhanh',array('as'=>'admin_getImage','uses'=>'admin\controllers\ImageController@getImage'));
	Route::get('hinhanh/add',array('as'=>'admin_getImageAdd','uses'=>'admin\controllers\ImageController@getImageAdd'));
	Route::post('hinhanh/add',array('as'=>'admin_postImageAdd','uses'=>'admin\controllers\ImageController@postImageAdd'));
	Route::get('hinhanh/edit/{id}',array('as'=>'admin_getImageEdit','uses'=>'admin\controllers\ImageController@getImageEdit'))->where(array( 'id'=>'[0-9]+'));
	Route::post('hinhanh/edit/{id}',array('as'=>'admin_postImageEdit','uses'=>'admin\controllers\ImageController@postImageEdit'))->where(array('id'=>'[0-9]+'));
	Route::get('hinhanh/delete/{id}',array('as'=>'admin_getImageDelete','uses'=>'admin\controllers\ImageController@delete'))->where('id','[0-9]+');
	Route::post('hinhanh/deleteAll',array('as'=>'admin_postImageDeleteAll','uses'=>'admin\controllers\ImageController@deleteAll'));
	Route::post('hinhanh/show',array('as'=>'admin_postImageshow','uses'=>'admin\controllers\ImageController@show'));

	Route::get('hinhanh/{slug_album}',array('as'=>'admin_image_album','uses'=>'admin\controllers\ImageController@Image_album'))->where('slug_album','[A-Za-z0-9._\-]+');
	// Route::get('hinhanh/{slug_album}')

	// CONFIG USER
	Route::get('user/{id}',array('as'=>'getUser','uses'=>'admin\controllers\UserController@changePass'))->where('id','[0-9]+');
	Route::post('user',array('as'=>'postUser','uses'=>'admin\controllers\UserController@postUser'));
	Route::get('create-user',array('as'=>'admin_createUser','uses'=>'admin\controllers\UserController@createUser'));
	Route::post('create-user',array('as'=>'admin_post_createUser','uses'=>'admin\controllers\UserController@post_createUser'));
	

	// CONFIG SYSTEM
	Route::get('config-system',array('as'=>'admin_getMeta','uses'=>'admin\controllers\CauhinhController@getMeta'));
	Route::post('config-system',array('as'=>'admin_postMeta','before'=>'csrf','uses'=>'admin\controllers\CauhinhController@postMeta'));

	// View::composer('admin::layouts.sidebar',function($view){
	// 	$dichvu = \Danhmuc::where('loaihinh_id','2')->get();
	// 	$tintuc = \Danhmuc::where('loaihinh_id','3')->get();
	// 	return $view->with(compact('dichvu','tintuc'));
	// });

	// // HOI THAO
});
