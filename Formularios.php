<?php

	define("IN",0);
	define("OUT",1);
	define("PRINCIPAL",2);
	
	abstract class Formulario
	{
		abstract public function ejecutar_BDD();
		abstract public function mostrar();
	}
	
	class Formulario_in extends Formulario{
		private $TextoHTML = " ";
		public function Formulario_in (){
			$this -> TextoHTML .= <<<HTML

			<form action="{$_SERVER['PHP_SELF']}" method="post">
    			<label>Nombre:</label><br />
				<input name="Nombre" id="Nombre" type="text"/>
				<label>Apellidos:</label><br />
				<input name="Apellidos" id="Apellidos" type="text"/>
				<label>Teléfono:</label><br />
				<input name="Telefono" id="Telefono" type="tel"/>
				<label>Correo</label><br />
				<input name="Correo" id="Correo" type="tel"/>
				<input type="submit" value="Crear" />
			</form>
    
			<br />
    
			<a href="Info.php">Atrás</a>"
HTML;
		}
		
		public function mostrar(){
			return $this -> TextoHTML;
		}
		
		public function ejecutar_BDD(){
			$sql = "INSERT INTO User VALUES('$Nombre','$Apellidos','$Correo','$Telefono')";
			return mysql_query($sql);
		}
	}
	

	
	class Factoria {
		public function getformulario($tipo) {
			switch (tipo) {
				case IN:
					return new Formulario_in();
				case OUT:
					return "aun no";//return new Circulo(lado);
				case PRINCIPAL:
					return "aun no";//return new Circulo(lado);
			}  
			return null;
		}
	}
?>