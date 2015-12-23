<?php
	require_once("pages/conexion.php");
	$conexion = new Conexion();
    $link = $conexion->conexionBd("root","");
    $result = mysql_query("SELECT * FROM delegados", $link);

     while ($row = mysql_fetch_row($result)) 
         {

            /*
             * Cracion de Usuarios tipo Tecnologico

            mysql_query("GRANT SELECT,UPDATE,DELETE ON TABLE sieed.alum TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON TABLE sieed.ent TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON TABLE sieed.per_apoyo TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON TABLE sieed.alum_has_prenac TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT,UPDATE,DELETE ON TABLE sieed.tec TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            mysql_query("GRANT SELECT ON TABLE sieed.archivos TO 'visitante'@'localhost' IDENTIFIED BY '';", $link);

             //Usuario Administrador
             mysql_query("GRANT ALL PRIVILEGES ON TABLE sieed.alum TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
            */

             /*
             * Cracion de Delegados de zona
             */
             mysql_query("GRANT SELECT ON TABLE sieed.* TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);
             mysql_query("GRANT INSERT,UPDATE sieed.del_zona TO '$row[0]'@'localhost' IDENTIFIED BY '$row[1]';", $link);


         }


?>