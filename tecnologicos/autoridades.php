<?php
session_start();
echo $_SESSION['nombre'];
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
     
    Bienvenido Invitado(a)  <a href="#comments">&nbsp;&nbsp;&nbsp;&nbsp;Iniciar Sesión</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
     <?php
      include_once("../pages/menu.php");
      $menu = new Menu();
      $direccion ="../pdfs/";
      $menu->usuarioVisitante($direccion);
      $menu->verificaUsuario();

      ?>
     
    </div>
    
    <div class="content three_quarter"> 
    <ul class="nospace group">

          <li class="btmspace-50">
            <article class="service largeicon"><i class="icon nobg circle fa fa-users"></i>
              <h6 class="heading"><a href="#">Autoridades del Instituto Tecnológico de Pachuca</a></h6>
              
              <div id="comments"> 
                <form action="#" method="post">
            
                  <label for="resp_registro"><h1>Responsable del registro</h1></label>
                  <input type="text" name="resp_registro" id="resp_registro" value="ING. JUAN IGNACIO ORTIZ ALTAMIRANO" size="15">
                  <div class="one_half first">
	                  <label for="resp_registro_correo">Correo Electrónico</label>
	                  <input type="email" name="resp_registro_correo" id="resp_registro_correo" value="correo@hotmail.com" size="15">
	                  
                  </div>
                  <div class="one_half ">
	                  <label for="resp_registro_tel">Correo Electrónico</label>
	                  <input type="email" name="resp_registro_tel" id="resp_registro_tel" value="7634532155" size="15">
                  </div>

                  <label for="director"><h1>Director</h1></label>
                  <input type="text" name="director" id="director" value="M.C. GLORIA EDITH PALACIOS ALMON" size="22">
                  <div class="one_half first">
	                  <label for="director_correo">Correo Electrónico</label>
	                  <input type="email" name="director_correo" id="director_correo" value="correo@hotmail.com" size="15">
	                  
                  </div>
                  <div class="one_half ">
	                  <label for="director_tel">Correo Electrónico</label>
	                  <input type="email" name="director_tel" id="director_tel" value="7634532155" size="15">
                  </div>


                  <label for="Jefe_control_escolar"><h1>Jefe de Control Escola</h1></label>
                  <input type="text" name="Jefe_control_escolar" id="Jefe_control_escolar" value="LIC. LETICIA ESPERANZA HERNANDEZ SAMPERIO" size="22">
                  <div class="one_half first">
	                  <label for="Jefe_control_escolar_correo">Correo Electrónico</label>
	                  <input type="email" name="Jefe_control_escolar_correo" id="resp_registro_correo" value="correo@hotmail.com" size="15">
	                  
                  </div>
                  <div class="one_half ">
	                  <label for="Jefe_control_escolar_tel">Correo Electrónico</label>
	                  <input type="email" name="Jefe_control_escolar_tel" id="Jefe_control_escolar_tel" value="7634532155" size="15">
                  </div>

                  <label for="jefe_actividades_extraescolares"><h1>Jefe de Actividades extraescolares</h1></label>
                  <input type="text" name="jefe_actividades_extraescolares" id="jefe_actividades_extraescolares" value="ING. JORGE JAVIER ORTIZ CAMACHO" size="22">
                  <div class="one_half first">
	                  <label for="jefe_actividades_extraescolares_correo">Correo Electrónico</label>
	                  <input type="email" name="jefe_actividades_extraescolares_correo" id="jefe_actividades_extraescolares_correo" value="correo@hotmail.com" size="15">
	                  
                  </div>
                  <div class="one_half ">
	                  <label for="Jefe_control_escolar_tel">Correo Electrónico</label>
	                  <input type="email" name="jefe_actividades_extraescolares_tel" id="jefe_actividades_extraescolares_tel" value="7634532155" size="15">
                  </div>

                  <label for="coord_deportivo"><h1>Coordinador deportivo</h1></label>
                  <input type="text" name="coord_deportivo" id="coord_deportivo" value="ING. JUAN IGNACIO ORTIZ ALTAMIRANO" size="22">
                  <div class="one_half first">
	                  <label for="coord_deportivo_correo">Correo Electrónico</label>
	                  <input type="email" name="coord_deportivo_correo" id="coord_deportivo_correo" value="correo@hotmail.com" size="15">
	                  
                  </div>
                  <div class="one_half ">
	                  <label for="Jefe_control_escolar_tel">Correo Electrónico</label>
	                  <input type="email" name="coord_deportivo_tel" id="coord_deportivo_tel" value="7634532155" size="15">
                  </div>

                  <br>
                 
                  <input name="submit" type="submit" value="Actualizar">
                  
                  
                </form>
              </div>

            </article>
          </li>

        </ul>
     
    
        
    </div>
    
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
<script src="../layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>