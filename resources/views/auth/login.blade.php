<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>DemoProject</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div id="login-box">
		<div class="logo">
			<img src="" class="img img-responsive img-circle center-block"/>
			<h1 class="logo-caption"><span class="tweak">Demo</span>Project</h1>
		</div><!-- /.logo -->
      <div class="controls">
          <input type="email" class="form-control radius-30 ps-5" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus/><br>
        
          <input type="password" class="form-control radius-30 ps-5" name="password" id="password" placeholder="Password" required autocomplete="current-password" />
      
          <button type="button" id="login_btn" class="btn btn-default btn-block btn-custom">Login</button>
          <div style="padding-top:10px;"> 
              <a class="btn btn-default btn-custom" href="{{url('/register')}}">Register</a>
          </div>              
      </div>
	</div>
</div>
<div id="particles-js"></div>
<!-- partial -->
<script src='https://code.jquery.com/jquery-1.11.1.min.js'></script>
<script src="{{asset('script.js')}}"></script>
</body>
</html>
<script>
       
    $("#login_btn").click(function(){

      // console.log('{{ csrf_token() }}');
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('auth/login')}}",       
        type: "POST",
        data: {
          email: $('#email').val(),
          password: $('#password').val()
        },
        success: function( response ) {
          console.log(response);
        }
       });
    });
    
</script>