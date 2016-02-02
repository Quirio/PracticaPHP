<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <title>Almacenamiento de CV</title>
	<?php
		require 'Coneccion.php';
		require 'Formularios.php';
		$Conect = new Coneccion('localhost','root','sar159753','cv');
	?>
    
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
	
  <body>
	<?php
		$Factoria = new Factoria();
		$Formulario_actual = $Factoria -> getformulario($IN);
		echo $Formulario_actual -> mostrar();
	?>
  </body>
</html>