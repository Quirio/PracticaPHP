<?php

	define("IN",0);
	define("OUT",1);
	define("PRINCIPAL",2);
	
	abstract class Formulario{
		protected $con;
		protected $TextoHTML;
		abstract public function ejecutar_BDD();
		abstract public function mostrar();
	}
	
	class Formulario_in extends Formulario{
		public function Formulario_in ($con){
			$this -> con = $con;
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
			echo "nombre: ". $Nombre;
			$sql = "INSERT INTO Usuarios (Nombre,Apellido,Correo,Telefono) VALUES('$Nombre','$Apellidos','$Correo','$Telefono')";
			return mysql_query($sql,$this->con);
		}
	}
	
	/*class Principal extends Formulario{
		private $SQL;
		public function Principal(){
			$this -> SQL = "";
			$this -> TextoHTML .= <<<HTML
			
HTML;
		}
	}*/
		
	class Factoria {
		public function getformulario($tipo,$con) {
			switch (tipo) {
				case IN:
					return new Formulario_in($con);
				case OUT:
					return "aun no";
				case PRINCIPAL:
					return "aun no";
			}  
			return null;
		}
	}
?>