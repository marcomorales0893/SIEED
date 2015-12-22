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
    if ($link)
        $_SESSION['nombre'] = "tec";
    $_SESSION['usuario'] = $_POST['name'];
    $result = mysql_query("SELECT * FROM tec WHERE TEC_U='" . $_SESSION['usuario'] . "'", $link);
    while ($row = mysql_fetch_row($result)) {

        echo "Benvenido: " . $row[2];
        $_SESSION['nombre_tec'] = $row[2];
        $_SESSION['direccion'] = $row[7] . " " . $row[8] . " " . $row[9];
        $_SESSION['email'] = "Email: " . $row[5];
    }
}

?>
</body>
</html>

<?php
header("refresh:2; url=../index1.php");

?>
