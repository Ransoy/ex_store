$(function(){

var modifyType = 0;
var baseurl = $('#url').val();
var id = 0; 
var className;

$('#dp3').datepicker();
$('#dp4').datepicker();
	
$('.btn-setAdd').on('click',function(){
	modifyType = 1;
	$('#modifyType').val(modifyType);
});

$(document).on('click','.btn_edit',function(){
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
				
				if(data != 'false'){
					$(className).html(dataval);
					modifyType = 0;
					$('.close').click();
					$('#dateNow').val('');
				}
		
			}
		});
	}	

});

$('.btn-ok-add').on('click',function(){
	$.ajax({
		url:baseurl+'/main/add_item',
		type:'post',
		data:data,
		datatype:'json',
		success:function(data){
			
			if(data != 'false'){
				$('#tbl-date tbody').append(data);
				modifyType = 0;
				$('.close').click();
				$('#dateNow').val('');
			}
			
		}
	});
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

});