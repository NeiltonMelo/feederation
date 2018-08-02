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
				<?php $id = Auth::user()->id;?>
				<div class="alert alert-danger success-block">
					<strong>Bem-vindo {{Auth::user()->nome}}</strong>
					<br/>
					<form method="get" action="{{url('editarUsuario')}}{{$id}}">
						<input type="submit" name="editarUsuario" class="btn btn-primary" value="Editar Usuario" /> 						
					</form>		
					<form method="post" action="{{url('criarGuilda')}}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="<?php echo $id;?>" />
						<input type="submit" name="criarGuilda" class="btn btn-primary" value="Criar Guild" />				
					</form>
					<form method="post" action="{{url('cadastrarGame')}}">
						{{ csrf_field() }}
						<input type="submit" name="criarGame" class="btn btn-primary" value="Cadastrar Game" />				
					</form>
					<a href="{{ url('/main/sair')}}">Sair</a>
				</div>
			@else
				<script>
					window.location="/main";
				</script>
			@endif
			
			<br/>
		</div>
	</body>
</html>