<?php
include "Coneccion.php";

$obj = new Coneccion();
						echo $obj->servidor;
						$result=$obj->Get_Empresa_Info();
						$line = mysql_fetch_array($result, MYSQL_ASSOC));
						mysql_free_result($result);
					
$para      = $line["email"];
$titulo    = $_POST["asunto"];
$mensaje   = $_POST["mensaje"];
$cabeceras = 'From: '.$_POST["email"];
mail($para, $titulo, $mensaje, $cabeceras);
header('Location: contact.php');
?>