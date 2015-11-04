<?php


require_once('nusoap/lib/nusoap.php'); 
 
$GLOBALS['user'] = 'luismonzon'; 
$GLOBALS['pass'] = ''; 
$GLOBALS['servidor'] = 'localhost'; 
$GLOBALS['database'] = 'textiles'; 

$server = new nusoap_server;
 
$server->configureWSDL('server', 'urn:server');
 
$server->wsdl->schemaTargetNamespace = 'urn:server';
 
//SOAP complex type return type (an array/struct)
$server->wsdl->addComplexType(
    'Datos',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array('name' => 'id', 'type' => 'xsd:string'),
        'nombre' => array('name' => 'fullname', 'type' => 'xsd:string'),
        'precio' => array('name' => 'email', 'type' => 'xsd:string')
    )
);
 
 
//first simple function
$server->register('hello',
			array('username' => 'xsd:string'),  //parameter
			array('return' => 'xsd:string'),  //output
			'urn:server',   //namespace
			'urn:server#helloServer',  //soapaction
			'rpc', // style
			'encoded', // use
			'Just say hello');  //description

//first simple function
$server->register('Crear_Nuevo',
			array('id' => 'xsd:string'),  //parameter
			array('nombre' => 'xsd:string'),  //output
			array('precio' => 'xsd:string'),  //output
			array('return' => 'xsd:string'),  //output
			'urn:server',   //namespace
			'urn:server#Crear_nuevoServer',  //soapaction
			'rpc', // style
			'encoded', // use
			'Ingreso de codigo');  //description
 
//this is the second webservice entry point/function 
$server->register('login',
			array('username' => 'xsd:string', 'password'=>'xsd:string'),  //parameters
			array('return' => 'tns:Person'),  //output
			'urn:server',   //namespace
			'urn:server#loginServer',  //soapaction
			'rpc', // style
			'encoded', // use
			'Check user login');  //description
 
//first function implementation
function hello($username) {
        return 'Howdy, '.$username.'!';
}
 
//second function implementation 
function login($username, $password) {
        //should do some database query here
        // .... ..... ..... .....
        //just some dummy result
        return array(
		'id_user'=>1,
		'fullname'=>'John Reese',
		'email'=>'john@reese.com',
		'level'=>99
	);
	
}	
	
	function Crear_Nuevo($id,$nombre,$precio){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Crear("'.$id.'","'.$nombre.'","'.$precio.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		//$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
		//$cadena=$line["resultado"]."";
		//mysql_free_result($result);
		//return $cadena;
		//	
		return $result;
		
	}
	
	

	function Buscar($id){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Leer("'.$id.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
	}


 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
 
$server->service($HTTP_RAW_POST_DATA);

?>