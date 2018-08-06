<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title> asdasd</title>
</head>
<body>
	
	<strong>Guilda: {{ $nome }}     Bem-vindo {{Auth::user()->nome}} logado como {{Auth::user()->nome_persona }} </strong>
	<table border="1">
	<tr><td>Nome</td></tr>
	@foreach ($membros as $membro)
	<form method="get" action="/home">
		{{ csrf_field() }}
		<tr>
			<td>{{ $membro->nome }} </td>
			<td>
				
				<input type="submit" name="home" class="btn btn-primary" value="Escolher" />
			</td>
		</tr>				
	</form>
	@endforeach
	</table>	
</body>
</html>