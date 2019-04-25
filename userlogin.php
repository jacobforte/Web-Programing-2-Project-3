<?php

			 include_once("php/dbconnection.function.php");
			 session_start();
			 

				
				$usernam = $_POST['email'];
				$userpass= $_POST['password'];
				
				$row = dbconnection("spUserLogin('$usernam','$userpass')");
				
				if($row[0] != NULL){
				
					$_SESSION['username'] = $row[0]['UserName'];
					$_SESSION['userpass'] = $row[0]['Password'];\
					header('Location: index.php');
				
				}
				else{
					header('location: login.php');
				}
				
			
?>
