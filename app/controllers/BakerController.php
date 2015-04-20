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
						->get();
	/* 	print_r(DB::getQueryLog()); */
		if($result->first()){
			
			$this->itemID = $id;
			
			return View::make('bakery_add')->with(array('result' => $result,'datename'=>$result[0]->date_now));
		}else{
			
			return View::make('bakery_add')->with(array('result' => $result,'datename'=>''));
		}
		
	}
	
	public function edit(){
		
		$data = Input::all();
		if(Request::ajax()){
			$this->baker->where('id',$data['id'])->update(array(
					'date_now' => $data['dateNow']
			));
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
			
			$result = $this->baker->where('date_now', 'like' ,'%'.$data['dateNow'].'%')->get();

			if($result->first()){
				foreach ($result as $row){
					$html .= "<tr class='class-item-{$row->id}' data-item-id='{$row->id}'>
							   <td class='date_name'><a href='/main/{$row->id}'>{$row->date_now}</a></td>
							   <td class=''>300</td>
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
				
				$id = $this->itemId;
				
				$result = $this->bakerDetail
									->where('bread_name', '=', $data['bread_name'])
									->where('id', '=', $id)
									->get();
				if($result->first()){
					
					$row = $this->bakerDetail->insertGetId(array(
								'id' => $id,
								'bread_name' => $data['bread_name'],
								'QUANTITY' => $data['QUANTITY'],
								'IN' => $data['IN'],
								'OUT' => $data['OUT'],
								'PRICE' => $data['PRICE'],
					));
					
					return "<tr class='bred-item-{{$row->id}}' data-bread-id='{{$row->id}}'>
				   	   <td class='bread-name'><a href='{{URL::to('/main/'.$row->id)}}'>{{$row->bread_name}}</a></td>
					   <td class=''><input class='form-control'  size='16'  value='{{$row->QUANTITY}}' type='text' id='txtquat' name='txtquat'></td>
					   <td class=''><input class='form-control'  size='16'  value='{{$row->IN}}' type='text' id='txtIn' name='txtIn'></td>
					   <td class=''><input class='form-control'  size='16'  value='{{$row->OUT}}' type='text' id='txtOut' name='txtOut'></td>
					   <td class=''><input class='form-control'  size='16'  value='{{$row->PRICE}}' type='text' id='txtprice' name='txtprice'></td>
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
	
	public function save(){
		
	}
}