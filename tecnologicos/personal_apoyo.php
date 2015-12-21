<?php
if (isset($_POST["name"])) 
{
    if (isset($_POST["pass"]))
    {
    $usuario = $_POST['name'];
    $pass = $_POST['pass'];
        if($usuario=="tec" && $pass=="tec")
        {
         $_SESSION["nombre_usuario"] = $usuario;   
        }
        if($usuario=="admin" && $pass=="admin")
        {
         $_SESSION["nombre_usuario"] = $usuario;   
        }
    
    }
}
        

    
    
?>
<!DOCTYPE html>
<html>
<head>
<title>SIEED</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="../layout/styles/fonts/deportes/flaticon.css"> 
</head>
<body id="top">
<!-- ################################################################################################ -->

<!--Menu-->
<div class="wrapper row1">
<img src="../images/banner.png" >
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
        if (!empty($_SESSION["nombre_usuario"])) 
        {
            echo $_SESSION["nombre_usuario"];
            echo "<a href='#comments'>&nbsp;&nbsp;&nbsp;&nbsp;Cerrar Sesión</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }else {
          echo "Invitado(a) <a href='#comments'>&nbsp;&nbsp;&nbsp;&nbsp;Iniciar Sesión</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        
        ?>  
        
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Eventos Deportivos</a></li>
 </ul>
    <!-- ################################################################################################ -->
  </div>
</div>


<!-- Cuerpo de la página-->

<div class="wrapper row3">
  <main class="container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sidebar one_quarter first"> 
      <!-- ################################################################################################ -->
      <h6>Menú Principal</h6>
      <nav class="sdb_holder">
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Lineamientos Generales</a> </li>
          <li><a href="#">Procedimiento de inscripción</a> </li>
          <li><a href="#">Zonas deportivas del SNEST 2015</a> </li>
          <li><a href="#">Reglamento Deportivo</a> </li>
          <li><a href="#">Calendario Prenacionales 2015</a> </li>
          <li><a href="#">Circular M00.3/004/2015</a> </li>
          <li><a href="#">Dudas o Comentarios</a> </li>
          <li><a href="#">Descarga de documentos</a></li>
          <li><a href="#">Salir</a></li>
        </ul>
      </nav>

      
        <?php
            if (!empty($_SESSION["nombre_usuario"])) 
                {
                if($_SESSION["nombre_usuario"]=="tec")
                {
                    echo "
                    <h6>Registro</h6>
                    <nav class='sdb_holder'>
                    <ul>
                    <li><a href='#'>Autoridades</a></li>
                    <li><a href='#'>Disciplinas</a> </li>
                    <li><a href='#'>Registrar alumnos</a> </li>
                    <li><a href='#'>Impresión de Tarjetones</a> </li>
                    <li><a href='#'>Impresión de Credenciales</a> </li>
                    <li><a href='#'>Impresión de Cédula</a> </li>
                    <li><a href='#'>Registrar personal de Apoyo</a> </li>
                    </ul>
                    </nav>";
                }
                if($_SESSION["nombre_usuario"]=="admin")
                {
                    
                    
                    echo "    
                    <!--Menu extra de administracion (superusuario)-->
                    <h6>Administracion</h6>
                    <nav class='sdb_holder'>
                    <ul>
                    <li><a href='#'>Administración del sistema</a></li>
                    <li><a href='#'>Mostrar Cuenta</a> </li>
                    <li><a href='#'>Editar Cuenta</a> </li>
                    <li><a href='#'>Notificaciones</a> </li>
                    <li><a href='#'>Bandeja de entrada</a> </li>
                    <li><a href='#'>Impresión de Cédula</a> </li>
                    <li><a href='#'>Desconectarse</a> </li>
                    </ul>
                    </nav>";
                }
                }
        
        ?>

     
    </div>
    <div class="content three_quarter">
    
    <ul class="nospace group">

          <li class="btmspace-50">
            <article class="service largeicon"><i class="icon nobg circle fa fa-hand-o-up"></i>
              <h6 class="heading"><a href="#"><strong>Personal de apoyo del Tecnológico de Pachuca</strong></a></h6>
              <h1>Tabla de personal</h1>
              <div class="scrollable">
                <table>
                  <thead>
                    <tr>
                      <th>Personal de apoyo</th>
                      <th>Limite</th>
                      <th>Personal registrado</th>
                      <th>Registrar personal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a>Cordinador deportivo</a></td>
                      <td>Value 2</td>
                      <td>Value 3</td>
                      <td align="Center"><a href="personal_apoyo_2.php" ><i class="fa fa-3x fa-pencil-square-o" ></a></i></td>
                    </tr>
                    <tr>
                      <td><a>Entrenadores</a></td>
                      <td>Value 2</td>
                      <td>Value 3</td>
                      <td align="Center"><a href="personal_apoyo_2.php" ><i class="fa fa-3x fa-pencil-square-o" ></a></i></td>
                    </tr>
                    <tr>
                      <td><a>Médicos</a></td>
                      <td>Value 2</td>
                      <td>Value 3</td>
                      <td align="Center"><a href="personal_apoyo_2.php" ><i class="fa fa-3x fa-pencil-square-o" ></a></i></td>
                    </tr>
                    <tr>
                      <td><a>Conductores</a></td>
                      <td>Value 2</td>
                      <td>Value 3</td>
                      <td align="Center"><a href="personal_apoyo_2.php" ><i class="fa fa-3x fa-pencil-square-o" ></a></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </article>
          </li>

        </ul>
   
    
        
    </div>

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
Fray Servando Teresa de Mier Núm. 127, Colonia Centro, Delegación Cuauhtémoc, <br>C.P. 06080, México, D.F.<br>
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
        </fieldset><br><br>
        <h6 class="title">Siguenos en redes sociales</h6>
      </form>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://www.facebook.com/pages/Tecnol%C3%B3gico-Nacional-De-M%C3%A9xico/732984606793906?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
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
    <p class="fl_right">Desarrollado por:<a target="_blank" href="http://www.itpachuca.com/" title="Instituto tecnológico de pachuca">ITP</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS -->


<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>

</body>
</html>