
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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
			<form method="post" action="{{ url('cadastrarUsuario') }}">
				{{ csrf_field() }}
				<?php
					$email = $_POST['email'];
				?>
				<input type="hidden" name="email" value="<?php echo $email;?>" />
				
				<div class="form-group">
					<label>Nome</label>
					<input type="text" name="nome" class="form-control" value="" />
				</div>
				<div class="form-group">
					<label>Sobrenome</label>
					<input type="text" name="sobrenome" class="form-control" value="" />
				</div>		
				<div class="form-group">
					<label>Sexo</label>
					
					<label class="radio-inline"><input type="radio" name="sexo" 
					class="radio-inline" value="masculino">Masculino</label>
  					<label class="radio-inline"><input type="radio" name="sexo" 
  					class="radio-inline" value="feminino">Feminino</label>
								
				</div>
				<div class="form-group">
					<label>Data de Nascimento</label>
					<input type="date" name="nascimento" class="form-control" value="" />
				</div>		
				<div class="form-group">
					<label>Senha</label>
					<input type="password" name="password" class="form-control" value="" />				
				</div>
					<input type="hidden" name="administrador" value="FALSE" />
				<div class="form-group">
					<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
				</div>
			</form>
		</div>
		
	</body>
</html>