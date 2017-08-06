<!-- resources/views/auth/login.blade.php -->
<html lang="es">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <!--<link rel="icon" href="{ asset('favicon.ico') }}">-->

	    <title>ELMA | Login</title>

	    <!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	    <!-- Custom styles  -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/login.css') }}">

  	</head>

  <body>

    <div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<img src="{{ asset('img/login.jpg') }}" alt="maga" height="100">
			</div>
		</div>

		{!! Form::open(['id' => 'form_login', 'name' => 'login', 'class' => 'form-signin' ,'method' => 'POST', 'url' => url('login')] ) !!}
			{!! Form::hidden('_token', csrf_token() ) !!}
			<h2 class="form-signin-heading text-center">Iniciar Sesión</h2>

			@if (count($errors) > 0)
			    <div class="alert alert-danger text-center">
			        <ul style="padding-left: 0px;">
			            @foreach ($errors->all() as $error)
			                <li style="list-style: none;">{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

		  	{!! Form::label('inputUsername', 'Username', ['class' => 'sr-only text-center']) !!}
            {!! Form::text('inputUsername', null, ['id' => 'inputEmail', 'class' => 'form-control', 'placeholder' => 'Usuario o Email', 'autofocus' => '', '' => '']) !!}

            {!! Form::label('inputPassword', 'Password', ['class' => 'sr-only text-center']) !!}
            {!! Form::password('inputPassword', ['id' => 'inputPassword', 'class' => 'form-control', 'placeholder' => 'Contraseña', '' => '']) !!}
		  	
		  	<div class="checkbox text-center">
				<label>
					<input type="checkbox" name="remember" value="remember-me"> Recordarme
				</label>
			</div>
		  
		  <button type="submit" class="btn btn-lg btn-primary btn-block btn-login">Ingresar</button>
		

		{!! Form::close() !!}

		<div class="row" style="margin-top: 10px;">
			<div class="col-sm-12 text-center">
				<a href="{{ url('password/reset') }}"><small>¿Olvidaste tu contraseña?</small></a>
			</div>
		</div>


    </div> <!-- /container -->

	<script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
  

</body></html>