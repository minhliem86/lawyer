<?php
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	public $table = 'permissions';

	protected $fillable = array('name','display_name');

	public function role(){
		return $this->belongsToMany('Role','permission_role');
	}
}