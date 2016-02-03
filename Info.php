<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <title>Almacenamiento de CV</title>
	<?php
		require 'Coneccion.php';
		require 'Formularios.php';
		$Conect = new Coneccion('localhost:8081','root','sar159753','usuarios');
	?>
    
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
	
  <body>
	<?php
	/*
		$Factoria = new Factoria();
		$Formulario_actual = $Factoria -> getformulario($IN,$Conect->con);
		echo $Formulario_actual -> mostrar();
		if ( $_POST ){
			echo "pollo";
			$Formulario_actual -> ejecutar_BDD();
		}
		*/
	?>
  </body>
</html>