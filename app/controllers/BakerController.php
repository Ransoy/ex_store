<?php

class BakerController extends BaseController {
	
	protected $baker;
	protected $bakerDetail;
	protected  $itemID;
	
	public function __construct(Bakery $baker,BakeryDetail $bakerDetail){
		
		$this->baker = $baker;
		$this->bakerDetail = $bakerDetail;
		
	}
	
	public function index(){
				
		if (!Auth::check()){
			return Redirect::to('/');
		}
	
		$id = Session::get('id');
		$result = $this->baker->paginate(5);
		
		return View::make('bakery_main')->with('result', $result);
		
	}

	
	public function add(){
		
		$data = Input::all();
		if(Request::ajax()){
		
			if(!$this->baker->isValid($data)){
		
				return Response::json(array(
						'success' => false,
						'errors' => $this->baker->errors->first('dateNow')
				));

				
			} else{
			
				if(!$this->baker->checkDuplicate($data['dateNow'])){
					$result = $this->baker->insertGetId(array(
							'date_now' => $data['dateNow']	
						));
						
					return "<tr class='class-item-{$result}' data-item-id='{$result}'>
					   <td class='date_name'><a href='main/{$result}'>{$data['dateNow']}</a></td>
					   <td class=''>300</td>
					   <td>
					   		<button class='btn btn-sm btn-info btn_edit' data-toggle='modal' data-target='.bs-example-modal-sm' type='submit'>Edit</button>
					   		<button class='btn btn-sm btn-danger btn_delete' type='submit'>Delete</button>
					   </td>
					</tr>";
					
				}else{
					
					return Response::json(array(
							'success' => false,
							'errors' => 'data already exist'
					));
				}
			
			}
		}		

	}
	
	public function detail($id){
		
		$searchStr =  Input::get('search');
		$result = $this->baker
				 		->join('bakery_item_detail', 'bakery_list.id', '=', 'bakery_item_detail.id')
				 		->where('bakery_list.id', '=', $id)
				 		->where('bakery_item_detail.bread_name', 'like', '%'. $searchStr .'%')
				 		->paginate(5);
	/* 	print_r(DB::getQueryLog()); */
		if($result->first()){
			
			$this->itemID = $id;
			$result->appends(array(
				'search' => $searchStr,
			));
			return View::make('bakery_add')
							->with(array(
									'result' => $result,
									'datename' => $result[0]->date_now,
									'id' => $id
									
							));
		}else{
			
			return View::make('bakery_add')
							->with(array(
									'result' => $result,
									'datename'=>'',
									'id' => $id
							));
		}
		
	}
	
	public function edit(){
		
		$data = Input::all();
		
		if(!$this->baker->isValid($data)){
			
			return Response::json(array(
					'success' => false,
					'errors' => $this->baker->errors->first('dateNow')
			));
			
		}else{
			
			if(Request::ajax()){
				
				$this->baker->where('id',$data['id'])->update(array(
						'date_now' => $data['dateNow']
				));
			}
		
		}
		
	}
	
	public function delete(){
		
		$data = Input::all();
		if(Request::ajax()){
			$this->baker->where('id',$data['id'])->delete();
		}
		
	}
	
	public function add_item(){
		
		$data = Input::all();
		
		if(!$this->bakerDetail->isValid($data)){
			
			$id = $data['hid'];
			
			$result = $this->bakerDetail
								->where('bread_name', '=', $data['txtbrdname'])
								->where('id', '=', $id)
								->get();
			
			if(!$result->first()){
				
				$row = $this->bakerDetail->insertGetId(array(
							'id' => $id,
							'bread_name' => $data['txtbrdname'],
							'QUANTITY' => $data['txtquat'],
							'IN' => $data['txtIn'],
							'OUT' => $data['txtOut'],
							'PRICE' => $data['txtprice'],
				));
				
				return Redirect::to('/main/'.$id);
				
			}else{
				
				return Response::json(array(
						'success' => false,
						'errors' => 'Item already exists'
				));
				
			}
			}
		
	}
	
	public function edit_item(){
		
		$data = Input::all();
		
		if(!$this->bakerDetail->isValid($data)){
			if(Request::ajax()){
					$this->bakerDetail
									->where('id',$data['hid'])
									->update(array(
											'id' => $id,
											'bread_name' => $data['txtbrdname'],
											'QUANTITY' => $data['txtquat'],
											'IN' => $data['txtIn'],
											'OUT' => $data['txtOut'],
											'PRICE' => $data['txtprice'],
						));
			}
		}else{
			return Response::json(array(
					'success' => false,
					'errors' => $this->bakerDetail->errors->first()
			));
		}
	}
	
	public function delete_item(){
		
		$data = Input::all();
		if(Request::ajax()){
			$this->bakerDetail->where('id',$data['hid'])->delete();
		}
		
	}
	
	public function search_item($id,$search){

		$result = $this->bakerDetail
					->where('bread_name', 'like','%'.$search.'%')
					->pagination(5);
		if($result->first()){
			return View::make('bakery_add');
		}
			
	}
	
	public function save(){
		
	}
}