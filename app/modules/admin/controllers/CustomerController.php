<?php
namespace admin\controllers;
use services\Customer\RepoInterface as Customer;

class CustomerController extends \BaseController {
	public $customer;

	public function __construct(Customer $customer){
		$this->customer = $customer;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customer = $this->customer->select_all();
		return \View::make('admin::pages.customer.index')->with(compact('customer'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer = $this->customer->find($id);
		return \View::make('admin::pages.customer.view')->with(compact('customer'));
	}

	//DELETE
	public function delete($id){
		$this->customer->delete($id);
		return \Redirect::route('admin.customer.index')->with('success','Successful');
	}
	public function deleteAll(){
		$data = \Input::get('iddata');
		if(empty($data)){
			return \Redirect::back()->with('error','Please choose items to delete');
		}
		$this->customer->deleteAll('id',$data);
		return \Redirect::back()->with('success','Successful');
	}

}
