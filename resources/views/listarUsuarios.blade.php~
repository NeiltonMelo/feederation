<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<title>Listar usuarios</title>
</head>
<body>
	<table border="1">
	@foreach ($user as $user)
		<tr>
			<td>{{ $user->id }} </td>
			<td>{{$user->nome}} </td>
			<td><a href='/editarUsuario{{$user->id}}' >editar</td>
		</tr>
		@endforeach
	</table>
	<a href="/cadastrarUsuario"> Inserir usuario</a>		
</body>
</html>