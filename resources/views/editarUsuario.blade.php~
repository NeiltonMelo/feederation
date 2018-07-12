<!DOCTYPE html>
<html>
	<head>
		<title>Feederation - Editar Usuario</title>
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
				<h3 align="center"> Atualize seus dados aqui</h3>
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
		<form action="atualizarUsuario" method="get" class="form">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" name="nome" class="form-control" value="{{$user->nome}}" />
			</div>
			
			<input type="hidden" name="id" value="{{$user->id}}"  />
			
			<div class="form-group">
				<label>Sobrenome</label>
				<input type="text" name="sobrenome" class="form-control" value="{{$user->sobrenome}}" />
			</div>
			
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="{{$user->email}}" />
			</div>
			
			<div class="form-group">
				<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar" />
			</div>			
		</form>
	</body>
</html>