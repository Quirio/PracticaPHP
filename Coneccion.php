<?php
	Class Coneccion{
		var $server;
		var $username;
		var $password;
		var $database;
		
		function Coneccion($server,$username, $password,$database){
			$this -> $server = $server;
			$this -> $username = $username;
			$this -> $password = $password;
			$this -> $database = $database;
				
			$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
			mysql_select_db($database, $con);
		}
	}
?>