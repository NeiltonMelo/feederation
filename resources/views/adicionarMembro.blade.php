<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
	<title>Personas</title>
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
	@if ($error)
		<div class="alert alert-danger alert-block">	
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>Esta persona já solicitou sua entrada aqui!</strong>
		</div>
	@endif	
	<table border="1">
	<tr><td>Nome</td></tr>
	@foreach ($personas as $persona)
	<form method="post" action="/home/guilda/{{$nome}}/solicitacaoMembro">
		{{ csrf_field() }}
		<tr>
			<?php
				$nomeCompleto = $persona->nome ." ".$persona->sobrenome;
				$minhaPersona = \feederation\Persona::find(Auth::user()->personaPadrao);
			?>
			@if ($persona->id == Auth::user()->persona_id)
				@continue;
			@elseif ($persona->game_id != $minhaPersona->game_id) 
				@continue;
			@elseif ($persona->guilda_id != null)
				@continue;
			@endif
			
			<td>{{ $nomeCompleto}}  :: Usuario = {{ $persona->usuario_id }} </td>
			<td>
				<input type="submit" name="home" class="btn btn-primary" value="Adicionar Membro" />
			</td>
		</tr>
		<input type="hidden" name="nome" value="{{$persona->nome}}"/>
		<input type="hidden" name="persona_id" value="{{$persona->id}}"/>		
	</form>
	@endforeach
	</table>	
</body>
</html>