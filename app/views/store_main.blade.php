@extends('layout.default')

@section('content')
    <div class="row">
    	<div class="col-md-2">
            <div class="input-group date" id="dp3" data-date="12-02-2012" data-date-format="mm/dd/yyyy">
			  <input class="form-control"  size="16"  value="" type="text" id="birth" name="birth">
			  <div class="input-group-addon"> <span class="add-on"><i class="glyphicon glyphicon-calendar"></i></span></div>
			</div>
    	</div>
    	<div class="col-md-2">
    		<button class="btn btn-sm btn-info" type="submit">Search</button>
    		<button class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">ADD</button>
		</div>		
    </div>     
	<table class="table table-hover" id="tbl-date">
		<thead>
			<tr class="active">
			  <th>Date</td>
			  <th>Total</td>
			  <th></td>
			</tr>
		</thead>
		<tbody>
			<tr class="">
			   <td class=""><a href="">4/6/2015</a></td>
			   <td class="">1300.00</td>
			   <td>
			   		<button class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">Edit</button>
			   		<button class="btn btn-sm btn-danger" type="submit">Delete</button>
			   </td>
			</tr>
			<tr class="">
			   <td class=""><a href="">4/6/2015</a></td>
			   <td class="">1300.00</td>
			   <td>
			   		<button class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">Edit</button>
			   		<button class="btn btn-sm btn-danger" type="submit">Delete</button>
			   </td>
			</tr>
			<tr class="">
			   <td class=""><a href="">4/6/2015</a></td>
			   <td class="">1300.00</td>
			   <td>
			   		<button class="btn btn-sm btn-info"  data-toggle="modal" data-target=".bs-example-modal-sm"type="submit">Edit</button>
			   		<button class="btn btn-sm btn-danger" type="submit">Delete</button>
			   </td>
			</tr>
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
        <div class="input-group date" id="dp3" data-date="12-02-2012" data-date-format="mm/dd/yyyy">
		  <input class="form-control"  size="16"  value="" type="text" id="birth" name="birth">
		  <div class="input-group-addon"> <span class="add-on"><i class="glyphicon glyphicon-calendar"></i></span></div>
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