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
		
		$result = $this->baker
				 		->join('bakery_item_detail', 'bakery_list.id', '=', 'bakery_item_detail.id')
				 		->where('bakery_list.id', '=', $id)
				 		->paginate(5);
	/* 	print_r(DB::getQueryLog()); */
		if($result->first()){
			
			$this->itemID = $id;

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
	
	public function search(){
		$html = '';
		$data = Input::all();
		if(Request::ajax()){
			
			$result = $this->baker
							->where('date_now', 'like' ,'%'.$data['dateNow'].'%')
							->get();

			if($result->first()){
				foreach ($result as $row){
					$html .= "<tr class='class-item-{$row->id}' data-item-id='{$row->id}'>
							   <td class='date_name'><a href='/main/{$row->id}'>{$row->date_now}</a></td>
							   <td class=''>0</td>
							   <td>
							   		<button class='btn btn-sm btn-info btn_edit' data-toggle='modal' data-target='.bs-example-modal-sm' type='submit'>Edit</button>
							   		<button class='btn btn-sm btn-danger btn_delete' type='submit'>Delete</button>
							   </td>
							</tr>";
				}
				
				return $html;
				
			}else{
				return 'no result';
			}
		}
		
	}
	
	public function add_item(){
		
		$data = Input::all();
		
		if(!$this->bakerDetail->isValid($data)){
			
			if(Request::ajax()){
				
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
					
					return "<tr class='bred-item-{$row}' data-bread-id='{$row}'>
				   	   <td class='bread-name'><a href='{{URL::to('/main/'.$row)}}'>{$data['txtbrdname']}</a></td>
					   <td class=''><input class='form-control'  size='16'  value='{$data['txtquat']}' type='text' id='txtquat' name='txtquat'></td>
					   <td class=''><input class='form-control'  size='16'  value='{$data['txtIn']}' type='text' id='txtIn' name='txtIn'></td>
					   <td class=''><input class='form-control'  size='16'  value='{$data['txtOut']}' type='text' id='txtOut' name='txtOut'></td>
					   <td class=''><input class='form-control'  size='16'  value='{$data['txtprice']}' type='text' id='txtprice' name='txtprice'></td>
					   <td>
					   		<button class='btn btn-sm btn-info' data-toggle='modal' data-target='.bs-example-modal-sm' type='submit'>Edit</button>
					   		<button class='btn btn-sm btn-danger' type='submit'>Delete</button>
					   </td>
					</tr>";
				}else{
					
					return Response::json(array(
							'success' => false,
							'errors' => 'Item already exists'
					));
					
				}

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