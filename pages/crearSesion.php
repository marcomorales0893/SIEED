<?php
error_reporting(E_ERROR);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Inicio Sesion</title>
</head>
<body>
<?php
    require("conexion.php");
    $conexion = new Conexion();

        if (isset($_POST['name']) && $_POST['name']) {
            $link = $conexion->conexionBd($_POST['name'],$_POST['pass']);
            if($link)
                $_SESSION['nombre'] = "tec";
                $_SESSION['usuario'] = $_POST['name'];
             $result = mysql_query("SELECT * FROM tec WHERE TEC_U='".$_SESSION['usuario']."'", $link);
            while ($row = mysql_fetch_row($result)) {
                echo $row[2];
            }
        }

    //echo "Bienvenido! Has iniciado sesion: " . $_POST['name'];



?>
</body>
</html>

<?php
header("refresh:2; url=../index1.php");

?>
