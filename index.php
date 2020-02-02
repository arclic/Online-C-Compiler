<html>
<head>
	<title>C Compiler with PHP</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
	<h1>C Compiler with PHP(v 7.3.9)</h1>
	
	<form action="compile.php" method="POST">
		<label for="code">Source Code</label>
		<p><textarea class="form-control" name="code" rows="20" cols="100"></textarea></p>
		
		<label for="input">Input(Optional)</label>
		<p><textarea class="form-control" name="input" rows="20" cols="100"></textarea></p>
		<input type="submit" value="Compile">
	</form>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>