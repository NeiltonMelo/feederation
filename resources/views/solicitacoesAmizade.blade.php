<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Minhas Solicitações</title>
</head>
<body>
	<table border="1">
	<tr><td>Nome</td> <td>Jogo</td></tr>
	@foreach ($solicitacoes as $solicitacao)
	<form method="post" action="/aceitarSolicitacao">
		{{ csrf_field() }}
		<tr>
			<?php
				$remetente = \feederation\Persona::find($solicitacao->personaRemetente_id);
				$jogo = \feederation\Game::find($remetente->game_id);
				$nomeCompleto = $remetente->nome ." ".$remetente->sobrenome;
			?>
			<td>{{ $nomeCompleto}} </td>
			<td>{{ $jogo->nome}} </td>
			<td>
				<input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}"/>
				<input type="hidden" name="persona_id" value="{{$remetente->id}}"/>
				<input type="submit" name="home" class="btn btn-primary" value="Aceitar" />
			</td>
		</tr>				
	</form>
	@endforeach
	</table>	
</body>
</html>