@extends('layout.default')

@section('content')
    <div class="row">
    	<div class="col-md-2">
            <div class="input-group date" id="dp3" data-date="12-02-2012" data-date-format="yyyy-mm-dd">
              <input value="{{URL::to('/')}}" type="hidden" id="url" name="url">
              <input value="" type="hidden" id="modifyType" name="modifyType">
			  <input class="form-control"  size="16"  value="" type="text" id="txtsearch" name="txtsearch">
			  <div class="input-group-addon"> <span class="add-on"><i class="glyphicon glyphicon-calendar"></i></span></div>
			</div>
    	</div>
    	<div class="col-md-2">
    		<button class="btn btn-sm btn-info btn_search" type="submit">Search</button>
    		<button class="btn btn-sm btn-success btn-setAdd" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">ADD</button>
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
			@foreach ($result as $row)
			<tr class="class-item-{{$row->id}}" data-item-id="{{$row->id}}">
			   <td class="date_name"><a href="{{URL::to('/main/'.$row->id)}}">{{$row->date_now}}</a></td>
			   <td class="">{{$row->total}}</td>
			   <td>
			   		<button class="btn btn-sm btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-sm"type="submit">Edit</button>
			   		<button class="btn btn-sm btn-danger btn_delete" type="submit">Delete</button>
			   </td>
			</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="row">
			<div class="paginate">
				{{$result->links();}}
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
        <div class="input-group date" id="dp4" data-date="12-02-2012" data-date-format="yyyy-mm-dd">
		  <input class="form-control"  size="16"  value="" type="text" id="dateNow" name="dateNow" required>
		  <div class="input-group-addon"> <span class="add-on"><i class="glyphicon glyphicon-calendar"></i></span></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn_ok">Ok</button>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
@stop