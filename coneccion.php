<?php
$GLOBALS['user'] = 'luis'; 
$GLOBALS['pass'] = 'spiderman'; 
$GLOBALS['servidor'] = 'localhost'; 
$GLOBALS['database'] = 'textiles'; 
class Coneccion
{
 
	
	public function GetCategorias() {
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Get_Categorias()';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	public function GetArticulos() {
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'select * from articulo';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	public function Get_Empresa_Info() {
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Get_Empresa_Info(1)';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	public function Get_8_Categorias($numero) {
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Get_8_Categorias('.$numero.')';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	public function Get_Articulos_Categoria($cat){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Get_Articulos_Categoria('.$cat.')';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	

	}
	public function Iniciar_Sesion($pass,$mail){
		
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Iniciar_Sesion("'.$mail.'","'.$pass.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
		
	}
	function Crear_Categoria($nombre,$imagen){
		
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Crear_Categoria("'.$nombre.'","'.$imagen.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
	
	}

	function Eliminar_Categoria($codigo){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Eliminar_Categoria('.$codigo.')';
		$result = mysql_query($query) or die('Xonsulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
	}
	
	function Eliminar_Articulo($articulo){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Eliminar_Articulo('.$articulo.')';
		$result = mysql_query($query) or die('Xonsulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
	}
	
	function Modificar_Pag($vision,$mision,$slogan,$historia,$descripcion,$mensaje,$direccion,$email,$telefono){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'Call Modificar_Empresa("'.$vision.'","'.$mision.'","'.$slogan.'","'.$historia.'","'.$mensaje.'","'.$descripcion.'","'.$direccion.'","'.$email.'","'.$telefono.'")';
		$result = mysql_query($query) or die('Xonsulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
	}
	function Get_Categoria($categoria){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Get_Categoria("'.$categoria.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	
	function Get_Articulo($articulo){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Get_Articulo("'.$articulo.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	
		function Modificar_Categoria($nombre,$categoria,$imagen){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query="";
		if(is_null($imagen)){
			$query = 'call Modificar_Categoria("'.$nombre.'",null,"'.$categoria.'")';
		}else{
			
			$query = 'call Modificar_Categoria("'.$nombre.'","'.$imagen.'","'.$categoria.'")';
		}
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
		
	}
	
	function Modificar_Articulo($articulo,$nombre,$imagen,$detalle,$precio){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query="";
		if(is_null($imagen)){
			$query = 'call Modificar_Articulo("'.$articulo.'","'.$nombre.'",null,"'.$detalle.'","'.$precio.'")';
		}else{
			
			$query = 'call Modificar_Articulo("'.$articulo.'","'.$nombre.'","'.$imagen.'","'.$detalle.'","'.$precio.'")';
		}
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
		
	}
	
	
	
	function Crear_Articulo($codigo,$nombre,$target_file,$detalle,$precio){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Crear_Articulo("'.$codigo.'","'.$nombre.'","'.$target_file.'","'.$detalle.'","'.$precio.'",1)';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	
	function Get_Categoria_No_Asignada($articulo){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Get_Categoria_No_Asignada("'.$articulo.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;		
	}
	function Get_Redes(){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Get_Redes()';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;		
	}
	function Get_Categoria_Asignada($articulo){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Get_Categoria_Asignada("'.$articulo.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	function Asignar($articulo,$categoria){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Asignar_Articulo_Categoria('.$categoria.','.$articulo.')';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;		
	}
	function Desasignar($articulo,$categoria){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Desasignar_Articulo_Categoria('.$categoria.','.$articulo.')';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;		
	}
	function Crear_Red($red,$nombre,$url){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Crear_Red("'.$nombre.'","'.$red.'","'.$url.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;	
	}
	function Get_Red($red){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Get_Red('.$red.')';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;		
	}
	
	function  Cambiar_red($red,$nombre,$tipo,$url){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Guardar_Red("'.$nombre.'","'.$tipo.'","'.$url.'","'.$red.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
		
	}
	function  Eliminar_red($red){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Eliminar_Red("'.$red.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
		
	}
	function Cambiar_Imagen($imagen,$url){
		$link = mysql_connect($GLOBALS['servidor'], $GLOBALS['user'], $GLOBALS['pass'])
		or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db($GLOBALS['database']) or die('No se pudo seleccionar la base de datos');
		$query = 'call Cambiar_Imagen("'.$imagen.'","'.$url.'")';
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		mysql_close($link);
		return $result;
	}
}
 
?>