@extends('layout.default')

@section('content')
     <div class="row">
    	<div class="comp-container">
    		
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
	<table class="table table-hover" id="tbl-date">
		<thead>
			<tr class="active">
			  <th>Brand Name</th>
			  <th>Quantity</th>
			  <th>PRICE</th>
			  <th></th>
			</tr>
		</thead>
		<tbody>
		@foreach ($result as $row)
			<tr class="">
			   <td class=""><a href="">{{$row->brand_name}}</a></td>
			   <td class=""><input class="form-control"  size="16"  value="{{$row->Quantity}}" type="text" id="txtquat" name="txtquat"></td>
			   <td class=""><input class="form-control"  size="16"  value="{{$row->Price}}" type="text" id="txtprice" name="txtprice"></td>
			   <td>
			   		<button class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">Edit</button>
			   		<button class="btn btn-sm btn-danger" type="submit">Delete</button>
			   </td>
			</tr>
		@endforeach	
		</tbody>	
	</table>
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
        <h4 class="modal-title">ADD DATA</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<input class="form-control"  size="16"  value="" type="text" id="txtbrand" name="txtbrand" placeholder="Brand Name">
        </div>
        <div class="form-group">
        	<input class="form-control"  size="16"  value="" type="text" id="txtquat" name="txtquat" placeholder="Quantity">
        </div>
        <div class="form-group">
        	<input class="form-control"  size="16"  value="" type="text" id="txtprice" name="txtprice" placeholder="Price">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Ok</button>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
@stop