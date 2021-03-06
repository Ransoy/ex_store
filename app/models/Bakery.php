<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Bakery extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamp = false;
	
	protected  $fillable  = ['dateNow'];
	
	public static $rules = [
		'dateNow' => 'required|date_format:Y-m-d',
	];
	
	public $errors;
	
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bakery_list';

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
		return $this->password;
	}
	
	public function getRememberToken(){
		
	}
	
	public function setRememberToken($value){
		
		$this->remember_token = $value;
		
	}
	
	public function getRememberTokenName(){
		
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
	
	public function checkDuplicate($data){
		
		$result = Bakery::where('date_now',$data)->count();
		if($result) return true;
		
		return false;
		
	}
	
	public function isValid($data){
		
		$validation = Validator::make($data, static::$rules);
		
		if($validation->passes()) return true;
		
		$this->errors = $validation->messages();
		
		return false;
	}

}