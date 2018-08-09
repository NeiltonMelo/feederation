<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Minhas guildas</title>
</head>
<body>
	<table border="1">
	<tr><td>Nome</td></tr>
	@foreach ($guildas as $guilda)
	<form method="post" action="/home/guild/{{$guilda->nome}}">
		{{ csrf_field() }}
		<tr>
			<td>{{ $guilda->nome }}  :: Game = {{ $guilda->game_id }} </td>
			<td>
				<input type="hidden" name="nome" value="{{$guilda->nome}}"/>
				<input type="hidden" name="guilda_id" value="{{$guilda->id}}"/>
				<input type="submit" name="home" class="btn btn-primary" value="Escolher" />
			</td>
		</tr>				
	</form>
	@endforeach
	</table>	
</body>
</html>