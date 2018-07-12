<!DOCTYPE html>
<html>
	<head>
		<title>Login de Usuario</title>	
		<script src="https://ajax.googleapis.com/ajax/libs/
		jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://
		maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/
		bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/
		bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			.box{
				width: 600px;
				margin:0 auto;
				border:1px solid #ccc;			
			}
		</style>
	</head>
	<body>
		<br />
		<div class="container box">
			<h3 align="center"> Login</h3>
			<br/>
			
			@if(isset(Auth::user()->email))			
				<script>
					window.location="/main/loginEfetuado";
				</script>
			@endif
			
			@if ($mensagem = Session::get('error'))
				<div class="alert alert-danger alert-block">	
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>{{$mensagem}}</strong>
				</div>
			@endif			
			
			@if(count($errors) >0)
			
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form method="post" action="{{ url('main/checarLogin') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" />
				</div>				
				<div class="form-group">
					<label>Senha</label>
					<input type="password" name="password" class="form-control" />				
				</div>
				<div class="form-group">
					<input type="submit" name="login" class="btn btn-primary" value="Login" />
				</div>
			</form>
		</div>
		<div class="container box">
			<h3 align="center"> Cadastre-se</h3>
			<br/>
						
			
			@if(count($errors) >0)
			
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form method="post" action="{{ url('/checarEmail') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Digite seu email:</label>
					<input type="email" name="email" class="form-control" value=" " />
				</div>				
				<div class="form-group">
					<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
				</div>
			</form>
		</div>
	</body>
</html>