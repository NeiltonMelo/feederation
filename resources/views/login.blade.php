<!DOCTYPE html>
<html>
	<head>
		<title>Login de Usuario</title>	
		<title>Feederation: We want you to the feed</title>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

				<style>
				body {
				 font-family: "Lato", sans-serif;
				 background-color: #D3D3D3;
   			 padding-bottom: 40px;
    			 padding-top: 60px;
					}	
			.box{
				width: 600px;
				margin:0 auto;
				border:1px solid #ccc;			
			}
		</style>
	</head>

<body>
	
<nav class="navbar  navbar-dark fixed-top justify-content-between" style="background-color: #111;">
  <a class="navbar-brand" href="#">Feederation</a>
    <ul class="nav nav-pills navbar-nav">    	
        
		  <strike></strike>@if(isset(Auth::user()->email))			
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
				<div class="form-inline">
					<input type="email" name="email" class="form-control mr-sm-2" placeholder="E-mail"/>
					<input type="password" name="password" class="form-control mr-sm-2" placeholder="Senha"/>			
					<input type="submit" name="login" class="btn btn-primary mr-sm-2" value="Login" />
					<li class="nav-item">
    		 				<a class="nav-link active" href="/cadastrarUsuario"> Cadastre-se </a>
  					</li>
				</div>
			</form>   
			
    </ul>
  </div>
</nav>
<!-- fim do menu superior -->
		
	</body>
</html>