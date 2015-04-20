@extends('layout.default')

@section('content')
      <div class="row">
    	<div class="comp-container">
    		<div class="col-md-6">
    			<label>DATE:</label>
    			<p>{{$datename;}}</p>
    		</div>
    		<div class="col-md-6">
    			<label>TOTAL:</label>
    			<p></p>
    		</div>
    	</div>
    </div>     
    {{Form::open(['url' => '/main/'.$id.'/search_item','method'=>'get'])}}   
    <div class="row">
    	<div class="col-md-2">
           <input class="form-control"  size="16"  value="" type="text" id="search" name="search">
    	</div>
    	<div class="col-md-2">
    		<button class="btn btn-sm btn-info btn-search-item" type="submit">Search</button>
    		<button class="btn btn-sm btn-success btn-setAdd" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">ADD</button>
		</div>		
    </div>  
    {{Form::close()}}
    {{Form::open(['url' => '/main/save'])}}   
	<table class="table table-hover" id="tbl-date">
		<thead>
			<tr class="active">
			  <th>Brand Name</th>
			  <th>Quantity</th>
			  <th>IN</th>
			  <th>OUT</th>
			  <th>PRICE</th>
			  <th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($result as $row)
				<tr class="bred-item-{{$row->bID}}" data-bread-id="{{$row->bID}}">
			   	   <td class="bread-name"><a href="{{URL::to('/main/'.$row->bID)}}">{{$row->bread_name}}</a></td>
				   <td class=""><input class="form-control"  size="16"  value="{{$row->QUANTITY}}" type="text" id="txtquat" name="txtquat"></td>
				   <td class=""><input class="form-control"  size="16"  value="{{$row->IN}}" type="text" id="txtIn" name="txtIn"></td>
				   <td class=""><input class="form-control"  size="16"  value="{{$row->OUT}}" type="text" id="txtOut" name="txtOut"></td>
				   <td class=""><input class="form-control"  size="16"  value="{{$row->PRICE}}" type="text" id="txtprice" name="txtprice"></td>
				   <td>
				   		<button class="btn btn-sm btn-info btn_edit" data-toggle="modal" data-target=".bs-example-modal-sm" >Edit</button>
				   		<button class="btn btn-sm btn-danger" type="submit">Delete</button>
				   </td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="row">
		<div class="col-md-12">
			{{Form::submit('SAVE',array('class' => 'btn btn-md btn-primary'))}}
			<input value="{{URL::to('/')}}" type="hidden" id="url" name="url">
		</div>
	</div>
	{{ Form::close() }}
	<div class="row">
			<div class="paginate">
				{{$result->links();}}
			</div>
	</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    {{Form::open(['url' => '','id'=> 'authAdd'])}}
    {{ Form::hidden('hid', $id, array('id' => 'hid')) }}   
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">MODIFY DATA</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
        	<input class="form-control"  size="16"  value="" type="text" id="txtbrdname" name="txtbrdname" placeholder="Breadname">
        </div>
      	<div class="form-group">
        	<input class="form-control"  size="16"  value="" type="text" id="txtquat" name="txtquat" placeholder="Quantity">
        </div>
        <div class="form-group">
        	<input class="form-control"  size="16"  value="" type="text" id="txtIn" name="txtIn" placeholder="IN">
        </div>
        <div class="form-group">
        	<input class="form-control"  size="16"  value="" type="text" id="txtOut" name="txtOut" placeholder="OUT">
        </div>
        <div class="form-group">
        	<input class="form-control"  size="16"  value="" type="text" id="txtprice" name="txtprice" placeholder="PRICE">
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-ok-add">Ok</button>
      </div>
    </div><!-- /.modal-content -->
    {{ Form::close() }}
  </div>
</div>
@stop