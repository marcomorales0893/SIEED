<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  //tamaño de la imagen final (osea la que irá en el tarjeton)
  $targ_w = 166;
    $targ_h = 250;
  $jpeg_quality = 80;

  //jalando la ruta de la imagen a recortar
  $src = $_POST['ruta'];
  //obteniendo su informacion
    $imageninfo=getimagesize($src);
  

  //determinando el tamaño de la imagen, como el template de la pagina web no 
  //soporta imagenes mayores a 630 px de ancho, se deforma el recorte. 

  if($imageninfo[0]>630){
    //si es mayor, se obtiene una proporcion del grueso real comparado con los 630px
    $proporcion=$imageninfo[0]/630;
    //se multiplica toda dimension obtenida de la info del recorte por dicha proporcion
    $xreal=$_POST['x']*$proporcion;
    $yreal=$_POST['y']*$proporcion;
    $wreal=$_POST['w']*$proporcion;
    $hreal=$_POST['h']*$proporcion;
  }else{
    //si el tamaño es menor, se pasan tal y como son
    $xreal=$_POST['x'];
    $yreal=$_POST['y'];
    $wreal=$_POST['w'];
    $hreal=$_POST['h'];
  }

  //código para admitir varios tipos de formato de imagen
  switch ($imageninfo[2]) {
    case IMAGETYPE_BMP  : 
      include "imagecreatefromBMP.php";
      $img_r = imagecreatefromBMP($src);  
    break;
    case IMAGETYPE_JPEG : $img_r = imagecreatefromjpeg($src); break;
    case IMAGETYPE_PNG  : $img_r = imagecreatefrompng($src);  break;
    default : die("Por favor suba una fotografía en formato .png, .jpg o .gif");
  }

  //creando una imagen recortable
  $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
  //recortando
  imagecopyresampled($dst_r,$img_r,0,0,$xreal,$yreal,
  $targ_w,$targ_h,$wreal,$hreal);
   //guardando en temporal
  imagejpeg($dst_r,$src,$jpeg_quality);
  header("location:personal_apoyo_2.php?temp=$src#recorte");
  exit;
}
    
    
?>
<!DOCTYPE html>
<html>
<head>
  <title>SIEED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="../layout/scripts/jscrop/jquery.min.js"></script>
  <script src="../layout/scripts/jscrop/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />
<script type="text/javascript">
  $(function(){
  var jcrop_api;
    $('#cropbox').Jcrop({
      aspectRatio: 2/3,
      onSelect: updateCoords
    },function(){
      jcrop_api = this;
      jcrop_api.animateTo([50,30,250,200]);
      });
  });
  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };
  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Primero escoga una región de la fotografía a recortar');
    return false;
  };
  function validateFoto() {
    var x = document.forms["registro"]["foto_ruta"].value;
    if (x == null || x == "") {
        alert("Seleccione una foto, súbala y recortela. Después intente nuevamente");
        return false;
    }
  };
  
</script>
</style>

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
                      <th>No. Control</th>
                      <th>Apellidos</th>
                      <th>Nombre(s)</th>
                      <th>Sexo</th>
                      <th>Fotografía</th>
                      <th>Autorización</th>
                      <th>Edición</th>
                      <th>Eliminar</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#">Value 1</a></td>
                      <td>Value 2</td>
                      <td>Value 3</td>
                      <td>Value 3</td>
                      <td>Value 3</td>
                      <td align="Center"><a href="#" >Autorizar</a></td>
                      <td align="Center"><a href="#" ><i class="fa fa-2x fa-pencil-square-o" ></a></i></td>
                      <td align="Center"><a href="#" ><i class="fa fa-2x fa-remove" ></a></i></td>
                    </tr>
                    <tr>
                      <td><a href="#">Value 1</a></td>
                      <td>Value 2</td>
                      <td>Value 3</td>
                      <td>Value 3</td>
                      <td>Value 3</td>
                      <td align="Center"><a href="#" >Desautorizar</a></td>
                      <td align="Center"><a href="#" ><i class="fa fa-2x fa-pencil-square-o" ></a></i></td>
                      <td align="Center"><a href="#" ><i class="fa fa-2x fa-remove" ></a></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </article>
            <li class="btmspace-50">
            <article class="service largeicon"><i class="icon nobg circle fa fa-plus-square-o"></i>
             <h6 class="heading"><a href="#"><strong>Registrar a uno nuevo/Edición </strong></a></h6>
             <div id="comments">
             <!--cargando fotografia-->
             <p><strong>Seleccione una fotografía para el trabajador</strong></p>
              <form action="subiendofoto.php" method="POST" enctype='multipart/form-data'>
                <input type="file" name="imagen" accept=".jpg,.png" capture="camera" />
                <input type="hidden" id="pagina" name="pagina" value="personal_apoyo_2.php">
                <input type="submit" name="submit" value="Cargar Fotografía"><br>
              </form>
              <section id="recorte"></section>
               <?php
                //si ya hay una foto cargada, aqui se llama para recortar
                if ($_SERVER['REQUEST_METHOD'] == 'GET'){
                  if(isset($_GET['src'])){
                    echo "Seleccione una area con el recuadro y haga clic en recortar, debajo de la foto.";
                    echo "<img src=".$_GET['src']." id='cropbox'/>";
                    echo "<form action='personal_apoyo_2.php' method='post' onsubmit='return checkCoords();'>
                          <div id='comments'>
                          <input type='hidden' id='x' name='x' />
                          <input type='hidden' id='y' name='y' />
                          <input type='hidden' id='w' name='w' />
                          <input type='hidden' id='h' name='h' />
                          <input type='hidden' id='ruta' name='ruta' value='".$_GET['src']."'/>
                          <br>
                          <input name='submit' type='submit' value='Recortar' align='Right'></div>
                        </form>";
                      }else{
                        //si no, puede ser que ya este recortada o todavía no se cargue nada. Con el if decantamos
                        if(!isset($_GET['temp']))
                        echo "<br><strong>Aqui podrá recortar la fotografía en cuanto la cargue</strong>";
                      } 
                   //si ya se cargó, que s emuestre la vista previa
                  if(isset($_GET['temp'])){
                    echo "<p><strong>Vista Previa</strong></p>";
                    echo "<img src=".$_GET['temp'].">";
                  }
                  }
                ?>

          </div>
             <div id="comments">
             <form name="registro" action="guardardatos.php" method="POST" onsubmit="return validateFoto()" > 
             <label for="nombre">Nombre(s)<span>*</span></label> 
             <input type="text" name="nombre" id="nombre" value="" pattern="^([a-zA-Z ñáéíóúÑÁÉÍÓÚ]{2,60})$"
            title="Revisa este campo. O esta vacío o tiene caractéres raros" size="22" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required> 
            <div class="one_third first">
              <label for="apellido_p">Apellido Paterno<span>*</span></label> 
              <input type="text" name="apellido_p" id="apellido_p" value="" pattern="^([a-zA-Z ñáéíóúÑÁÉÍÓÚ]{2,60})$"
                    title="Revisa este campo. O esta vacío o tiene algún numero" size="22"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>
            <div class="one_third">
              <label for="apellido_m">Apellido Materno<span>*</span></label> 
              <input type="text" name="apellido_m" id="apellido_m" value="" pattern="^([a-zA-Z ñáéíóúÑÁÉÍÓÚ]{2,60})$"
                    title="Revisa este campo. O esta vacío o tiene caractéres raros" size="22" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div> 
            <div class="one_third ">
            <label for="sexo">Sexo<span>*</span></label>
            <select required name="sexo">
              <option value="">---Seleccionar---</option>
              <option value="Hombre">Hombre</option>
              <option value="Mujer">Mujer</option>
            </select><br><br><br>
            </div>
      
        <!--El siguiente hidden incluye la ruta temporal de la foto recortada, para ya almacenarla en la BD, Insertar PHP en value-->
      <?php
        if(isset($_GET['temp'])){
          echo "<input type='hidden' id='foto_ruta' name='foto_ruta' value='".$_GET['temp']."' required>";
        }else{
          echo "<input type='hidden' id='foto_ruta' name='foto_ruta' value=''>";
        }
        ?> 

        <input type="submit" value="Guardar datos" > 
        <input name="reset" type="reset" value="Limpiar datos">
       
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

</body>
</html>