<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesion</title>
</head>
<body>

<form method="post" action="{{ action('User_controller@login') }}">
	{{ csrf_field() }}
<label for="email">Email</label>
<input type="text" name="email" placeholder="Ingrese email">
<label for="pass">Pass</label>
<input type="password" name="pass" placeholder="********">
<button type="submit">Ingresar</button>
</form>

</body>
</html>