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
			
			$this->store->insert(array('date_now' => $data['txtdate']));
			
			return Redirect::back();
			
		}

		return Redirect::back()->withInput()->withErrors($this->store->errors);
	}
	
	public function edit(){
		
	}
	
	public function delete(){
		$data = Input::all();
		if(Request::ajax()){
			$this->store->where('id',$data['id'])->delete();
		}
	}
	
	public function detail($id){
		
		$search = Input::get('searchStr');
		$result = $this->store
					->join('store_list', 'store.id', '=', 'store_list.id')
				 	->where('store.id', '=', $id)
				 	->where('store_list.brand_name', 'like', '%'. $search .'%')
				 	->paginate(5);
		
		if($result->first()){
			$result->appends(array(
					'search' => $search,
			));
			
			return View::make('store_add')
								->with(array(
									'result' => $result,
									'datename' => $result[0]->date_now,
									'id' => $id
								));
		}else{
			
			return View::make('store_add')
						->with(array(
								'result' => $result,
								'datename' => '',
								'id' => $id
						));
			
		}
		
	}
	
	public function search($search){
		
		$result =  $this->store
						->where('brand_name', 'like','%'.$search.'%')
						->paginate(5);
		
		if($result->first()){
			return View::make('store_main');
		}
	}
	
}