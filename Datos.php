<?php 
	include 'coneccion.php';
	?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Redes 2 -- Grupo 14</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
	body{
	 background: url(images/back.png);
	background-color: #444;
    background: url(images/pinlayer2.png),url(images/pinlayer1.png),url(images/back.png);    
}

.vertical-offset-100{
    padding-top:100px;
}
	</style>
    <!-- MetisMenu CSS -->
    <link href="../admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingreso de Datos</h3>
                    </div>
                    <div class="panel-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="id" name="id" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="nombre" name="nombre" type="text" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Precio" id="precio" name="precio" type="text" value="">
                                </div>
								
								<div class="form-group">
									<label class="control-label" id="error"></label>
								</div>
								
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input  type="submit" class="btn btn-lg btn-success btn-block" value="Guardar" onclick="Entrar()"></a>
                            </fieldset>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="../js/TweenLite.min.js"></script>
	
    <!-- jQuery -->
    <script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../admin/dist/js/sb-admin-2.js"></script>
	<script >
	    function Entrar() {
	    
		var iden = document.getElementById('id').value;
		var name = document.getElementById('nombre').value;
		var price = document.getElementById('precio').value;
		
		if(iden==""||name==""||price==""){
			
			$("#error").html(
			  "Ingrese todos los campos antes de proceder."
			);
			
		}else{
		
		var request = $.ajax({
		  type: "POST",
		  dataType: "json",
		  url: "funciones.php", //Relative or absolute path to response.php file
		  data: {action: "crear",id: iden, nombre: name, precio: price},
		  success: function(data) {
		  
		      alert(data);
			if(data["result"]=="1"){
				 alert("Exito");
			}else {
			$("#error").html(
			  "Error, contraseña y/o email incorrectos"
			);
			}
		  }
		});
		request.fail(function (jqXHR, textStatus, errorThrown) {
		alert(textStatus +"  "+ errorThrown);
		    
		});
		
		}
		
		
	}
	    
	    
	</script>
	<script>
			$(document).ready(function(){
		  $(document).mousemove(function(e){
			 TweenLite.to($('body'), 
				.5, 
				{ css: 
					{
						backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
					}
				});
		  });
		});
	</script>
	
</body>

</html>
