
<?php 
header('Content-Type: application/json');
include("coneccion.php");
require_once('nusoap/lib/nusoap.php');

session_Start();


if(isset($_POST["submit"])) {
		
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		$obj= new Coneccion();
		$consulta  = $obj->Crear_Categoria($_POST["nombre_cat"],$target_file);
		$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
		mysql_free_result($consulta);
		header('Location: admin.php');
		
		
    } else {
        echo "Sorry, there was an error uploading your file.".basename($_FILES["fileToUpload"]["error"]);
    }

			
}else if(isset($_POST["submit_art"])){
			
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$obj= new Coneccion();
		$consulta  = $obj->Crear_Articulo($_POST["nombre_cat"],$target_file);
		$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
		mysql_free_result($consulta);
		
		header('Location: admin.php');
    } else {
        echo "Sorry, there was an error uploading your file.".basename($_FILES["fileToUpload"]["error"]);
    }

	
}else if(isset($_POST["logout"])){
	
	session_unset();
	session_destroy();
	header('Location: index.php');
}




if (is_ajax()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
    $action = $_POST["action"];
	
    switch($action) { //Switch case for value of action
      case "login": 
			$pas=$_POST["password"];
			$emai=$_POST["email"];
			Iniciar_Sesion($pas,$emai); 
			break;
	  case "crear":
	  		$id=$_POST["id"];
	  		$nombre=$_POST["nombre"];
	  		$precio=$_POST["precio"];
	  		
	  		Crear_Nuevo($id,$nombre,$precio);
	  		break;
	  case "buscar":
	  		$id=$_POST["id"];
	  		
	  		Buscar($id);
	  		break;
	  		
	  case "mod_pag": 
			$vision=$_POST["vision"];
			$mision=$_POST["mision"];
			$slogan=$_POST["slogan"];
			$historia=$_POST["historia"];
			$mensaje=$_POST["mensaje"];
			$descripcion=$_POST["descripcion"];
			$direccion=$_POST["direccion"];
			$telefono=$_POST["telefono"];
			$email=$_POST["email"];
			
			Modificar_Pag($vision,$mision,$slogan,$historia,$descripcion,$mensaje,$direccion,$email,$telefono);
			break;
	  case "datos":
			$categoria=$_POST["categoria"];
			Get_Categoria($categoria);
			break;
	 case "datos_art":
			$articulo=$_POST["articulo"];
			Get_Articulo($articulo);
			break;
	 case "elim_cat":
			$categoria=$_POST["categoria"];
			Eliminar_Categoria($categoria);
			break;
	 case "crear_cat":
			$categoria=$_POST["nombre_cat"];
			Crear_Categoria($categoria);
			break;
	 case "editar_cat":
			$nombre=$_POST["nombre_cat"];
			$categoria=$_POST["categoria"];
			Modificar_Categoria($categoria,$nombre);
			break;
	 case "crear_art":
			$articulo=$_POST["nombre"];
			$codigo=$_POST["codigo"];
			$precio=$_POST["precio"];
			$detalle=$_POST["descripcion"];
			Crear_Articulo($articulo,$codigo,$precio,$detalle);
			break;
	 
	 case "cambio_art":
			$articulo=$_POST["articulo"];
			$nombre=$_POST["nombre"];
			$precio=$_POST["precio"];
			$detalle=$_POST["descripcion"];
			Modificar_Articulo($articulo,$nombre,$precio,$detalle);
			break;
	case "elim_art":
			$articulo=$_POST["articulo"];
			Eliminar_Articulo($articulo);
			break;
	case "asignar":
			$articulo=$_POST["articulo"];
			$categoria=$_POST["categoria"];
			Asignar($articulo,$categoria);
			break;
	case "desasignar":
			$articulo=$_POST["articulo"];
			$categoria=$_POST["categoria"];
			Desasignar($articulo,$categoria);
			break;
	case "crear_red":
			$red=$_POST["red"];
			$nombre=$_POST["nombre"];
			$url=$_POST["url"];
			Crear_Red($red,$nombre,$url);
			break;
	case "datos_red":
			$red=$_POST["red"];
			Get_Red($red);
			break;
	case "datos_img":
			$imagen=$_POST["imagen"];
			Get_Imagen($imagen);
			break;
	case "mod_red":
			$red=$_POST["red"];
			$nombre=$_POST["nombre"];
			$tipo=$_POST["tipo"];
			$url=$_POST["url"];
			
			Cambiar_red($red,$nombre,$tipo,$url);
			break;
	case "elim_red":
			$red=$_POST["red"];
			Eliminar_red($red);
			break;
	case "cambiar_img":
			$imagen=$_POST["imagen"];
			Cambiar_Imagen($imagen);
			break;
			
    }
  }
}	


//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function test_function(){

  //Do what you need to do with the info. The following are some examples.
  //if ($return["favorite_beverage"] == ""){
  //  $return["favorite_beverage"] = "Coke";
  //}
  //$return["favorite_restaurant"] = "McDonald's";
  
  $return["json"] = "hola";
  echo json_encode($return);
}

function Cambiar_Imagen($imagen){
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


        
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	    $obj= new Coneccion();
	    
		$consulta  = $obj->Cambiar_Imagen($imagen,$target_file);
		$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
		mysql_free_result($consulta);
		$return=$line["resultado"];
		echo $return;
    } else {
		$return="2";
        echo $return;
    }
}
function Iniciar_Sesion ($pass, $mail){
$obj = new Coneccion();
$result=$obj->Iniciar_Sesion($pass,$mail);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return["result"]=$line["resultado"]."";
if($line["resultado"]==1||$line["resultado"]==2){
	$_SESSION["estado"]=1;
}else{
	
}
mysql_free_result($result);	
echo json_encode($return);
}

function Crear_Nuevo($id,$nombre,$precio){
$obj = new Coneccion();
$result=$obj->Crear_Nuevo($id,$nombre,$precio);
 //This is your webservice server WSDL URL address
//$wsdl = "https://textiles-luismonzon.c9.io/service.php?wsdl";
//create client object
//$client = new nusoap_client($wsdl, 'wsdl');
 //$err = $client->getError();
//if ($err) {
	// Display the error
//	echo '<h2>Constructor error</h2>' . $err;
	// At this point, you know the call that follows will fail
  //      exit();
//}
//calling our first simple entry point
//$result1=$client->call('Crear_Nuevo', array('id'=>$id,'nombre'=>$nombre,'precio'=>$precio));
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return["result"]=$line["resultado"]."";
//$return["result"]=$result1;
mysql_free_result($result);	
echo json_encode($return);
}

function Buscar($id){
$obj = new Coneccion();
$result=$obj->Buscar($id);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;


$return["nombre"]=$line["nombre"]."";
$return["precio"]=$line["precio"]."";
mysql_free_result($result);	
echo json_encode($return);
}


function Modificar_Pag ($vision,$mision,$slogan,$historia,$descripcion,$mensaje,$direccion,$email,$telefono){
$obj = new Coneccion();
$result=$obj->Modificar_Pag($vision,$mision,$slogan,$historia,$descripcion,$mensaje,$direccion,$email,$telefono);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return["result"]=$line["resultado"];
mysql_free_result($result);	
echo json_encode($return);
}

function Get_Categoria($categoria){
$obj = new Coneccion();
$result=$obj->Get_Categoria($categoria);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return["categoria"]=$line["categoria"];
$return["nombre_categoria"]=$line["nombre_categoria"];
$return["imagen"]=$line["imagen"];
mysql_free_result($result);	
echo json_encode($return);
}



function cadena_no($articulo){
	
	$obj = new Coneccion();
	echo $obj->servidor;
	$result=$obj->Get_Categoria_No_Asignada($articulo);
	$cadena="<option value=\"0\">Categorias</option>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$cadena=$cadena."<option value=\"".$line["categoria"]."\">".$line["nombre_categoria"]."</option>\n";
	}
	mysql_free_result($result);
	return $cadena;
}

function cadena_si($articulo){
	
	$obj = new Coneccion();
	echo $obj->servidor;
	$result=$obj->Get_Categoria_Asignada($articulo);
	$cadena="<option value=\"0\">Categorias</option>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$cadena=$cadena."<option value=\"".$line["categoria"]."\">".$line["nombre_categoria"]."</option>\n";
	}
	mysql_free_result($result);
	return $cadena;
}

function Get_Articulo($articulo){
$no_asignada=cadena_no($articulo);
$asignada=cadena_si($articulo);

$obj = new Coneccion();
$result=$obj->Get_Articulo($articulo);


$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return["articulo"]=$line["articulo"];
$return["nombre"]=$line["nombre"];
$return["imagen"]=$line["imagen"];
$return["detalle"]=$line["descripcion"];
$return["precio"]=$line["precio"];
$return["asignada"]=$asignada;
$return["noasignada"]=$no_asignada;
mysql_free_result($result);	
echo json_encode($return);
}
function Eliminar_Categoria($categoria){
$obj = new Coneccion();
$result=$obj->Eliminar_Categoria($categoria);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return["result"]=$line["resultado"];
mysql_free_result($result);	
echo json_encode($return);
}




function Eliminar_Articulo($articulo){
$obj = new Coneccion();
$result=$obj->Eliminar_Articulo($articulo);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return["result"]=$line["resultado"];
mysql_free_result($result);	
echo json_encode($return);
}

function Crear_Categoria($categoria){
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	    $obj= new Coneccion();
		$consulta  = $obj->Crear_Categoria($categoria,$target_file);
		$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
		mysql_free_result($consulta);
		$return=$line["resultado"];
		echo $return;
    } else {
		$return="2";
        echo $return;
    }
}

function Modificar_Categoria($categoria,$nombre){
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	

		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				$obj= new Coneccion();
				$consulta  = $obj->Modificar_Categoria($nombre,$categoria,$target_file);
				$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
				mysql_free_result($consulta);
				$return=$line["resultado"];
				echo $return;
		} else {
				$obj= new Coneccion();
				$consulta  = $obj->Modificar_Categoria($nombre,$categoria,null);
				$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
				mysql_free_result($consulta);
				$return=$line["resultado"];
				echo $return;
			}

}

function Crear_Articulo($nombre,$codigo,$precio,$detalle){
/*$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$thumb_img ="images/"."thumb". basename($_FILES["file"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		$size=getimagesize($target_file); 
		$width=$size[0]; 
		$height=$size[1]; 
		
		
		$filename = stripslashes($_FILES['file']['name']);
        $extension = getExtension($filename);
	    $extension = strtolower($extension);
		$oldimage=null;
		if($extension=="jpg"||$extension=="jpge"){
				$oldimage=imagecreatefromjpeg($target_file); 
		}else if ($extension=="png"||$extension=="gif"){
			
				$oldimage=imagecreatefrompng($target_file); 
		}
	
		$newimage=ImageCreateTrueColor(200,150); 
		ImageCopyResampled($newimage,$oldimage,0,0,0,0,200,150,$width,$height); 
		imagejpeg($newimage,$thumb_img); 
		
	    $obj= new Coneccion();
		$consulta  = $obj->Crear_Articulo($codigo,$nombre,$target_file,$detalle,$precio);
		$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
		mysql_free_result($consulta);
		$return=$line["resultado"];
		echo $return;
    } else {
		$return="2";
        echo $return;
    }
*/
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	    $obj= new Coneccion();
		$consulta  = $obj->Crear_Articulo($codigo,$nombre,$target_file,$detalle,$precio);
		$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
		mysql_free_result($consulta);
		$return=$line["resultado"];
		echo $return;
    } else {
		$return="2";
        echo $return;
    }
}

function Modificar_Articulo($articulo,$nombre,$precio,$detalle){
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				$obj= new Coneccion();
				$consulta  = $obj->Modificar_Articulo($articulo,$nombre,$target_file,$detalle,$precio);
				$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
				mysql_free_result($consulta);
				$return=$line["resultado"];
				echo $return;
			} else {
				$obj= new Coneccion();
				$consulta  = $obj->Modificar_Articulo($articulo,$nombre,null,$detalle,$precio);
				$line = mysql_fetch_array($consulta, MYSQL_ASSOC);
				mysql_free_result($consulta);
				$return=$line["resultado"];
				echo $return;
			}
	
}
function Asignar($articulo,$categoria){	
$obj = new Coneccion();
$result=$obj->Asignar($articulo,$categoria);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return=$line["resultado"];
mysql_free_result($result);	
echo $return;
}

function Desasignar($articulo,$categoria){	
$obj = new Coneccion();
$result=$obj->Desasignar($articulo,$categoria);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return=$line["resultado"];
mysql_free_result($result);	
echo $return;	
}

function Crear_Red($red,$nombre,$url){	
$obj = new Coneccion();
$result=$obj->Crear_Red($red,$nombre,$url);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return=$line["resultado"];
mysql_free_result($result);	
echo $return;
}

function Get_Redes(){	
$obj = new Coneccion();
$result=$obj->Get_Redes();
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return=$line["resultado"];
mysql_free_result($result);	
echo $return;
}
function Get_Imagen($imagen){
$obj = new Coneccion();
	$result=$obj->Get_Empresa_Info();
	$line = mysql_fetch_array($result, MYSQL_ASSOC);
	if($imagen==1){
		$return["imagen"]=$line["portada1"];
	}
	else if($imagen==2){
		$return["imagen"]=$line["portada2"];
	}
	else if($imagen==3){
		$return["imagen"]=$line["portada3"];
	}
	else if($imagen==4){
		$return["imagen"]=$line["Logo"];
	}	
mysql_free_result($result);
echo json_encode($return);
}

function Get_Red($red){	
$obj = new Coneccion();
$result=$obj->Get_Red($red);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return["red"]=$line["red"];
$return["nombre"]=$line["nombre"];
$return["tipo"]=$line["tipo"];
$return["enlace"]=$line["enlace"];
mysql_free_result($result);		
echo json_encode($return);
}

function Cambiar_red($red,$nombre,$tipo,$url){
$obj = new Coneccion();
$result=$obj->Cambiar_red($red,$nombre,$tipo,$url);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return=$line["resultado"];
mysql_free_result($result);		
echo $return;
	
}

function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
function Eliminar_red($red){
$obj = new Coneccion();
$result=$obj->Eliminar_red($red);
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
$return=$line["resultado"];
mysql_free_result($result);		
echo $return;
	
}

?>