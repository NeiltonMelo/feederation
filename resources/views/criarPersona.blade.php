
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<title>Feederation - Criar Persona</title>	
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
			<h3 align="center"> Criar Persona</h3>
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
			<form method="post" action="inserirPersona">
			   {{ csrf_field() }}
				<?php
					$id = $_POST['id'];
				?>
				<input type="hidden" name="usuario_id" value="<?php echo $id;?>" />
				<div class="form-group">
					<label>Nome</label>
					<input type="text" name="nome" class="form-control" required value="" />
				</div>
				<div class="form-group">
					<label>Sobrenome</label>
					<input type="text" name="sobrenome" class="form-control" required value="" />
				</div>	
				<div class="form-group">
					<label>Game id</label>
					<input type="text" name="game_nome" class="form-control" required value="" />
				</div>	
				<div class="form-group">
					<label>Sexo</label>
					<input type="text" name="sexo" class="form-control" required value="" />
				</div>
				<div class="form-group date-mask">
					<label>Nascimento</label>
					<input type="date" name="nascimento" class="form-control" required value="" />
				</div>		
				<div class="form-group">
					<input type="submit" name="criar" class="btn btn-primary" value="Criar" />
				</div>
			</form>
		</div>
		
	</body>
</html>