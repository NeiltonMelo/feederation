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
			<strong>Esta persona já solicitou sua amizade!</strong>
		</div>
	@endif	
	<table border="1">
	<tr><td>Nome</td><td>Jogo</td></tr>
	@foreach ($personas as $persona)
	<form method="post" action="/adicionarAmigo">
		{{ csrf_field() }}
		<tr>
			<?php
				$jogo = \feederation\Game::find($persona->game_id);
				$amigo = \feederation\Amigo::where('persona_id',$persona->id)
													->where('personaAmigo_id',Auth::user()->personaPadrao)
													->get();
				$nomeCompleto = $persona->nome ." ".$persona->sobrenome;
			?>
			@if ($persona->usuario_id == Auth::user()->id)
				@continue;
			@elseif ($amigo->count() > 0)
				@continue;
			@endif
			
			<td>{{ $nomeCompleto}}  :: Usuario = {{ $persona->usuario_id }} </td>
			<td>{{ $jogo->nome}} </td>
			<td>
				<input type="hidden" name="nome" value="{{$persona->nome}}"/>
				<input type="hidden" name="persona_id" value="{{$persona->id}}"/>
				<input type="submit" name="home" class="btn btn-primary" value="Solicitar amizade" />
			</td>
		</tr>				
	</form>
	@endforeach
	</table>	
</body>
</html>