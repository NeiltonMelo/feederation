<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title> asdasd</title>
</head>
<body>
	
	<strong>Guilda: {{ $nome }}     Bem-vindo {{Auth::user()->nome}} logado como {{Auth::user()->nome_persona }} </strong>
	<form method="post" action="/home/guilda/{{$nome}}/adicionarMembro">	
	<table border="1">
	<tr><td>Nome</td></tr>
	<?php
		$guilda = \feederation\Guilda::find($guilda_id);
	?>
	@foreach ($membros as $membro)
		{{ csrf_field() }}
		<tr>
			<td>{{ $membro->nome }} </td>
			<td>
				<form method="get" action="/home">	
					<input type="submit" name="home" class="btn btn-primary" value="Escolher" />
				</form>
			</td>
		</tr>				
	
	@endforeach
	</table>
	@if($guilda->administrador_id == Auth::user()->personaPadrao)
		<input type="hidden" name="nome" value="{{$nome}}" />
		<input type="hidden" name="guilda_id" value="{{$guilda_id}}" />
		<input type="submit" name="home" class="btn btn-primary" value="Adicionar Membro" />
	@endif
	</form>
</body>
</html>