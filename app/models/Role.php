<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	public $table = 'roles';

	protected $fillable = array('name');

	public function permission(){
		return $this->belongsToMany('Permission','permission_role');
	}

	public function user(){
		return $this->belongsToMany('User','assigned_roles');
	}

}