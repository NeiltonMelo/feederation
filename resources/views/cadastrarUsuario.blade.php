
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<title>Login de Usuario</title>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

				<style>
				body {
				 font-family: "Lato", sans-serif;
				 background-color: #D3D3D3;
   			 padding-bottom: 10px;
    			 padding-top: 60px;
					}
			
			.sidenav {
    			height: 100%;
    			width: 200px;
    			position: fixed;
    			z-index: 1;
    			top: 0;
    			left: 0;
    			background-color: #111;
    			overflow-x: hidden;
    			padding-top: 70px;
					}

			.sidenav a {
    			padding: 6px 6px 6px 32px;
    			text-decoration: none;
    			font-size: 19px;
    			color: #818181;
    			display: block;
					}

			.sidenav a:hover {
    			color: #f1f1f1;
				}

			.main {
    			margin-left: 200px; /* Same as the width of the sidenav */
			}

			@media screen and (max-height: 450px) {
  				.sidenav {padding-top: 15px;}
  				.sidenav a {font-size: 18px;}
					}			
			.box{
				width: 600px;
				margin:0 auto;
				border:1px solid #ccc;			
			}
		</style>
	</head>
	<body>
	
<!-- menu superior -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top justify-content-between" style="background-color: #111;">
  <a class="navbar-brand" href="/home">Feederation</a>
    <ul class="nav nav-pills navbar-nav">
      
  		<li class="nav-item ">
      	  <a class="nav-link" href="#">Personas</a>
      	 </li>
      <li class="nav-item">
        <a class="nav-link" href="/main/loginEfetuado">Profile</a>
     		 	</li>
     	<li class="nav-item">
    		 <a class="nav-link active" href="/main/sair"> Log out </a>
  				</li>
    </ul>
  </div>
</nav>
<!-- fim do menu superior -->	
	

			
			@if(isset(Auth::user()->email))
				<?php $id = Auth::user()->id;?>
					<div class="sidenav">
 						<form method="get" action="{{url('editarUsuario')}}{{$id}}">
							<input type="submit" name="editarUsuario" class="btn btn-primary" value=" Editar Usuario " /> 
						</form>
						<form method="get" action="{{url('cadastrarGame')}}">
							<input type="submit" name="cadastrarGame" class="btn btn-primary" value="Cadastrar Game" /> 
						</form>		
					</div>
			
				</div>
			@else
				<script>
					window.location="/main";
				</script>
			@endif


		<br />
		<div class="container box">
			<h3 align="center"> Cadastro</h3>
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


			<form method="post" action="{{ url('cadastrarUsuario') }}" >
				{{ csrf_field() }}
				<div class="form-group">
					<label>Digite seu email:</label>
					<input type="email" name="email" class="form-control" value="" />
				</div>
				<div class="form-group">
					<label>Nome</label>
					<input type="text" name="nome" class="form-control" required value="" />
				</div>
				<div class="form-group">
					<label>Sobrenome</label>
					<input type="text" name="sobrenome" class="form-control" required value="" />
				</div>		
				<div class="form-group">
					<label>Sexo</label>
					
					<label class="radio-inline"><input type="radio" name="sexo" 
					class="radio-inline" required value="masculino">Masculino</label>
  					<label class="radio-inline"><input type="radio" name="sexo" 
  					class="radio-inline" required value="feminino">Feminino</label>
								
				</div>
				<div class="form-group">
					<label>Data de Nascimento</label>
					<input type="date" name="nascimento" class="form-control" required value="" />
				</div>		
				<div class="form-group">
					<label>Senha</label>
					<input type="password" name="password" class="form-control" required value="" />				
				</div>
					<input type="hidden" name="administrador" value="FALSE" />
				<div class="form-group">
					<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
				</div>
			</form>
		</div>
		
	</body>
</html>