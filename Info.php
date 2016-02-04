<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
<<<<<<< HEAD
    <title>Usuarios.</title>

=======
    <title>Almacenamiento de CV</title>
	<?php
		require 'Coneccion.php';
		require 'Formularios.php';
		$Conect = new Coneccion('localhost:8081','root','sar159753','usuarios');
	?>
    
    <link rel="stylesheet" type="text/css" href="style.css" />
>>>>>>> origin/master
  </head>
	
  <body>
	<?php
<<<<<<< HEAD
		require 'Coneccion.php';
		require 'Formularios.php';
		$Conect = new Coneccion('localhost','root','usuarios');
		$Factoria = new Factoria();
		$Formulario_actual = $Factoria -> getformulario();
		echo $Formulario_actual -> mostrar();
		if ( $_POST ){
			echo $Formulario_actual -> ejecutar_BDD();
		}
=======
	/*
		$Factoria = new Factoria();
		$Formulario_actual = $Factoria -> getformulario($IN,$Conect->con);
		echo $Formulario_actual -> mostrar();
		if ( $_POST ){
			echo "pollo";
			$Formulario_actual -> ejecutar_BDD();
		}
		*/
>>>>>>> origin/master
	?>
  </body>
  
</html>