<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>Feederation- Cadastre-se</title>
</head>
<body>
	<h1>Cadastro de Usuário</h1>	
	<form action="/adicionar/usuario" method="post" >
								<input type="hidden" name="_token" value= "{{ csrf_token() }}" >
	Nome: 					<input type="text" name="nome" /><br/>
	Sobrenome: 				<input type="text" name="sobrenome" /><br/>
   email: 					<input type="text" name="email" /><br/>
   Sexo: 					<input type="text" name="sexo" /><br/>
   Data de Nascimento: 	<input type="date" name="nascimento" /><br/> 	
								<input type="submit" name="usuario" /><br/>
								<input type="hidden" name="tipoUsuario_id" value="" />
		
	</form>
	
</body>
</html>