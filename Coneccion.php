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
			//$this -> password = $password;
			$this -> database = $database;
				
			$this -> con = mysql_connect($server, $username) or die ("Could not connect: " . mysql_error());
			
			mysql_select_db($database,$this->con);
			echo $this -> server;
			echo $this -> username = $username;
			echo $this -> database = $database;
		}
		
		function Close(){
			mysql_close($this -> con);
		}
	}
?>