<?php
 
	class Conexion {

		public function conexionBd($usuario,$pass){
			 if (!($link=mysql_connect("localhost",$usuario,$pass)))
  				 {  
     				 echo "Usuario o Contrasena Incorrecto.";
					 header("refresh:2; url=../index1.php");
					 exit();
   				}  
   			if (!mysql_select_db("sieed",$link))
   				{  
      				echo "Error seleccionando la base de datos.";  
     				 exit();  
   				}  
   			return $link;
		}




    
	}
?>