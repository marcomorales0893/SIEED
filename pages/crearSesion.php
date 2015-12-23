<?php
error_reporting(E_ERROR);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio Sesion</title>
</head>
<body>
<?php
require("conexion.php");
$conexion = new Conexion();
if (isset($_POST['name']) && $_POST['name']) {

    $link = $conexion->conexionBd($_POST['name'], $_POST['pass']);
    mysql_query("SET NAMES 'utf8'");
    if ($link) {
        $result = mysql_query("SELECT * FROM tec", $link);
        while ($row = (mysql_fetch_row($result))) {
            if ($_POST['name'] == $row[1]) {
                $_SESSION['nombre'] = "tec";
                $_SESSION['usuario'] = $_POST['name'];
                $result2 = mysql_query("SELECT * FROM tec WHERE TEC_U='" . $_SESSION['usuario'] . "'", $link);
                while ($row = mysql_fetch_row($result2)) {
                    echo "Benvenido: " . $row[2];
                    $_SESSION['nombre_tec'] = $row[2];
                    $_SESSION['direccion'] = $row[7] . " " . $row[8] . " " . $row[9];
                    $_SESSION['email'] = "Email: " . $row[5];
                }
            }
        }

        $result = mysql_query("SELECT * FROM admin", $link);
        while ($row = (mysql_fetch_row($result))) {
            if ($_POST['name'] == $row[0]) {
                $_SESSION['nombre'] = "admin";
                $_SESSION['nomnbre_admin'] = $row[2];
                $_SESSION['email']="Email: ".$row[3];
                echo "Bienvenido: " . $_SESSION['nombre'];

            }
        }

        $result = mysql_query("SELECT * FROM del_zona", $link);
        while ($row = (mysql_fetch_row($result))) {
            if ($_POST['name'] == $row[1]) {
                $_SESSION['nombre'] = "delegado";
                $_SESSION['usuario'] = $_POST['name'];
                $result2 = mysql_query("SELECT * FROM del_zona WHERE del_u='" . $_SESSION['usuario'] . "'", $link);
                while ($row = mysql_fetch_row($result2)) {
                    echo "Benvenido: " . $row[2]." ".$_SESSION['nombre'];
                    $_SESSION['nombre_del'] = $row[2]." ".$row[3];
                    $_SESSION['email'] = "Email: " . $row[5];
                    $_SESSION['tel'] = $row[6];

                }
            }
        }


    }


}

?>
</body>
</html>

<?php
header("refresh:2; url=../index1.php");

?>
