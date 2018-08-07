<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Ecolher Persona</title>
</head>
<body>
	<table border="1">
	<tr><td>Nome</td></tr>
	@foreach ($personas as $persona)
	<form method="post" action="/personaEscolhida">
		{{ csrf_field() }}
		<tr>
			<td>{{ $persona->nome }} </td>
			<td>
				<input type="hidden" name="persona_id" value="{{ $persona->id }}" />
				<input type="submit" name="home" class="btn btn-primary" value="Escolher" />
			</td>
		</tr>				
	</form>
	@endforeach
	</table>
	<?php $id = Auth::user()->id;?>
	<form method="post" action="{{url('criarPersona')}}">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="<?php echo $id;?>" />
		<input type="submit" name="criarPersona" class="btn btn-primary" value="Criar Persona" />				
	</form>

</body>       
</html>