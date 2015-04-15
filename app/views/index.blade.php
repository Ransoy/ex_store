@extends('layout.default')

@section('content')
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
 @stop