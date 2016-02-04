<?php
	Class Coneccion{
		var $server;
		var $username;
		var $password;
		var $database;
		Public $con;
		
<<<<<<< HEAD
		function Coneccion($server,$username,$database){
			$this -> server = $server;
			$this -> username = $username;
			//$this -> password = $password;
			$this -> database = $database;
				
			$this -> con = mysql_connect($server, $username) or die ("Could not connect: " . mysql_error());
			
			mysql_select_db($database);
		}
		
		function Close(){
			mysql_close($this -> con);
=======
		function Coneccion($server,$username, $password,$database){
			$this -> server = $server;
			$this -> username = $username;
			$this -> password = $password;
			$this -> database = $database;
				
			$this -> con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
			
			mysql_select_db($database, $this -> con);
			
			$sql = "INSERT INTO Usuarios (Nombre,Apellido,Correo,Telefono) VALUES('Alejandro','Hernandez','al@gmail.com','698547')";
			mysql_query($sql,$this->con);
>>>>>>> origin/master
		}
	}
?>