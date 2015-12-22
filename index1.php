<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>SIEED</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="layout/styles/fonts/deportes/flaticon.css">
    <script type="text/javascript">
        function olvidopass() {
            var person = prompt("Ingresa el email vinculado con la cuenta del tecnoógico, se te enviará la contraseña", "");

        }
        ;
    </script>
</head>
<body id="top">

<!-- ################################################################################################ -->
<!--Menu-->
<div class="wrapper row1">
    <img src="images/banner.png">
    <header id="header" class="clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="fl_left">
            <h1><a href="#index.html">SIEED</a></h1>
        </div>
        <!-- ################################################################################################ -->
        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li class="active"><a href="index.html">Inicio</a></li>
                <li><a href="#">Arte & Cultura</a></li>
                <li><a href="#">Deportes</a></li>

                <li><a href="#">Bandas de Guerra</a></li>
                <li><a href="#footer">Contacto</a></li>
            </ul>
        </nav>

    </header>
</div>
<!--Mapa de navegacion-->
<div class="wrapper row2">
    <div id="breadcrumb" class="clear">
        <!-- ################################################################################################ -->
        <ul>
            Bienvenido
            <?php
            if (!empty($_SESSION['nombre'])) {
                echo $_SESSION["nombre"];
                echo "<a href='pages/cerrarSesion.php'>&nbsp;&nbsp;&nbsp;&nbsp;Cerrar Sesión</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            } else {
                echo "Invitado(a) <a href='#comments'>&nbsp;&nbsp;&nbsp;&nbsp;Iniciar Sesión</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            }

            ?>

            <li><a href="#">Inicio</a></li>
            <li><a href="#">Eventos Deportivos</a></li>
        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>

<!--Slider-->
<div class="flexslider basicslider">
    <ul class="slides">
        <li><img src="images/demo/slides/01.png" alt="">

            <div class="txtoverlay">
                <div class="centralise">
                    <div class="verticalwrap">
                        <article>
                            <h2 class="heading ">Listado de Natacion para el LIX Evento Nacional Deportivo</h2>

                            <p><a class="btn orange pushright" href="#">Ver</a></p>
                        </article>
                    </div>
                </div>
            </div>
        </li>
        <li><img src="images/demo/slides/02.png" alt="">

            <div class="txtoverlay">
                <div class="centralise">
                    <div class="verticalwrap">
                        <article>
                            <h2 class="heading">Listado de Atletismo pra el LIX Evento Nacional Deportivo</h2>

                            <p><a class="btn red" href="#">Ver</a></p>
                        </article>
                    </div>
                </div>
            </div>
        </li>
        <li><img src="images/demo/slides/03.png" alt="">

            <div class="txtoverlay">
                <div class="centralise">
                    <div class="verticalwrap">
                        <article>
                            <h2 class="heading">Oficio Circular 004 Aportacion LIX END </h2>

                            <p><a class="btn green" href="#">Ver</a></p>

                        </article>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

</div>
</div>
<!-- Cuerpo de la página-->

<div class="wrapper row3">
    <main class="container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="sidebar one_quarter first">
            <?php
            include_once("pages/menu.php");
            $menu = new Menu();
            $direccion = "pdfs/";
            $menu->usuarioVisitante($direccion);
            $menu->verificaUsuario();

            ?>


        </div>

        <div class="content two_quarter">

            <ul class="nospace group">

                <li class="btmspace-50">
                    <article class="service largeicon"><i class="icon nobg circle fa fa-check-circle-o"></i>
                        <h6 class="heading"><a href="#">SIEED</a></h6>

                        <p>Sistema de Inscripción Electrónica para los Eventos Deportivos </p>
                    </article>
                </li>

                <li class="btmspace-50">
                    <article class="service largeicon"><i class="icon nobg circle fa fa-futbol-o"></i>
                        <h6 class="heading"><a href="#">Dirección de Promoción Culturar y Deportiva </a></h6>

                        <p>Una subdirección de Tecnológicos de México, Encargados de la realización de los eventos
                            deportivos.</p>
                    </article>
                </li>
                <li>
                    <article class="service largeicon"><i class="icon nobg circle fa fa-user-plus"></i>
                        <h6 class="heading"><a href="#">Registro de alumnos para eventos deportivos</a></h6>

                        <p>Aquí podrás registrar a los estudiantes de tu escuela</p>
                    </article>
                </li>
            </ul>


        </div>
        <div class='one_quarter'>
            <?php
            include_once("pages/conexion.php");
            $conexion = new Conexion();
            if (!empty($_SESSION["nombre"])) {
                if ($_SESSION["nombre"] == "tec") {
                    echo "
                  <h1>".$_SESSION['nombre_tec']."</h1>
                  <img class='imgr borderedbox inspace-5' src='images/SIEED.png' alt='' >
                  <p>".$_SESSION['direccion']."</p>
                  <p>".$_SESSION['email']."</p>
                  </div> 
                   <div id='comments'>
                  <form method='post' action='pages/cerrarSesion.php'> 
                  <input name='submit' type='submit' value='Cerrar'>
                  </form>
                  </div>";

                } else {
                    if ($_SESSION["nombre"] == "admin") {

                        echo "
                  <h1>Enrique (administrador)</h1>
                  <img class='imgr borderedbox inspace-5' src='images/enrique.gif' alt='' >
                  <p>Carretera Mexico Pachuca KM 87.5. CP: 42080 Col Venta Prieta, Pachuca Hidalgo</p>
                  <p>Email: admin@edu.com</p>
                  </div>

                  <div id='comments'>
                  <form action='" . $conexion->cerrarSesion() . "' method='post'>
                  <input name='submit' type='submit' value='Cerrar' action=''>
                  </form>
                  </div>";
                    }
                }
            } else {
                echo "
                <div id='comments'>
                <h6>Inicio de Sesión</h6>
                <form action='pages/crearSesion.php' method='post'> 
                <label for='name'>Nombre<span>*</span></label> 
                <input type='text' name='name' id='name' value='' size='22'>
                <label for='pass'>Contraseña<span>*</span></label>
                <input type='password' name='pass' id='pass' value='' size='22'>
                <a href='#' onclick='olvidopass()'>¿Olvidaste tu contraseña?</a><br>
                <!--<a href='#'>Registrate Ahora</a><br>-->
                <input name='submit' type='submit' value='Entrar'>
                &nbsp;
                <input name='reset' type='reset' value='Limpiar'>

                <br><br><br> 
                </form>
                </div> ";
            }

            ?>


            <!-- / main body -->
            <div class="clear"></div>
    </main>


    <!--Pie de pagina-->

    <div class="wrapper row4">
        <footer id="footer" class="clear">
            <!-- ################################################################################################ -->
            <div class="one_third first">
                <h6 class="title">Dirección del Tecnológico Nacional de Mexico</h6>
                <address class="btmspace-15">
                    Arcos de Belén # 79, Colonia Centro, Delegación Cuauhtémoc<br> C.P. 06010, México, D.F.<br>
                    Fray Servando Teresa de Mier Núm. 127, Colonia Centro, Delegación Cuauhtémoc, <br>C.P. 06080,
                    México, D.F.<br>
                </address>
                <ul class="nospace">
                    <li class="btmspace-10"><span class="fa fa-phone"></span> +00 (123) 456 7890</li>
                    <li><span class="fa fa-envelope-o"></span> deporte@hotmail.com</li>
                </ul>
            </div>
            <div class="one_third ">
                <h6 class="title">Mapa del Sitio</h6>
                <ul class="nospace linklist">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Arte y Cultura</a></li>
                    <li><a href="#">Deportes</a></li>
                    <li><a href="#">Bandas de Guerra</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <!--<div class="one_third">
              <h6 class="title">From The Blog</h6>
              <article>
                <h2 class="nospace"><a href="#">Lorem ipsum dolor</a></h2>
                <time class="smallfont" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
                <p>Vestibulumaccumsan egestibulum eu justo convallis augue estas aenean elit intesque sed.</p>
              </article>
            </div>-->
            <div class="one_third">
                <h6 class="title">Recibe avisos en tu correo</h6>

                <form class="btmspace-30" method="post" action="#">
                    <fieldset>
                        <legend>Newsletter:</legend>
                        <input class="btmspace-15" type="email" value="" placeholder="Email">
                        <button type="submit" value="submit">Enviar</button>
                    </fieldset>
                    <br><br>
                    <h6 class="title">Siguenos en redes sociales</h6>
                </form>
                <ul class="faico clear">
                    <li><a class="faicon-facebook"
                           href="https://www.facebook.com/pages/Tecnol%C3%B3gico-Nacional-De-M%C3%A9xico/732984606793906?fref=ts"
                           target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="faicon-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a class="faicon-tumblr" href="#"><i class="fa fa-tumblr"></i></a></li>
                </ul>
            </div>
            <!-- ################################################################################################ -->
        </footer>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row5">
        <div id="copyright" class="clear">
            <!-- ################################################################################################ -->
            <p class="fl_left">Copyright TecNM - ALGUNOS DERECHOS RESERVADOS © 2015<a href="#">SIEED.com.mx</a></p>

            <p class="fl_right">Desarrollado por:<a target="_blank" href="http://www.itpachuca.com/"
                                                    title="Instituto tecnológico de pachuca">ITP</a></p>
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
    <script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>