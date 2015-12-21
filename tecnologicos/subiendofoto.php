<?php

  /*//borrando todo archivo temporal rezagado
  $files = glob('../images/temporal/*'); // get all file names
  foreach($files as $file){ // iterate files
    if(is_file($file))
    unlink($file); // delete file
  }*/

  //si el metodo de entrada al php es post
if ($_SERVER['REQUEST_METHOD']=='POST')
{
  //ruta temporal del archivo subido
  $ruta="../images/temporal";
  $pagina_origen=$_POST['pagina'];

  //jalando el archivo
  $archivo=$_FILES['imagen']['tmp_name'];
  $nombrearchivo=$_FILES['imagen']['name'];
  //sustituyendo todos los espacios del nombre del archivo por guiones, asi no habrá problema con los espacios
  $nombrearchivo=str_replace(" ", "_", $nombrearchivo);

  //cargando archivo a la ruta temporal
  move_uploaded_file($archivo,$ruta.'/'.$nombrearchivo);
  $ruta=$ruta.'/'.$nombrearchivo;
  //retornando la variable ruta a registro formulario
  $header="location:".$pagina_origen."?src=".$ruta."#recorte";
  header($header);

}
?>