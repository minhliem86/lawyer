<?php
namespace admin\controllers;

class CauhinhController extends \BaseController{

	public function getMeta(){
		$meta = \Meta::first();
		return \View::make('admin::pages.cauhinhwebsite.view')->with('title','Meta')->with('meta',$meta);
	}

	public function postMeta(){
		$meta_description = \Input::get('meta_description');
		$meta_keywords = \Input::get('meta_keyword');
		$meta = \Meta::first();
		$meta->meta_description=$meta_description;
		$meta->meta_keyword= $meta_keywords;
		$meta->email_nhanthongtin= \Input::get('email_nhanthongtin');
		$meta->save();

		return \Redirect::back()->with('success','Cập nhật thành công');
	}

}