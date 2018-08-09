<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Solicitações de Guildas</title>
</head>
<body>
	<table border="1">
	<tr><td>Nome</td> </tr>
	@foreach ($solicitacoes as $solicitacao)
	<form method="post" action="/aceitarSolicitacaoGuilda">
		{{ csrf_field() }}
		<tr>
			<?php
				$guilda = \feederation\Guilda::find($solicitacao->guilda_id);
			?>
			<td>{{ $guilda->nome}} </td>
			<td>
				<input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}"/>
				<input type="hidden" name="guilda_id" value="{{$guilda->id}}"/>
				<input type="submit" name="home" class="btn btn-primary" value="Aceitar" />
			</td>
		</tr>				
	</form>
	@endforeach
	</table>	
</body>
</html>