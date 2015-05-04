$(function(){

var modifyType = 0;
var baseurl = $('#url').val();
var id = 0; 
var className;
var itId = $('#hid').val();

$('#dp3').datepicker();
$('#dp4').datepicker();
$('#dp5').datepicker();
	
$('.btn-setAdd').on('click',function(e){
	e.preventDefault();

	modifyType = 1;
	$('#modifyType').val(modifyType);
});

$(document).on('click','.btn_edit',function(e){
	e.preventDefault();
	e.stopPropagation();
	modifyType = 2;
	id = $(this).closest('tr').data('item-id');
	className = '.class-item-'+id+' .date_name a';
	$('#dateNow').val($(className).html());
	$('#modifyType').val(modifyType);
});

$('.btn_ok').on('click',function(){
	var dataval = $('#dateNow').val();
	if(modifyType == 1){
		$.ajax({
			url:baseurl+'/add',
			type:'post',
			data:{'dateNow':dataval},
			success:function(data){
				if(data.success != false){
					$('#tbl-date tbody').append(data);
					modifyType = 0;
					$('.close').click();
					$('#dateNow').val('');
				}else{
					alert(data.errors);
				}
			}
		});
	}else{	
		$.ajax({
			url:baseurl+'/edit',
			type:'post',
			data:{'id':id,'dateNow':dataval},
			datatype: 'json',
			success:function(data){
				
				if(data.success != false){
					$(className).html(dataval);
					modifyType = 0;
					$('.close').click();
					$('#dateNow').val('');
				}else{
					alert(data.errors);
				}
		
			}
		});
	}	

});

$('.btn-ok-add').on('click',function(){
	var formData = $('#authAdd').serialize();
	if(modifyType == 1){
		$('#authAdd').submit();
	}else{
		className = '.class-item-'+id;
		$.ajax({
			url:baseurl+'/main/'+itId+'/edit_item',
			type:'post',
			data:formData+'&id='+id,
			datatype:'json',
			success:function(data){
				
				if(data.success != false){
					$(className).html('');
					$(className).html(data.errors);
					modifyType = 0;
					$('.close').click();
					$('#dateNow').val('');
				}else{
					alert(data.errors);
				}
				
			}
		});
	}
	
});

$('.btn-store-ok').on('click', function(){
	var formData = $('#form-store').serialize();
	if(modifyType == 1){
		$('#form-store').submit();
	}else{
		className = '.class-item-'+id;
		$.ajax({
			url:baseurl+'/main/'+itId+'/edit_item',
			type:'post',
			data:formData+'&id='+id,
			datatype:'json',
			success:function(data){
				
				if(data.success != false){
					$(className).html('');
					$(className).html(data.errors);
					modifyType = 0;
					$('.close').click();
					$('#dateNow').val('');
				}else{
					alert(data.errors);
				}
				
			}
		});
	}
});

$(document).on('click','.btn_delete',function(){
	var dataval = $('#dateNow').val();
	var id = $(this).closest('tr').data('item-id');
	
	if(confirm('do you want to delete?')){
		$.ajax({
			url:baseurl+'/delete',
			type:'post',
			data:{'id':id},
			success:function(data){
				
				if(data != 'false'){
					$('.class-item-'+id).remove();
				}
		
			}
		});
	}
	
});

$(document).on('click','.btn-del-item',function(e){
	e.preventDefault();
	var id = $(this).closest('tr').data('item-id');
	
	if(confirm('do you want to delete?')){
		$.ajax({
			url:baseurl+'/main/'+itId+'/delete_item',
			type:'post',
			data:{'bid':id},
			success:function(data){
				
				if(data != 'false'){
					$('.class-item-'+id).remove();
				}
		
			}
		});
	}
	
});

$(document).on('click','.btn-store-delete',function(e){
	e.preventDefault();
	var id = $(this).closest('tr').data('item-id');
	
	if(confirm('do you want to delete?')){
		$.ajax({
			url:baseurl+'/store/delete',
			type:'post',
			data:{'id':id},
			success:function(data){
				
				if(data != 'false'){
					$('.class-item-'+id).remove();
				}
		
			}
		});
	}
	
});

	
$('.btn_search').on('click',function(){
	var dateSeach = $('#txtsearch').val();
	var htmlStr;
	$.ajax({
		url:baseurl+'/search',
		type:'post',
		data:{'dateNow':dateSeach},
		success:function(data){
			$('#tbl-date tbody').html('');
			$('#tbl-date tbody').html(data);
		}    
	});
	
	
});




$('.btn_store-search').on('click',function(){
	var dateSeach = $('#txtsearch').val();
	var htmlStr;
	$.ajax({
		url:baseurl+'/store/search',
		type:'post',
		data:{'dateNow':dateSeach},
		success:function(data){
			$('#tbl-date tbody').html('');
			$('#tbl-date tbody').html(data);
		}    
	});
	
	
});

$('.btn-store-add').on('click', function(e){
	e.preventDefault();
	var dateId = $('#txtdate').val();
	if(modifyType == 1){
		$('#form-store').submit();
	}else{
		className = '.class-item-'+id;
		$.ajax({
			url:baseurl+'/store/edit_item',
			type:'post',
			data:{'datenow':dateId},
			success:function(data){
				
				if(!data.success){
					$(className).html(data.errors);
					modifyType = 0;
					$('.close').click();
					$('#dateNow').val('');
				}else{
					alert(data.errors);
				}
				
			}
		});
	}
});

});