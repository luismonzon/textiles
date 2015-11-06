<?php


require_once('nusoap/lib/nusoap.php'); 
 
$GLOBALS['user'] = 'luismonzon'; 
$GLOBALS['pass'] = ''; 
$GLOBALS['servidor'] = 'localhost'; 
$GLOBALS['database'] = 'textiles'; 


	
function Crear_Nuevo($id,$nombre,$precio){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Crear("'.$id.'","'.$nombre.'","'.$precio.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
		
		$cadena=$line["resultado"]."";
		
		mysql_free_result($result);
		
		return $cadena;
			
		//return $result;
		
	}
	

	function Buscar($id){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Leer("'.$id.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
		$cadena=$line["id"].";".$line["nombre"].";".$line["precio"];
		mysql_free_result($result);
		return $cadena;
	}


$server = new soap_server();
$server->register("Crear_Nuevo");
$server->register("Buscar");
$server->service($HTTP_RAW_POST_DATA);

?>