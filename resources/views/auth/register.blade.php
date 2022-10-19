<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>DemoProject</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<style>
    #registation-box {
        position: absolute;
        top: 120px;
        left: 50%;
        transform: translateX(-50%);
        min-width: 500px;
        margin: 0 auto;
        border: 1px solid white;
        background: rgba(48, 46, 45, 1);
        min-height: 350px;
        padding: 20px;
        z-index: 9999;
    }

    #registation-box .logo .logo-caption {
        font-family: 'Poiret One', cursive;
        color: white;
        text-align: center;
        margin-bottom: 0px;
    }

    #registation-box .logo .tweak {
        color: #FDE428;
    }

    #registation-box .controls {
        padding-top: 30px;
    }

    #registation-box .controls input {
        border-radius: 0px;
        background: rgb(98, 96, 96);
        border: 0px;
        color: white;
    }

    #registation-box .controls input:focus {
        box-shadow: none;
    }

    #registation-box .controls input:first-child {
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
    }

    #registation-box .controls input:last-child {
        border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
    }

    #registation-box button.btn-custom {
        border-radius: 2px;
        margin-top: 8px;
        background:#FDE428;
        border-color: rgba(48, 46, 45, 1);
        color: white;
    }

    #registation-box button.btn-custom:hover{
        -webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
        background: rgba(48, 46, 45, 1);
        border-color: #FDE428;
    }
</style>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div id="registation-box">
		<div class="logo">
			<img src="" class="img img-responsive img-circle center-block"/>
			<h1 class="logo-caption"><span class="tweak">Demo</span>Project</h1>
		</div><!-- /.logo -->
        <form method="POST" action="">
          @csrf
            <div class="controls">
                <input type="text" class="form-control radius-30 ps-5" id="name" name="name" placeholder="Name"/><br>

                <input type="email" class="form-control radius-30 ps-5" id="email" name="email" placeholder="Email"/><br>
              
                <input type="password" class="form-control radius-30 ps-5" name="password" id="password" placeholder="Password" /><br>
            
                <button type="submit" class="btn btn-default btn-block btn-custom">Register</button>             
            </div>
        </form>
	</div>
</div>
<div id="particles-js"></div>
<!-- partial -->
<script src='https://code.jquery.com/jquery-1.11.1.min.js'></script>
<script src="{{asset('script.js')}}"></script>
</body>
</html>
