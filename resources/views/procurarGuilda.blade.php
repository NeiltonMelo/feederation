<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
	<title>Guildas</title>
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
			<strong>Esta guilda já solicitou sua entrada!</strong>
		</div>
	@endif	
	<table border="1">
	<tr><td>Nome</td></tr>
	@foreach ($guildas as $guilda)
	<form method="post" action="/solicitacaoGuilda">
		{{ csrf_field() }}
		<tr>
			<?php
				$minhaPersona = \feederation\Persona::find(Auth::user()->personaPadrao);
			?>
			@if ($guilda->game_id != $minhaPersona->game_id) 
				@continue;
			@endif
			
			<td>{{ $guilda->nome}}  :: Administrador = {{ $guilda->administrador_id }} </td>
			<td>
				<input type="submit" name="home" class="btn btn-primary" value="Solicitar entrada" />
			</td>
		</tr>
		<input type="hidden" name="nome" value="{{$guilda->nome}}"/>
		<input type="hidden" name="guilda_id" value="{{$guilda->id}}"/>		
	</form>
	@endforeach
	</table>	
</body>
</html>