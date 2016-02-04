<?php

	define("IN",0);
	define("ALUM",1);
	
	abstract class Formulario{
		protected $TextoHTML;
		abstract public function ejecutar_BDD();
		public function mostrar(){
			return $this -> TextoHTML;
		}
	}
	
	class Formulario_in extends Formulario{
		public function Formulario_in (){
			$this -> TextoHTML .= <<<HTML
			<h1> Nuevo Usuario del Servicio </h1>
			<form action="{$_SERVER['PHP_SELF']}" method="post">
    			<label>Nombre:</label><br />
				<input name="nombre" id="Nombre" type="text" required/><br />
				<label>Apellidos:</label><br />
				<input name="apellidos" id="Apellidos" type="text" required/><br />
				<label>Teléfono:</label><br />
				<input name="telefono" id="Telefono" type="tel" required/><br />
				<label>Correo</label><br />
				<input name="correo" id="Correo" type="email" required/><br />
				<input type="submit" value="Crear" />
			</form>
    
			<br />
			<a href="Info.php">Atrás</a>"
HTML;
		}
		
		public function ejecutar_BDD(){
			$Nombre = $_POST['nombre'];
			$Apellidos = $_POST['apellidos'];
			$Correo = $_POST['correo'];
			$Telefono = $_POST['telefono'];
			$sql = "INSERT INTO `usuarios`(`Nombre`, `Apellido`, `Correo`, `Telefono`) VALUES('$Nombre','$Apellidos','$Correo','$Telefono')";
			mysql_query($sql);
		}
	}
	
	class Formulario_out extends Formulario{
		public $Resultados = "";
		public function Formulario_out(){
			$this -> TextoHTML = <<<HTML
			<h1>Consulta de datos de usuarios</h1>
			<h2>Introduzca el nombre del usuario</h2>
			<form action="{$_SERVER['PHP_SELF']}" method="post">
				<input name="nombre" id="Nombre" type="text" required/><br />
				<input type="submit" value="consultar" />
			</form>
			<a href="{$_SERVER['PHP_SELF']}?formulario_tipo=0">Nueva Usuario</a>
			<a href="{$_SERVER['PHP_SELF']}?formulario_tipo=1">Obtener Información Alumno</a>
HTML;
						
		}
		
		public function ejecutar_BDD(){
				$Nombre = $_POST['nombre'];
				$sql = "SELECT `Nombre`, `Apellido`, `Correo`, `Telefono` FROM `usuarios` WHERE Nombre= '$Nombre'";
				$resultado = mysql_query($sql);
				
				 if ( $resultado !== false && mysql_num_rows($resultado) > 0 ) {
					 while($fila = mysql_fetch_assoc ($resultado )){
						 $this -> Resultados = <<< HTML
						 <div class = "Fila">
							<h1>Información del Alumno</h1>
							<h2> Nombre </h2>
							<p><strong> {$fila['Nombre']}</strong></p>
							<h2> Apellidos </h2>
							<p><strong> {$fila['Apellido']}</strong></p>
							<h2> Correo </h2>
							<p><strong> {$fila['Correo']}</strong></p>
							<h2> Teléfono </h2>
							<p><strong> {$fila['Telefono']}</strong></p>
						</div>
						
HTML;
					 }
	 
				}
				
				else if ($_POST)
					$this -> Resultados = "<h1>No existe ese usuario en la base de datos.<h1>";
				
			return $this -> Resultados;
		}
	}
	
	
	class InforAlumno extends Formulario{
		private $SQL;
		public function InforAlumno(){
			$this -> SQL = "SELECT `Nombre`, `Apellido`, `Correo`, `Telefono` FROM `usuarios` WHERE id = -1 ";
			$resultado = mysql_fetch_assoc(mysql_query($this -> SQL));
			$this -> TextoHTML .= <<<HTML
				<h1>Información del Alumno</h1>
				<h2> Nombre </h2>
				<p><strong> {$resultado['Nombre']}</strong></p>
				<h2> Apellidos </h2>
				<p><strong> {$resultado['Apellido']}</strong></p>
				<h2> Correo </h2>
				<p><strong> {$resultado['Correo']}</strong></p>
				<h2> Teléfono </h2>
				<p><strong> {$resultado['Telefono']}</strong></p>
				<a href="{$_SERVER['PHP_SELF']}">Atrás</a>
HTML;
		}
		
		public function ejecutar_BDD(){}
	}
		
	class Factoria {
		public function getformulario() {
			if(!$_GET)
				return new Formulario_out();
			switch ($_GET['formulario_tipo']) {
				case ALUM:
					return new InforAlumno();					
				case IN:
					return new Formulario_in();					

			}  
		}
	}
?>