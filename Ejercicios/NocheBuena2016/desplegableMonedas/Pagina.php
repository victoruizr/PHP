<html>
	<head>
		<title>Conversor Online</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="script.php" method="post">
			<p>Monedas </p>
			<select name="desplegable">
				<option selected value="0">Elige una opcion</option>
				<option value="1">EuroLibra</option>
				<option value="2">LibraEuro</option>
				<option value="3">DolarEuro</option>
				<option value="4">EuroDolar</option>
				<option value="5">DolarLibra</option>
				<option value="6">LibraDolar</option>
			</select>
			<p>Valor </p>
			<input type="text" name="valor">
			<p>Comision </p>
			<input type="text" name="comision"> 
			<input type="submit" name="enviar">
		</form>
	</body>
</html>