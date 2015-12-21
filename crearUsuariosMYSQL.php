<?php
	require_once("pages/conexion.php");
	$conexion = new Conexion();
    $link = $conexion->conexionBd();
    $result = mysql_query("SELECT * FROM usuarios", $link);

     while ($row = mysql_fetch_row($result)) 
         {
            mysql_query("GRANT SELECT,UPDATE,DELETE ON alum TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON ent TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON per_apoyo TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON alum_has_prenac TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON tec TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT ON archivos TO 'visitante'@'localhost' IDENTIFIED BY '';", $link);
            //mysql_query("GRANT SELECT,UPDATE,DELETE ON ALUMNO,ENTRENADOR,PERSONAL_APOYO,ALUMNO_HAS_PRENACIONAL TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
         }


?>