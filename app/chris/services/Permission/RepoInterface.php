<?php

namespace services\Role;

interface RepoInterface{
	
	public function addPermission($name, $display_name);
}