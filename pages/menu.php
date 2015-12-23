<?php
if (!isset($_SESSION)) {
    session_start();
}

class Menu
{
    public function usuarioVisitante($ruta)
    {

        require("conexion.php");
        $conexion = new Conexion();
        $link = $conexion->conexionBd("visitante","");
        $result = mysql_query("SELECT * FROM archivos", $link);
        //se despliega el resultado
        echo "<h6>Menú Principal</h6>
             <nav class='sdb_holder'>
            <ul>";
        while ($row = mysql_fetch_row($result)) {
            echo "<li> <a href='" . $ruta . "$row[2]' target='_BLANCk'> $row[1] </a></li>";
        }

        echo "</ul>
            </nav>";


    }


    public function usuarioTec()
    {

        echo "
                    <h6>Registro</h6>
                    <nav class='sdb_holder'>
                    <ul>
                    <li><a href='tecnologicos/autoridades.php'>Autoridades</a></li>
                    <li><a href='#'>Disciplinas</a> </li>
                    <li><a href='#'>Registrar alumnos</a> </li>
                    <li><a href='#'>Impresión de Tarjetones</a> </li>
                    <li><a href='#'>Impresión de Credenciales</a> </li>
                    <li><a href='#'>Impresión de Cédula</a> </li>
                    <li><a href='#'>Registrar personal de Apoyo</a> </li>
                    </ul>
                    </nav>";
    }

    public function usuarioAdmin()
    {

        // $this->usuarioTec();
        echo "
                    <!--Menu extra de administracion (superusuario)-->
                    <h6>Administracion</h6>
                    <nav class='sdb_holder'>
                    <ul>
                    <li><a href='../administracion/administracion_sistema.php'>Administración del sistema</a></li>
                    <li><a href='#'>Mostrar Cuenta</a> </li>
                    <li><a href='#'>Editar Cuenta</a> </li>
                    <li><a href='#'>Notificaciones</a> </li>
                    <li><a href='#'>Bandeja de entrada</a> </li>
                    <li><a href='#'>Impresión de Cédula</a> </li>
                    <li><a href='#'>Desconectarse</a> </li>
                    </ul>
                    </nav>";

    }

    public function verificaUsuario()
    {

        if (!empty($_SESSION["nombre"])) {
            $usuario = $_SESSION["nombre"];
            switch ($usuario) {
                case "tec":
                    $this->usuarioTec();
                    break;
                case "admin":
                    $this->usuarioAdmin();
                    break;
                case "delegado":
                    $this->usuarioDelegado();
                    break;
                case "coordinador":
                    $this->usuarioCoordinador();
                    break;

            }


        }
    }

    public function usuarioDelegado()
    {

        // $this->usuarioTec();
        echo "
                    <!--Menu extra de delegado -->
                    <h6>Delegado</h6>
                    <nav class='sdb_holder'>
                    <ul>
                    <li><a href='#'>Consulta por tecnológico</a></li>
                    <li><a href='#'>Consulta por deporte</a> </li>
                    <li><a href='#'>Consulta de sanciones</a> </li>
                    <li><a href='#'>Notificaciones</a> </li>
                    <li><a href='#'>Perfil</a> </li>

                    </ul>
                    </nav>";

    }
    public function usuarioCoordinador()
    {

        // $this->usuarioTec();
        echo "
                    <!--Menu extra de Coordinador -->
                    <h6>Coordinador</h6>
                    <nav class='sdb_holder'>
                    <ul>
                    <li><a href='#'>Consulta por tecnológico</a></li>
                    <li><a href='#'>Consulta por zona</a> </li>
                    <li><a href='#'>Consulta de sanciones</a> </li>
                    <li><a href='#'>Perfil</a> </li>

                    </ul>
                    </nav>";

    }


    public function descargaDocs()
    {
        require("conexion.php");
        $conexion = new Conexion();
        $link = $conexion->conexionBd();
        $result = mysql_query("SELECT * FROM links", $link);
        while ($row = mysql_fetch_row($result)) {
            header("Content-disposition: attachment; filename=$row[2]");
            header("Content-type: application/pdf");
        }

        //readfile("lineamientos.pdf");
    }

}

//$menu = new Menu();
//$menu->descargaDocs();
?>