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
	header("location:registro_formulario.php?temp=$src#recorte");
	exit;
}


// If not a POST request, display page below:

?><!DOCTYPE html>
<html lang="es">
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
<!--Menu-->
<div class="wrapper row1">
<img src="../images/banner.png" >
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="#">SIEED</a></h1>
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
<div class="wrapper row3">
  <main class="container clear"> 
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

      <!--Menu extra de usuario-->
      <h6>Registro</h6>
      <nav class="sdb_holder">
        <ul>
          <li><a href="autoridades.html">Autoridades</a></li>
          <li><a href="#">Disciplinas</a> </li>
          <li><a href="#">Registrar alumnos</a> </li>
          <li><a href="#">Impresión de Tarjetones</a> </li>
          <li><a href="#">Impresión de Credenciales</a> </li>
          <li><a href="#">Impresión de Cédula</a> </li>
          <li><a href="#">Registrar personal de Apoyo</a> </li>
        </ul>
      </nav>

    
    </div>
 
<div class="content three_quarter"> 
	<h1 align="center"><a><strong>Registro de estudiantes</strong></a></h1>
		<ul class="nospace group">
  	<li class="btmspace-50"> 
          <article class="service largeicon"><i class="icon nobg circle fa fa-camera"></i> 
          <h6 class="heading"><a href="#">Seleccione una Fotografía</a></h6>
         	<p><strong>Recuerda que tu fotografía debe ser de frente, con un fondo blanco, del pecho hacia arriba y cara descubierta</strong></p><br>
          <p>Seleccione una fotografía y después haga clic en cargar <strong>(.jpg/.png)</strong></p> <bR>
          <div id="comments">
          <form action="subiendofoto.php" method="POST" enctype='multipart/form-data'>
          	<input type="file" name="imagen" accept=".jpg,.png" capture="camera" />
            <input type="hidden" id="pagina" name="pagina" value="registro_formulario.php">
            <input type="submit" name="submit" value="Cargar Fotografía"><br>
       	  </form>
          </div>
          </article> 
    </li>

    <li class="btmspace-20">
    	<article class="service largeicon"><i class="icon nobg circle fa fa-scissors "></i>
    	<section id="recorte"></section>
    	<h6 class="heading"><a href="#">Recorte la fotografía</a></h6>
    	<div class="comments">
    		
	      <?php
	      //si ya hay una foto cargada, aqui se llama para recortar
	      if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	        if(isset($_GET['src'])){
	          echo "Seleccione una area con el recuadro y haga clic en recortar, debajo de la foto.";
	          echo "<img src=".$_GET['src']." id='cropbox'/>";
	          echo "<form action='registro_formulario.php' method='post' onsubmit='return checkCoords();'>
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
	              echo "Aqui podrá recortar la fotografía en cuanto la cargue";
	            } 
	         //si ya se cargó, que s emuestre la vista previa
	        if(isset($_GET['temp'])){
	        	echo "<p><strong>Vista Previa</strong></p><br>";
	        	echo "<img src=".$_GET['temp'].">";
	        }
	        }
	      ?>
	      </div>
    	</article>
    	</li>
    <div class="jc-demo-box">
     
      
      <!-- This is the form that our event handler fills -->
      <br>
    </div>

    

	<li class="btmspace-30"> 
		<article class="service largeicon"><i class="icon nobg circle fa fa-pencil-square-o"></i> 
		<h6 class="heading"><a href="#">Datos personales</a></h6> 
		<p>Escriba los datos del alumno(a)</p> 
		<div id="comments">
		<form name="registro" action="guardardatos.php" method="POST" onsubmit="return validateFoto()" >
			
			<label for="nombre">Nombre(s)<span>*</span></label> 
      <input type="text" name="nombre" id="nombre" value="" pattern="^([a-zA-Z ñáéíóúÑÁÉÍÓÚ]{2,60})$"
            title="Revisa este campo. O esta vacío o tiene caractéres raros" size="22" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required> 

      <div class="one_half first">
        <label for="apellido_p">Apellido Paterno<span>*</span></label> 
        <input type="text" name="apellido_p" id="apellido_p" value="" pattern="^([a-zA-Z ñáéíóúÑÁÉÍÓÚ]{2,60})$"
              title="Revisa este campo. O esta vacío o tiene algún numero" size="22"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required> 

        <label for="curp">CURP<span>*</span></label>
        <input type="text" name="curp" id="curp" value="" pattern="[A-Z]{4}[0-9]{6}[H,M][A-Z]{5}[0-9]{2}"
        title="Revisa este campo" size="22" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required> 

        
      </div>

      <div class="one_half">
        <label for="apellido_m">Apellido Materno<span>*</span></label> 
        <input type="text" name="apellido_m" id="apellido_m" value="" pattern="^([a-zA-Z ñáéíóúÑÁÉÍÓÚ]{2,60})$"
              title="Revisa este campo. O esta vacío o tiene caractéres raros" size="22" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
        <label for="disciplina">Disciplina<span>*</span></label>
        <select required name="disciplina">
          <option value="">---Seleccionar---</option>
          <option value="Básquetbol">Básquetbol</option>
          <option value="Béisbol">Béisbol</option>
          <option value="Voleibol de playa">Voleibol de playa</option>
          <option value="Voleibol">Voleibol</option>
          <option value="Ajedrez">Ajedrez</option>
          <option value="Atletismo">Atletismo</option>
          <option value="Natación">Natación</option>
          <option value="Tennis">Tennis</option>
        </select> 
        <bR><br>
      </div>
      <div class="one_half first">
        <label for="grado_estudios">Grado de estudios<span>*</span></label>
        <select required name="grado_estudios">
  				<option value="">---Seleccionar---</option>
  				<option value="Licenciatura">Licenciatura</option>
  				<option value="Maestría">Maestria</option>
  				<option value="Doctorado">Doctorado</option>
  			</select> 
      </div>
      <div class="one_half">
        <label for="tipo_sangre">Tipo de Sangre<Span>*</Span></label>
        <select required name="tipo_sangre">
          <option value="">-----Seleccionar-----</option>
          <option value="AB+">AB+</option>
          <option value="AB-+">AB-</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
        </select>
      </div>


      <label for="carrera">Carrera<span>*</span></label>
			<select required name="carrera">
				<option value="">---Seleccione una Carrera------</option>
				<option value="Ingeniería en Acuicultura">Ingeniería en Acuicultura</option>
				<option value="Ingeniería Aeronáutica">Ingeniería Aeronáutica</option>
				<option value="Ingeniería en Administracion">Ingeniería en Administracion</option>
				<option value="Ingeniería en Agronomía">Ingeniería en Agronomía</option>
				<option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
				<option value="Ingeniería Biomédica">Ingeniería Biomédica</option>
				<option value="Ingeniería Bioquímica">Ingeniería Bioquímica</option>
				<option value="Ingeniería Civil<">Ingeniería Civil</option>
				<option value="Ingeniería en Desarrollo Comunitario">Ingeniería en Desarrollo Comunitario</option>
				<option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option>
				<option value="Ingeniería Electromecánica">Ingeniería Electromecánica</option>
				<option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
				<option value="Ingeniería en Energías Renovables">Ingeniería en Energías Renovables</option>
				<option value="Ingeniería Forestal">Ingeniería Forestal</option>
				<option value="Ingeniería en Geociencias">Ingeniería en Geociencias</option>
				<option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
				<option value="Ingeniería Hidrológica">Ingeniería Hidrológica</option>
				<option value="Ingeniería Industrial">Ingeniería Industrial</option>
				<option value="Ingeniería en Industrias Alimentarias">Ingeniería en Industrias Alimentarias</option>
				<option value="Ingeniería Informática">Ingeniería Informática</option>
				<option value="Ingeniería en Innovación Agrícola Sustentable">Ingeniería en Innovación Agrícola Sustentable</option>
				<option value="Ingeniería en Logística">Ingeniería en Logística</option>
				<option value="Ingeniería en Materiales">Ingeniería en Materiales</option>
				<option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
				<option value="Ingeniería Mecatrónica">Ingeniería Mecatrónica</option>
				<option value="Ingeniería en Minería">Ingeniería en Minería</option>
				<option value="Ingeniería en Nanotecnología">Ingeniería en Nanotecnología</option>
				<option value="Ingeniería Naval">Ingeniería Naval</option>
				<option value="Ingeniería en Pesquerías">Ingeniería en Pesquerías</option>
				<option value="Ingeniería Petrolera">Ingeniería Petrolera</option>
				<option value="Ingeniería Química">Ingeniería Química</option>
				<option value="Ingeniería en Sistemas Automotrices">Ingeniería en Sistemas Automotrices</option>
				<option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
				<option value="Ingeniería en Tecnologías de la Información y Comunicaciones">Ingeniería en Tecnologías de la Información y Comunicaciones</option>
				<option value="Ingeniería en Animación Digital y Efectos Visuales">Ingeniería en Animación Digital y Efectos Visuales</option>
				<option value="Arquitectura">Arquitectura</option>
				<option value="Contador Público">Contador Público</option>
				<option value="Gastronomía">Gastronomía</option>
				<option value="Licenciatura en Administración">Licenciatura en Administración</option>
				<option value="Licenciatura en Biología">Licenciatura en Biología</option>
				<option value="Licenciatura en Turismo">Licenciatura en Turismo</option>
			</select><br>

			<div class="one_third first">
				<label for="n_control">Numero de Control <span>*</span></label>
	       <input type="text" name="n_control" id="n_control" value="" pattern="^([0-9A-Z]{8}||[0-9A-Z]{9})$" title="A nivel licenciatura, un número de control tiene 8 caractes, Maestria, Doctorado o Posgrado, 9" size="22" required>
	     </div> 
      <div class="one_third ">
	      <label for="semestre">Semestre<span>*</span></label>
				<select required name="semestre">
					<option value="">---Seleccionar---</option>
					<option value="1">1º</option>
					<option value="2">2º</option>
					<option value="3">3º</option>
					<option value="4">4º</option>
					<option value="5">5º</option>
					<option value="6">6º</option>
					<option value="7">7º</option>
					<option value="8">8º</option>
					<option value="9">9º</option>
					<option value="10">10º</option>
					<option value="11">11º</option>
					<option value="12">12º</option>
					<option value="13">13º</option>
					<option value="14">14º</option>
				</select>
			</div>

			<div class="one_third ">
			<label for="sexo">Sexo<span>*</span></label>
			<select required name="sexo">
				<option value="">---Seleccionar---</option>
				<option value="Hombre">Hombre</option>
				<option value="Mujer">Mujer</option>
			</select>
			</div>
      <div class="one_third first">
        <label for="fecha_nacimiento">Fecha de nacimiento<span>*</span></label> 
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="" 
        title="Revisa este campo. Sólo números " size="22" required min=17 max=70> 

      </div>
      <div class="one_third">
        <label for="peso">Peso<span>*</span></label> 
        <input type="number" name="peso" id="peso" value="" placeholder="Ej: 70"
        title="Revisa este campo. Sólo números " size="22" required min=30 max=150> 
      </div>
      <div class="one_third">
        <label for="estatura">Estatura<span>*</span></label>
        <input type="number" name="estatura" id="estatura" value="" min=1 max=3 step=0.01 placeholder="Ej: 1.50"
                title="Si midieras un metro y medio, escribe 1.50" size="22" required>
      </div><br><br><br>
      <label for="padecimiento" align="left">Alergias o padecimientos</label>
      <textarea name="padecimiento" id="padecimiento" cols="10" rows="5" placeholder="Si no tuviese ninguno, favor de ignorar" value="ninguno" ></textarea>
      <br>
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
	</li><br><br><br>
	</ul>

</div>
</main>
</div>
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

    <div class="one_third">
      <h6 class="title">Recibe avisos en tu correo</h6>
      <form class="btmspace-30" method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="email" value="" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
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
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright TecNacional de México - ALGUNOS DERECHOS RESERVADOS © 2015<a href="#">SIEED.com.mx</a></p>
    <p class="fl_right">Desarrollado por:<a target="_blank" href="http://www.itpachuca.com/" title="Instituto tecnológico de pachuca">ITP</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
</body>
</html>
