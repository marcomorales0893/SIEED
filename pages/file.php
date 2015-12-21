<?php

	class File{
			public $nombre = "lineamientos.pdf";
			public $numArchivo="";




			public function setNombre($nombre){
			$this->nombre=$nombre;
			}

			public function verificar(){
				if ($_FILES['archivo']["error"] > 0 && $_FILES['archivo2']["error"] > 0
					&& $_FILES['archivo3']["error"] > 0 && $_FILES['archivo4']["error"] > 0
					&& $_FILES['archivo5']["error"] > 0 && $_FILES['archivo6']["error"] > 0){
					echo "No eligio ningun archivo<br>";
				}

			}

			public function verificaFormato($archivo){
				$estado=false;

				if ($_FILES['archivo']['type'] !='application/pdf'){
						echo "<b>El archivo ".$_FILES['archivo']['name']." no es pdf <br>
							  Verifique su archivo </b> <br>";
							  $estado=true;
					}
					return $estado;
			}

			


			public function saveFile(){
				$archivo  = $_GET['archivo'];
				$archivo2 = $_POST['archivo2'];
				$archivo3 = $_POST['archivo3'];
				$archivo4 = $_POST['archivo4'];
				$archivo5 = $_POST['archivo5'];
				$archivo6 = $_POST['archivo6'];

				if($archivo)
				{					
					$this->setNombre("../pdfs/lineamientos.pdf");
					if (!$_FILES['archivo']["error"] > 0)
  						{	
                       		move_uploaded_file($_FILES['archivo']['tmp_name'], 
	    					$this->nombre);
	    					echo "Archivo: ".$_FILES['archivo']['name']." se subio exitosamente<br>";
  						}
					
				}


				if($archivo2){
					
						$this->setNombre("../pdfs/inscripcion.pdf");
						if (!$_FILES['archivo2']["error"] > 0)
  							{
  								move_uploaded_file($_FILES['archivo2']['tmp_name'], 
	    						$this->nombre);
	    						echo "Archivo: ".$_FILES['archivo2']['name']." se subio exitosamente<br>";
  							}
  						
				}


				if($archivo3){
					
						$this->setNombre("../pdfs/zonas_deportivas.pdf");
						if (!$_FILES['archivo3']["error"] > 0)
  							{
  								move_uploaded_file($_FILES['archivo3']['tmp_name'], 
	    						$this->nombre);
	    						echo "Archivo: ".$_FILES['archivo3']['name']." se subio exitosamente<br>";
  							}	
					
				}


				if($archivo4){
					
						$this->setNombre("../pdfs/reglamento_deportivo.pdf");
						if (!$_FILES['archivo4']["error"] > 0)
  							{
  								move_uploaded_file($_FILES['archivo4']['tmp_name'], 
	    						$this->nombre);
	    						echo "Archivo: ".$_FILES['archivo4']['name']." se subio exitosamente<br>";
  							}	
					
				}


				if($archivo5){
					
						$this->setNombre("../pdfs/calendario.pdf");
						if (!$_FILES['archivo5']["error"] > 0)
  							{
  								move_uploaded_file($_FILES['archivo5']['tmp_name'], 
	    						$this->nombre);
	    						echo "Archivo: ".$_FILES['archivo5']['name']." se subio exitosamente<br>";
  							}	
					
				}


				if($archivo6){
					
						$this->setNombre("../pdfs/circular.pdf");
						if (!$_FILES['archivo6']["error"] > 0)
  							{
  								move_uploaded_file($_FILES['archivo6']['tmp_name'], 
	    						$this->nombre);
	    						echo "Archivo: ".$_FILES['archivo6']['name']." se subio exitosamente<br>";
  							}		
					

				}	

			}
		
	}

	$file = new File();
	$file->verificar();
	$file->saveFile();
	header( "refresh:2; url=administracion_sistema.php" );	



?>