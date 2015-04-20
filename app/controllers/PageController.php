<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class PageController extends BaseController{
	
	protected $user;
	
	public function __construct(User $user){
		
		$this->user = $user;
		
	}
	
	
	public function index(){
		
		
		return View::make('index');
		
	}
	
	public function logout(){
		Session::flush();
		return View::make('index');
		
	}
	
	public function login(){
		
		$rules = array(
				'username' => 'required',
				'password' => 'required|alphaNum|min:3',
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails()){
			
			return Redirect::to('/')->withErrors($validator)->withInput(Input::except('password'));
		
		}else{
			
			$username = Input::get('username');
			$password = Input::get('password');
			
			$userdate = array(
					'username' => $username,
					'password' => $password,
			);
			
			if(Auth::attempt($userdate)){
				
				$data = $this->user->where('username', '=', $username)->first();
				Session::put('id', $data->id);
				
				return Redirect::to('/main');
				
			}else{
				
				return Redirect::to('/');
			}
			
		}

	}
	
}