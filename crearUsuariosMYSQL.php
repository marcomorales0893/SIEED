<?php
	require_once("pages/conexion.php");
	$conexion = new Conexion();
    $link = $conexion->conexionBd("root","");
    $result = mysql_query("SELECT * FROM usuarios", $link);

     while ($row = mysql_fetch_row($result)) 
         {

            mysql_query("GRANT SELECT,UPDATE,DELETE ON sieed.alum TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON sieed.ent TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON sieed.per_apoyo TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON sieed.alum_has_prenac TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON sieed.tec TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT ON sieed.archivos TO 'visitante'@'localhost' IDENTIFIED BY '';", $link);
            //mysql_query("GRANT SELECT,UPDATE,DELETE ON ALUMNO,ENTRENADOR,PERSONAL_APOYO,ALUMNO_HAS_PRENACIONAL TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);




         }


?>