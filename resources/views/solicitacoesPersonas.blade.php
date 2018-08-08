<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Solicitações de Personas</title>
</head>
<body>
	<table border="1">
	<tr><td>Nome</td> </tr>
		
	@foreach ($solicitacoes as $solicitacao)
	<form method="post" action="'/home/guilda/{{}}/aceitarSolicitacaoPersona'">
		{{ csrf_field() }}
		<tr>
			<?php
				$persona = \feederation\Persona::find($solicitacao->persona_id);
				$nomeCompleto = $persona->nome." ".$persona->sobrenome;
			?>
			<td>{{ $nomeCompleto}} </td>
			<td>
				<input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}"/>
				<input type="hidden" name="persona_id" value="{{$persona->id}}"/>
				<input type="submit" name="home" class="btn btn-primary" value="Aceitar" />
			</td>
		</tr>				
	</form>
	@endforeach
	</table>	
</body>
</html>