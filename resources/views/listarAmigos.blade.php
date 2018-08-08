<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Meus Amigos</title>
</head>
<body>
	<form method="get" action="/home">
		<table border="1">
		<tr><td>Amigo</td> <td>Jogo</td></tr>
		@foreach ($amigos as $amigo)
		{{ csrf_field() }}
		<tr>
			<?php
				$persona = \feederation\Persona::find($amigo->personaAmigo_id);
				$jogo = \feederation\Game::find($persona->game_id);
				$nomeCompleto = $persona->nome ." ".$persona->sobrenome;
			?>
			<td>{{ $nomeCompleto}} </td>
			<td>{{ $jogo->nome}} </td>
		</tr>
		@endforeach
		</table>	
		<input type="submit" name="home" class="btn btn-primary" value="Voltar" />	
	</form>		
</body>
</html>