<?php
session_start();
session_unset();
session_destroy();

 echo "Cerrando Sesion..";		
 header( "refresh:2; url=../index1.php" ); 

?>