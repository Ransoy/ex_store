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
<div class="section--main">
	<div class="container">
		<div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{URL::to('/main')}}">Bakery</a></li>
              <li><a href="{{URL::to('/store')}}">Store</a></li>
                 <li><a href="{{URL::to('/logout')}}">Logout</a></li>
            </ul>
          </div>
			@yield('content')
	</div>		
</div>			
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{URL::to('assets/js/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('assets/js/myjs.js')}}"></script>
<script src="{{URL::to('assets/js/validator.js')}}"></script>
</html>