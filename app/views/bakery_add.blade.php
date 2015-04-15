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
    <div class="row">
    	<div class="col-md-2">
           <input class="form-control"  size="16"  value="" type="text" id="txtsearch" name="txtsearch">
    	</div>
    	<div class="col-md-2">
    		<button class="btn btn-sm btn-info" type="submit">Search</button>
    		<button class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">ADD</button>
		</div>		
    </div>  
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
				<tr class="bred-item-{{$row->id}}" data-bread-id="{{$row->id}}">
			   	   <td class="bread-name"><a href="{{URL::to('/main/'.$row->id)}}">{{$row->bread_name}}</a></td>
				   <td class=""><input class="form-control"  size="16"  value="{{$row->QUANTITY}}" type="text" id="txtquat" name="txtquat"></td>
				   <td class=""><input class="form-control"  size="16"  value="{{$row->IN}}" type="text" id="txtIn" name="txtIn"></td>
				   <td class=""><input class="form-control"  size="16"  value="{{$row->OUT}}" type="text" id="txtOut" name="txtOut"></td>
				   <td class=""><input class="form-control"  size="16"  value="{{$row->PRICE}}" type="text" id="txtprice" name="txtprice"></td>
				   <td>
				   		<button class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">Edit</button>
				   		<button class="btn btn-sm btn-danger" type="submit">Delete</button>
				   </td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="row">
		<div class="col-md-12">
			{{Form::submit('SAVE',array('class' => 'btn btn-md btn-primary'))}}
		</div>
	</div>
	<div class="row">
			<div class="paginate">
				<nav>
				  <ul class="pagination">
				    <li>
				      <a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li>
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
	</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
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
  </div>
</div>
@stop