<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Listar usuarios</title>
</head>
<body>
	<table border="1">
	@foreach ($usuario as $usuario)
		<tr>
			<td>{{ $usuario->id }} </td>
			<td>{{$usuario->nome}} </td>
			<td><a href='/editar/usuario{{ $usuario->id }}'> editar </a>
				 <a href='/remover/usuario{{ $usuario->id}}'> remover </a></td>
		</tr>
		@endforeach
	</table>
	<a href="/adicionar/usuario"> Inserir usuario</a>		
</body>
</html>