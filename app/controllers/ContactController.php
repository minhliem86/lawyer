<?php
use services\Contact\RepoInterface as Contact;
use services\Customer\RepoInterface as Customer;

use validations\CustomerForm;
use validations\FormValidationException;

class ContactController extends BaseController{
	protected $contact;
	protected $customer;
	protected $validator;


	public function __construct(Contact $contact, Customer $customer, CustomerForm $validator){
		$this->contact = $contact;
		$this->customer = $customer;
		$this->validator = $validator;
	}

	public function index(){
		$contact = $this->contact->select_first();
		return View::make('pages.contact')->with(compact('contact'));
	}

	// public function submit(){
	// 	if(Request::ajax()){
	// 		$data = array(
	// 			'fullname' => Input::get('name'),
	// 			'phone' => Input::get('phone'),
	// 			'email' => Input::get('email'),
	// 			'message' => Input::get('message'),
	// 			'show'=>1
	// 		);
	// 		$this->customer->create($data);
	// 		return Response::json(array('kq'=>'Thank you for your contact !'));
	// 	}else{
	// 		return View::make('pages.404');
	// 	}
	// }
	public function submit(){
		$data = Input::all();

		try{
			$this->validator->validate($data);
		}catch(FormValidationException $e){
			return \Redirect::back()->withErrors($e->getErrors())->withInput();
		}

		$data = array(
			'fullname' => Input::get('fullname'),
			'phone' => Input::get('phone'),
			'email' => Input::get('email'),
			'message' => Input::get('message'),
			'show'=>1
		);
		$this->customer->create($data);

		\Mail::send('emails.autoalert',array($data), function ($message){
			$message->to(\Meta::first()->email_nhanthongtin, 'Auto Alert Email','')->subject('Auto Alert Email');
		});

		return Redirect::back()->with('noti','Thank you for your contact !');
	}
}