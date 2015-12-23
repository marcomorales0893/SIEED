<?php
  session_start();
  if(!$_SESSION['name']=="admin"){
    header('Location: ../index1.php');


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
            <article class="service largeicon"><i class="icon nobg circle fa fa-bullhorn"></i>
              <h6 class="heading"><a href="#">Avisos del Banner</a></h6>
              <p>Aqui puede escribir algún aviso en el Banner de la página Principal </p><br>
              <div id="comments">

              <form name="avisos_banner" action="#" method="POST">
                <!--Aqui irian los avisos. Un ciclo que saque todos los avisos de la DB-->
                <label for="aviso1">Aviso 1</label>
                <input type="text" name="aviso1" id="aviso1" value="Oficio No 004 Curricular" size="50">
                 <button value="eliminar" onclick="#">Eliminar</button>

                <label for="aviso2">Aviso 2</label>
                <input type="text" name="aviso2" id="aviso2" value="Listado Nacional para los eventos deportivos" size="50">
                <button value="eliminar" onclick="#">Eliminar</button>

                <br><br>

                <!--botones-->
                <button value="Nuevo aviso">Agregar otro aviso</button>
                <input  type="submit" value="Guardar avisos" > 
                <input name="reset" type="reset" value="Limpiar casillas">

              </form>
               </div>
            </article>
          </li>

          <li class="btmspace-50">
            <article class="service largeicon"><i class="icon nobg circle fa fa-file-pdf-o"></i>
              <h6 class="heading"><a href="#">Archivos Compartidos</a></h6>
              <p>Los archivos que se suben para el menú principal se suben aqui (Sólo Tipos PDF)</p><BR>
              
              <div id="comments">
              <form name="pdfs" action="" method="GET" enctype="multipart/form-data">
                <!--Aqui irian los archivos. Un ciclo que saque todos los avisos de la DB-->
                <label for="pdf1">Archivo 1</label>
                <input type="text" name="archivo" id="archivo1" value="Lineamientos generales" size="50">
                <input type="file" name="archivo" accept="application/pdf">
                <button value="eliminar" onclick="#">Eliminar</button>

                <label for="pdf2">Archivo 2</label>
                <input type="text" name="archivo2" id="archivo2" value="Procedimiento de inscripcion" size="50">
                <input type="file" name="archivo2" accept=".pdf">
                <button value="eliminar" onclick="#">Eliminar</button>

                <label for="pdf3">Archivo 3</label>
                <input type="text" name="archivo3" id="archivo3" value="Zonas deportivas del SNEST 2015" size="50">
                <input type="file" name="archivo3" accept=".pdf">
                <button value="eliminar" onclick="#">Eliminar</button>

                <label for="pdf4">Archivo 4</label>
                <input type="text" name="archivo4" id="archivo4" value="Reglamento Deportivo" size="50">
                <input type="file" name="archivo4" accept=".pdf">
                <button value="eliminar" onclick="#">Eliminar</button>
                
                <label for="pdf5">Archivo 5</label>
                <input type="text" name="archivo5" id="archivo5" value="Calendario Prenacionales 2015" size="50">
                <input type="file" name="archivo5" accept=".pdf">
                <button value="eliminar" onclick="#">Eliminar</button>

                <label for="pdf6">Archivo 6</label>
                <input type="text" name="archivo6" id="archivo6" value="Circular M00.3/004/2015" size="50">
                <input type="file" name="archivo6" accept=".pdf">
                <button value="eliminar" onclick="#">Eliminar</button>

                <br><br>

                <!--botones-->
                <button value="Nuevo aviso" onclick="#">Agregar otro documento</button>
                <input  type="submit" value="Guardar" onclick = "this.form.action = 'file.php'; this.form.submit()">
              </form>
              </div>

            </article>
          </li>
          <li>
            <article class="service largeicon"><i class="icon nobg circle fa fa-calendar"></i>
              <h6 class="heading"><a href="#">Fechas Límite</a></h6>
              <p>Dentro de las fechas que escoja, el sistema estará abierto a inscripciones</p>
              <p>Limite actual: 15 de Febrero del 2016 - 30 de Abril del 2016</p><bR>
              <div id="comments">
              <form name="fechas" action="#" method="post">

              <div class="content one_half first">
              <label for "fecha_inicio">Fecha Inicio</label>
              <input type="date" name="fecha_inicio">
               </div>

              <div class="content one_half">
                <label for="fecha_termino">Fecha Término</label>
              <input type="date" name="fecha_termino">
              </div>
              
              
              <label >Aplicar a</label>
                    <!--La funcion desaparecer tabla no borra los checkboxes marcados. Atender ese aspecto 
                    //(si "todos los tecnologicos" esta marcado, no considerar ningun checkbox)-->
              <input id="radio1" onchange="desaparecer_tabla()" type="radio" name="radio" value="1" checked="checked" ><label for="radio1"><span><span></span></span>Todos los tecnológicos</label>
              <input id="radio2"  onchange="aparecer_tabla()"  type="radio" name="radio" value="2"  ><label for="radio2" ><span><span></span></span>Tecnológicos en Específico</label>
              <br><br>

              <div class="scrollable">
                <table id="ocultar" style="display:none">
                  <thead title="Lista de tecnologicos">
                    <tr>
                      <th>Institucion</th>
                      <th>Limite Inicial <br>actual</th>
                      <th>Limite Final <br>actual</th>
                      <th>¿Aplicar?</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Instituto Tecnologico de Pachuca</a></td>
                      <td>15/02/2016</td>
                      <td>30/4/2016</td>
                      <td><input type="checkbox" id="c1"  name="lista_tecnologicos" value="Instituto Tecnologico de Pachuca"><label for="c1"><span></span></label></td>
                    </tr>
                    <tr>
                      <td>Instituto Tecnologico de Celaya</a></td>
                      <td>15/02/2016</td>
                      <td>30/4/2016</td>
                      <td ><input type="checkbox" id="c2"  name="lista_tecnologicos" value="Instituto Tecnologico de Celaya"><label for="c2"><span></span></label></td>
                    </tr>
                    <tr>
                      <td>Instituto Tecnologico de Leon</a></td>
                      <td>15/02/2016</td>
                      <td>30/4/2016</td>
                      <td ><input type="checkbox" id="c3"  name="lista_tecnologicos" value="Instituto Tecnologico de Leon"><label for="c3"><span></span></label></td>
                    </tr>
                    <tr>
                      <td>Instituto Tecnologico de Chihuahua</a></td>
                      <td>15/02/2016</td>
                      <td>30/4/2016</td>
                      <td ><input type="checkbox" id="c4"  name="lista_tecnologicos" value="Instituto Tecnologico de Chihuahua"><label for="c4"><span></span></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <input type="submit" value="Guardar Fechas">

              </form>
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
<script>
function aparecer_tabla() {
    if(document.getElementById("radio2").checked){
      //document.getElementById("ocultar").innerHTML = "Advertencia: Todos los tecnologicos seleccionados";
      //document.getElementById("ocultar").removeAttribute("style")
       document.getElementById("ocultar").removeAttribute("style");
    }
}
function desaparecer_tabla() {
    if(document.getElementById("radio1").checked){
      //La funcion desaparecer tabla no borra los checkboxes marcados. Atender ese aspecto 
      //(si "todos los tecnologicos" esta marcado, no considerar ningun checkbox)
       document.getElementById("ocultar").setAttribute("style","display:none");
    }
}

</script>

<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<script src="../layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>