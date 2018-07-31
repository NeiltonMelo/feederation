<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Ecolher Persona</title>
</head>
<body>
	<table border="1">
	<tr><td>Nome</td></tr>
	@foreach ($personas as $persona)
	<form method="post" action="personaEscolhida">
		
		<tr>
			<td>{{ $persona->nome }} </td>
			<td>
				<input type="hidden" name="id" value="{{ $persona->id }}" />
				<input type="submit" name="home" class="btn btn-primary" value="Escolher" />
			</td>
		</tr>				
	</form>
	@endforeach
	</table>

</body>       
</html>