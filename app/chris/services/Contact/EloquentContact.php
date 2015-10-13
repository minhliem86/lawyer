<?php 
namespace services\Contact;

use Contact;


class EloquentContact implements RepoInterface{
	private $contact;

	public function __construct(Contact $contact){
		$this->contact = $contact;
	}

	public function select_first(){
		return $this->contact->first();
	}

	public function  save(){
		$this->contact->save();
	}

	public function create($data){
		$this->contact->insert($data);
	}
}