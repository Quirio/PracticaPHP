<?php
	Class Coneccion{
		var $server;
		var $username;
		var $password;
		var $database;
		Public $con;

		function Coneccion($server,$username,$database){
			$this -> server = $server;
			$this -> username = $username;
			$this -> database = $database;
				
			$this -> con = mysql_connect($server, $username) or die ("Could not connect: " . mysql_error());
			
			mysql_select_db($database,$this->con);
		}
		
		function Close(){
			mysql_close($this -> con);
		}
	}
?>