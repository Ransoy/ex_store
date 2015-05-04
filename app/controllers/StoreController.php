<?php


class StoreController extends BaseController{
	
	protected $store;
	
	
	public function __construct(Store $store){
		
		$this->store = $store;
		
	}
	
	
	public function index(){
		
		$result =  $this->store->paginate(5);
		
		return View::make('store_main')->with('result', $result);
		
	}
	
	public function add(){
		
		$data = Input::all();

		if(!$this->store->isValid($data)){
			
			$this->store->insert(array('data_now' => $data['txtdate']));
			
			return Redirect::back();
			
		}

		return Redirect::back()->withInput()->withErrors($this->store->errors);
	}
	
	public function edit(){
		
	}
	
	
}