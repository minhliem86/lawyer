<?php

namespace services\About;

interface RepoInterface{
	public function select_first();

	public function save();
}