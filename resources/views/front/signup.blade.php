<!DOCTYPE html>
<html>
<head>
	<title>Registarse</title>
</head>
<body>
<form method="post" action="{{ action('User_controller@create') }}">
	{{ csrf_field() }}
<label for="user">USUARIO</label>
<input type="text" name="user" placeholder="Ingrese usuario">
<label for="email">Email</label>
<input type="text" name="email" placeholder="Ingrese email">
<label for="pass">Pass</label>
<input type="password" name="pass" placeholder="********">
<button type="submit">Ingresar</button>
</form>
</body>
</html>