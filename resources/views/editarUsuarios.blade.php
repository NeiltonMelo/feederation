<!DOCTYPE html>
<html>
<head>
<title>Feederation - Editar Usuario</title>
</head>
<body>
<h1>Atualize seus dados aqui</h1>
</body>
<form action="/editar/usuario" method="post" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<input type="hidden" name="id" value="{{ $usuario->id }}" />
	Nome: 					<input type="text" name="nome" /><br/>
	Sobrenome: 				<input type="text" name="sobrenome" /><br/>
   email: 					<input type="text" name="email" /><br/>
 <input type="submit" value="atualizar" />
</form>
</html>