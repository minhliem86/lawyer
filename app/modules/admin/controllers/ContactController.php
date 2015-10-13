<?php
namespace admin\controllers;

use services\Contact\RepoInterface as Contact;

class ContactController extends \BaseController{
	protected $contact;

	public function __construct(Contact $contact){
		$this->contact = $contact;
	}

	public function getIndex(){
		$data = $this->contact->select_first();
		return \View::make('admin::pages.contact.view')->with(compact('data'));
	}

	public function postSave(){
		$data = $this->contact->select_first();
		if(isset($data)){
			$data->phone = \Input::get('phone');
			$data->email = \Input::get('email');
			$data->address = \Input::get('address');
			$data->fb_link = \Input::get('fb_link');
			$data->youtube_link = \Input::get('youtube_link');
			$data->tw_link = \Input::get('tw_link');
			$data->map = \Input::get('map');
			$data->save();
		}else{
			$data = array(
				"phone"=>\Input::get('phone'),
				"email"=>\Input::get('email'),
				"address"=>\Input::get('address'),
				"map"=>\Input::get('map'),
				"fb_link"=> \Input::get('fb_link'),
				"youtube_link"=> \Input::get('youtube_link'),
				"tw_link"=> \Input::get('tw_link'),
			);
			$this->contact->create($data);
		}
		return \Redirect::back()->with('success','Updated !');
		
	}
}