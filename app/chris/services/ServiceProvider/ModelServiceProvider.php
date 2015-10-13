<?php
namespace services\ServiceProvider;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider{
	public function register(){
		$this->app->bind('services\About\RepoInterface','services\About\EloquentAbout');
		$this->app->bind('services\Contact\RepoInterface','services\Contact\EloquentContact');
		$this->app->bind('services\Customer\RepoInterface','services\Customer\EloquentCustomer');
		$this->app->bind('services\Service\RepoInterface','services\Service\EloquentService');
		$this->app->bind('services\User\RepoInterface','services\User\EloquentUser');
		$this->app->bind('services\Album\RepoInterface','services\Album\EloquentAlbum');
		$this->app->bind('services\Image\RepoInterface','services\Image\EloquentImage');
		$this->app->bind('services\Home\RepoInterface','services\Home\EloquentHome');
		$this->app->bind('services\Testi\RepoInterface','services\Testi\EloquentTesti');
		$this->app->bind('services\Newsfeed\RepoInterface','services\Newsfeed\EloquentNewsfeed');
	}
}