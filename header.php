<?php 
            session_start();
            ob_start();
            $username = "root";
			$password = "";
			$database = "bus_management_system";
			$mysqli = new mysqli("localhost", $username, $password, $database);          
?>
