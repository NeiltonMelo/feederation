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
					<form method="post" action="{{url('minhasGuildas')}}">
						{{ csrf_field() }}
						<input type="submit" name="minhasGuildas" class="btn btn-primary" value="Minhas Guildas" /> 						
					</form>			
					<form method="post" action="{{url('criarGuilda')}}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="<?php echo $persona_id;?>" />
						<input type="submit" name="criarGuilda" class="btn btn-primary" value="Criar Guild" />				
					</form>
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