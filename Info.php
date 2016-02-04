<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Usuarios.</title>
  </head>
	
  <body>
	<?php
		require 'Coneccion.php';
		require 'Formularios.php';
		$Conect = new Coneccion('localhost','root','usuarios');
		$Factoria = new Factoria();
		$Formulario_actual = $Factoria -> getformulario();
		echo $Formulario_actual -> mostrar();
		if ( $_POST ){
			echo "entro";
			echo $Formulario_actual -> ejecutar_BDD();
		}
		$Conect -> Close();
	?>
  </body>
  
</html>