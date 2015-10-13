<?php
use services\About\RepoInterface as About;
use services\Service\RepoInterface as Service;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages.index');
});
Route::get('',array('as'=>'user.homepage','uses'=>'HomeController@index'));

Route::get('about',array('uses'=>'AboutController@index'));

Route::get('service',array('as'=>'user_service','uses'=>'ServiceController@index'));
Route::get('service/{slug}',array('as'=>'user_service_slug','uses'=>'ServiceController@show'))->where('slug','[a-zA-Z0-9._\-]+');

Route::get('testimonials',array('as'=>'user_testimonials','uses'=>'TestimonialController@index'));
Route::get('testimonials/{slug}',array('as'=>'user_testimonials_slug','uses'=>'TestimonialController@show'))->where('slug','[a-zA-Z0-9._\-]+');

Route::get('newsfeed',array('as'=>'user_newsfeed','uses'=>'NewsfeedController@index'));
Route::get('newsfeed/{slug}',array('as'=>'user_newsfeed_slug','uses'=>'NewsfeedController@show'))->where('slug','[a-zA-Z0-9._\-]+');

Route::get('contact',array('uses'=>'ContactController@index'));
Route::post('contact',array('as' => 'contactPost', 'uses'=>'ContactController@submit'));

View::composer(array('pages.index'),function($view){
	$about = Cache::rememberForever('about',function(){
		return \About::first();
	});
	// $about = \About::first();
	$service = \Service::Where('show',1)->OrderBy('id','DESC')->take(3)->get();
	$view->with(compact('about','service'));
});

View::composer('layouts.header',function($view){
	$image = Cache::rememberForever('image',function(){
		return \Hinhanh::Where('show',1)->orderBy('sort','DESC')->get();
	});
	// $image = \Hinhanh::Where('show',1)->orderBy('sort','DESC')->get();
	$view->with(compact('image'));
});

View::composer(array('layouts.header','layouts.footer'), function($view){
	$contact =Cache::rememberForever('contact', function(){
		return \Contact::first();
	});
	// $contact = \Contact::first();
	$view->with(compact('contact'));
});

View::composer('layouts.layout',function($view){
	$meta = Cache::rememberForever('meta',function(){
		return \Meta::first();
	});
	// $meta = \Meta::first();
	$view->with(compact('meta'));
});

App::missing(function($exception)
{
    return View::make('pages.404');
});