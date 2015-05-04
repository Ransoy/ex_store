@extends('layout.default')

@section('content')
    <div class="row">
    	<div class="col-md-2">
            <div class="input-group date" id="dp3" data-date="12-02-2012" data-date-format="mm/dd/yyyy">
           	  <input value="{{URL::to('/')}}" type="hidden" id="url" name="url">
			  <input class="form-control"  size="16"  value="" type="text" id="birth" name="birth">
			  <div class="input-group-addon"> <span class="add-on"><i class="glyphicon glyphicon-calendar"></i></span></div>
			</div>
    	</div>
    	<div class="col-md-2">
    		<button class="btn btn-sm btn-info btn_store-search" type="submit">Search</button>
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
			  <td class="date_name"><a href="{{URL::to('/store/'.$row->id)}}">{{$row->date_now}}</a></td>
			   <td class="">{{$row->total}}</td>
			   <td>
			   		<button class="btn btn-sm btn-info btn_edit" data-toggle="modal" data-target=".bs-example-modal-sm" type="submit">Edit</button>
			   		<button class="btn btn-sm btn-danger btn-store-delete" type="submit">Delete</button>
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
    {{Form::open(['url'=>'/store/add', 'id'=> 'form-store'])}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">MODIFY DATA</h4>
      </div>
      <div class="modal-body">
        <div class="input-group date" id="dp5" data-date="12-02-2012" data-date-format="yyyy-mm-dd">
		  <input class="form-control"  size="16"  value="" type="text" id="dateNow" name="dateNow">
		  <div class="input-group-addon"> <span class="add-on"><i class="glyphicon glyphicon-calendar"></i></span></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         {{Form::submit('SAVE',array('class'=>'btn btn-primary btn-store-ok'))}}
      </div>
    {{Form::close()}}
    </div><!-- /.modal-content -->
  </div>
</div>
@stop