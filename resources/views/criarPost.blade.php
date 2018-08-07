
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
			<h3 align="center"> Criar Post</h3>
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
			<form method="post" action="inserirPost">
			   {{ csrf_field() }}
				<?php
					$id = Auth::user()->personaPadrao;
				?>
				
				<div class="form-group">
					<label>Conteudo</label>
					<input type="hidden" name="persona_id" value="<?php echo $id;?>" />
					<input type="text" name="conteudo" class="form-control" required value="" />
				
				</div>
				<div class="form-group">
					<input type="submit" name="criar" class="btn btn-primary" value="Criar" />
				</div>
				
				
			</form>
		</div>
		
	</body>
</html>