<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Ex Store</title>
<link rel="stylesheet" href="{{URL::to('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{URL::to('assets/css/mystyle.css')}}">
<link rel="stylesheet" href="{{URL::to('assets/css/datepicker.css')}}">
</head>
<body>
<div class="section--login">
		<div class="container">
		 	<div class="log-form">
			    	{{ Form::open(['url' => '/login']) }}
			       <div class="row">
			       		<div class="col-md-10">
			       			<div class="form-group">
			       				{{ 
			       					Form::text('username', '', array('class' => 'form-control','id' => 'inputUsername' , 'placeholder' => 'Username')) 
			       				}}
			       				<p>{{ $errors->first('username') }}</p>
			       			</div>
			       		</div>
			       		<div class="col-md-10">
			       			<div class="form-group">
				       			{{ Form::password('password', array('class' => 'form-control', 'id' => 'inputPassword' , 'placeholder' => 'Password')) }}
				       			<p>{{ $errors->first('password') }}</p>	
				       		</div>
				       	</div>
				       	<div class="col-md-2">	
				      		{{ Form::submit('Sign In',array('class' => 'btn btn-sm btn-primary')) }}
				       </div>
				   </div>    
			     </form>
			     {{ Form::close() }}
			</div>     
		</div> <!-- /container -->
 </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{URL::to('assets/js/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('assets/js/myjs.js')}}"></script>
<script src="{{URL::to('assets/js/validator.js')}}"></script>
</html>