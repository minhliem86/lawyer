<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	use HasRole;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return Hash::make($this->password);
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	// ROLE
	public function role(){
		return $this->belongsToMany('Role','assigned_roles');
	}

	/**
	* Validate USER
	**/
	public static $rule_editUser = array(
		'dienthoai'=>'required',
		'diachi'=>'required',
	);
	public static $mess_editUser = array(
		'dienthoai.required' => 'Vui lòng nhập số điện thoại',
		'diachi.required'=> 'Vui lòng nhập họ tên',
	);

	public static $rule_createUser = array(
		'username'=>'required|min:4',
		'email'=>'required|email',
		'hoten'=>'required',
		'password' => 'required',
		'confirmed_password'=>'required|same:password',
		'dienthoai'=>'required|numeric',
		'diachi'=>'required',
	);
	public static $mess_createUser = array(
		'username.required' => 'Please fill Username',
		'username.min'=> 'Minimum 4 characters',
		'email.required' => 'Please fill Email',
		'hoten.required'=> 'Please fill Fullname',
		'password.required'=> 'Please fill Password',
		'confirmed_password.required'=> 'Please fill Confirm Password',
		'confirmed_password.same'=> 'Confirm Password is not correct',
		'dienthoai.required'=> 'Please fill Phone number',
		'dienthoai.numeric'=> 'Please fill numeric',
		'diachi.numeric'=> 'Please fill Address',
	);


	public static $rule_login = array(
		'username'=>'required',
		'password'=>'required'
	);
	public static $mess_login = array(
		'username.required' => 'Vui lòng nhập Tên đăng nhập',
		'password.required' => 'Vui lòng nhập Mật khẩu'
	);

	public static $rule_forget = array(
		'username'=> 'required'
	);

	public static $mess_forget = array(
		'username.required' => 'Xin nhập Tên truy cập'
	);

	public static $rule_changepass = array (
		'oldpass'=>'required',
		'newpass'=>'required',
		'confirmed_newpass'=>'required|same:newpass',
	);
	public static $mess_changepass = array(
		'oldpass.required'=>'Vui lòng nhập Mật khẩu',
		'newpass.required'=>'Vui lòng nhập Mật khẩu mới',
		'confirmed_newpass.required'=>'Vui lòng nhập Xác nhận mật khẩu mới',
		'confirmed_newpass.same'=>'Xác nhận Mật khẩu không chính xác',
	);


}
