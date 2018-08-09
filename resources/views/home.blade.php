<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>	
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
		<br />
		<div class="container box">
			<h3 align="center"> Home</h3>
			<br/>
			
			@if(isset(Auth::user()->email))
				<?php
					$persona_id = Auth::user()->personaPadrao;
					$usuario_id = Auth::user()->id;
					$persona = \feederation\Persona::find($persona_id);
					$guilda = \feederation\Guilda::find($persona->guilda_id);
				?>
				<div class="alert alert-danger success-block">
					<strong>Bem-vindo {{Auth::user()->nome}} logado como {{Auth::user()->nome_persona }} </strong>
					<br/>
					<form method="get" action="{{url('editarUsuario')}}{{$usuario_id}}">
						<input type="submit" name="editarUsuario" class="btn btn-primary" value="Editar Usuario" /> 						
					</form>	
					<form method="get" action="{{url('escolherPersona')}}">
						<input type="submit" name="editarUsuario" class="btn btn-primary" value="Escolher Persona" /> 						
					</form>	
			
					<form method="post" action="{{url('criarGuilda')}}">
						{{ csrf_field() }}
						@if($guilda == null)
							<input type="hidden" name="id" value="<?php echo $persona_id;?>" />
							<input type="submit" name="criarGuilda" class="btn btn-primary" value="Criar Guilda" />				
						@endif
					</form>
					@if($guilda != null)
					<form method="post" action="/home/guilda/{{$guilda->nome}}">
						{{ csrf_field() }}
						<input type="hidden" name="nome" value="{{$guilda->nome}}"/>
						<input type="hidden" name="guilda_id" value="{{$guilda->id}}"/>
						<input type="submit" name="minhaGuilda" class="btn btn-primary" value="Minha Guilda" /> 						
						
					</form>
					@else
					<form method="post" action="{{url('solicitacoesGuildas')}}">
						{{ csrf_field() }}
						
							<input type="hidden" name="id" value="<?php echo $usuario_id;?>" />
							<input type="submit" name="solicitacoesGuildas" class="btn btn-primary" value="Solicitações de guildas" />				
						
					</form>
					<form method="post" action="{{url('procurarGuilda')}}">
						{{ csrf_field() }}
						<label>Adicionar guilda</label>
						<input type="text" name="nome" class="form-control" required value=""/>
						<input type="hidden" name="id" value="<?php echo $usuario_id;?>" />
						<input type="submit" name="procurarGuilda" class="btn btn-primary" value="Procurar guildas" />				
					</form>
					@endif
					<form method="post" action="{{url('criarPersona')}}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="<?php echo $usuario_id;?>" />
						<input type="submit" name="criarPersona" class="btn btn-primary" value="Criar Persona" />				
					</form>
					<form method="post" action="{{url('Novo Post')}}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="<?php echo $usuario_id;?>" />
						<input type="submit" name="criarPersona" class="btn btn-primary" value="Postar" />				
					</form>
					<form method="post" action="{{url('solicitacoes')}}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="<?php echo $usuario_id;?>" />
						<input type="submit" name="solicitacoesAmizade" class="btn btn-primary" value="Solicitações de amizade" />				
					</form>
					<form method="post" action="{{url('procurarAmigo')}}">
						{{ csrf_field() }}
						<label>Adicionar amigo</label>
						<input type="text" name="nome" class="form-control" required value=""/>
						<input type="hidden" name="id" value="<?php echo $usuario_id;?>" />
						<input type="submit" name="procurarAmigo" class="btn btn-primary" value="Procurar personas" />				
					</form>
					<form method="post" action="{{url('listarAmigos')}}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="<?php echo $usuario_id;?>" />
						<input type="submit" name="listarAmigos" class="btn btn-primary" value="Meus Amigos" />				
					</form>
					<div>
					<tr><td>Posts</td></tr>
					@foreach ($posts as $post)
					{{ csrf_field() }}
					<tr>
						<td>{{ $post->nome_persona }} </td>
						<td>
							{{ $post->conteudo }}
						</td>
					</tr>				
	
					@endforeach
					</div>
					
					
					
					<a href="{{ url('/main/sair')}}">Sair</a>
				</div>
			@else
				<script>
					window.location="/main";
				</script>
			@endif
			
			<br/>
		</div>
	</body>
</html>