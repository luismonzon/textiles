<?php 
	include 'coneccion.php';
	session_start();
if($_SESSION["estado"]!=1){
	header('Location: login.php');
}	
		$obj = new Coneccion();
		$result=$obj->Get_Empresa_Info();
			$line = mysql_fetch_array($result, MYSQL_ASSOC);
			
				$mision=$line["Mision"];
				$vision=$line["Vision"];
				$slogan=$line["Slogan"];
				$historia=$line["Historia"];
				$descripcion=$line["Descripcion"];
				$mensaje=$line["mensaje"];
				$direccion=$line["direccion"];
				$telefono=$line["telefono"];
				$email=$line["email"];
				
			mysql_free_result($result);

?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador Pagina Textiles</title>

    <!-- Bootstrap Core CSS -->
    <link href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../admin/dist/css/sb-admin-2.css" rel="stylesheet">
	
    <link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css" media="screen" />
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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administrador</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                      
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="#conf_pag" data-toggle="pill" ><i class="fa fa-dashboard fa-fw"></i> Acerca de</a>
                        </li>
                        <li>
                            <a href="#menu_categorias" data-toggle="collapse"><i class="fa fa-bar-chart-o fa-fw"></i>Categorias<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" id="menu_categorias">
                                <li>
                                    <a href="#crear_cat" data-toggle="pill">Crear Categorias</a>
                                </li>
                                <li>
                                    <a href="#ce_cat" data-toggle="pill">Manejo de Categorias</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#menu_articulos" data-toggle="collapse"><i class="fa fa-wrench fa-fw"></i>Articulos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" id="menu_articulos">
                                <li>
                                    <a href="#conf_art" data-toggle="pill">Crear Articulos</a>
                                </li>
                                <li>
                                    <a href="#ce_art" data-toggle="pill">Manejo de Articulos</a>
                                </li>
                              
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="#menu_redes" data-toggle="collapse"><i class="fa fa-sitemap fa-fw"></i>Redes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" id="menu_redes">
                                <li>
                                    <a href="#crear_red" data-toggle="pill">Crear Redes</a>
                                </li>
								 <li>
                                    <a href="#ce_red" data-toggle="pill">Manejo de Redes</a>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div id="refresco">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Configuracion de Sitio</h1>
                    </div>
                    <!-- /.col-lg-12 -->
					<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           
                        </div>
                        <div class="panel-body">
                            <div class="row">
                             
								<div class="tab-content">
										<div class="tab-pane active" id="conf_pag">
												<div class="col-lg-6">
																<div class= "form-group">
																			<label class="control-label " >Vision</label>
																			<div>
																			<textarea class="form-control" id="vision" rows="4" ><?php echo htmlspecialchars($vision); ?></textarea>
																			</div>
																</div>
																<div class= "form-group">
																				<label class="control-label" >Mision</label>
																				<textarea class="form-control" id="mision" rows="4" ><?php echo htmlspecialchars($mision); ?></textarea>
																	
																</div>
																<div class= "form-group">
																	
																			<label class="control-label" >Slogan</label>
																			<textarea class="form-control" id="slogan" rows="4"><?php echo htmlspecialchars($slogan); ?></textarea>
																			
																</div>
																<div class= "form-group">
																	
																			<label class="control-label" >Historia</label>
																			<textarea class="form-control" id="historia" rows="5"><?php echo htmlspecialchars($historia); ?></textarea>
																			
																</div>
																<div class= "form-group">
																	
																			<label class="control-label" >Descripcion</label>
																			<textarea class="form-control" id="descripcion" rows="5"><?php echo htmlspecialchars($descripcion); ?></textarea>
																			
																</div>
																<div class= "form-group">
																	
																			<label class="control-label" >Mensaje</label>
																			<textarea class="form-control" id="mensaje" rows="5"><?php echo htmlspecialchars($mensaje); ?></textarea>
																			
																</div>
																<div class="form-group">
																	<div class="text">
																		<label class="control-label" id="info"></label>
																	</div>
																</div>
																<div class="form-group">
																</div>
																<button type="submit" value="Guardar" class="btn btn-primary btn-lg" onClick="javascript:Modificar_Pag()">Guardar</button>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label class="control-label" >Numero de Telefono</label>
														<input class="form-control" id="telefono" type="textf"  value="<?php echo $telefono;?>" placeholder="ingrese su numero"/>																			
													</div>
													<div class="form-group">
														<label class="control-label" >Email</label>
														<input class="form-control" id="email" type="text"  value="<?php echo $email;?>" placeholder="ingrese su numero"/>																			
													</div>
													<div class="form-group">
														<label class="control-label" >Direccion</label>
														<input class="form-control" id="direccion" type="text"  value="<?php echo $direccion;?>" placeholder="ingrese su numero"/>																			
													</div>
													<div class="form-group">
													<label class="control-label" >Imagenes</label>
													<select id="drop_imagenes" class="form-control" >
															<option value="0">Imagenes</option>
															<option value="1">Banner 1</option>
															<option value="2">Banner 2</option>
															<option value="3">Banner 3</option>
															<option value="4">Logo</option>
															</select>
													</div>
													
																	<div class="form-group">
																		
																		<label class="control-label">Imagen</label>
																		<input type="hidden"  name="MAX_FILE_SIZE" value="30000000" />
																		<input name="subir_imagen" id="subir_imagen" type="file" />
																		</div>
																		<div class="form-group">
																		<button type="submit" name="submit" id="up_imagen" class ="btn btn-default">actualizar</button>
																		</div>
													<div class="form-group">
														<div class="service_grid">
															<div class="col-md-12 service_box">
																<a class="fancybox" id="im_box_img" href="" data-fancybox-group="gallery" title="" ><img src="" id="im_img" class="img-responsive" alt=""/></a>
															</div>
													
														</div>
													</div>
												
												</div>
										</div>
												
										<div class="tab-pane" id="crear_cat">
											<div class="col-lg-6">
											<h4>Crear Categoria</h4>
																<div class="form-group">
																			<label class="control-label" id="info">Nombre</label>
																			<input type="text"  class="form-control"  id="nombre_cat" name="nombre_cat" placeholder="Nombre Categoria">
																	</div>
															
																	<div class="form-group">
																		
																		<label class="control-label">Imagen</label>
																		<input type="hidden"  name="MAX_FILE_SIZE" value="30000000" />
																		<input name="fileToUpload" id="sortpicture" type="file" />
																		</div>
																		<div class="form-group">
																		<button type="submit" name="submit" id="submit" class ="btn btn-default">Crear</button>
																		</div>
																		
																	
															
																<div class="form-group">
																	<div class="text">
																		<label class="control-label" id="errorc"></label>
																	</div>
																</div>
																
											</div>
										</div>
												
										<div class="tab-pane" id="conf_art">
											<div class="col-lg-6">
											<h4>Crear  Articulo</h4>
												 
																<div class="form-group">
																	
																	
																	<label class="control-label">Nombre</label>
																		<input type="text"  class="form-control" id="nombre_art" name="nombre_art" placeholder="Nombre Articulo">
															
																</div>
																
																<div class="form-group">
																	
																
																	<label class="control-label">Codigo</label>
																		<input type="text"  class="form-control" id="code_art" name="code_art" placeholder="Codigo">
																
																
																
																	
																	<label class="control-label">Precio</label>
																		<input type="text"  class="form-control" id="price_art" name="price_art" placeholder="Precio">
																
																</div>
																
																<div class="form-group">
																<label class="control-label">Descripcion</label>
																<textarea class="form-control" id="descripcion_art" rows="4" placeholder="Descripcion del producto"></textarea> 
																</div>
																<div class="form-group">
																	<label class="control-label">Imagen</label>
																		<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
																		<input name="file_art" id="file_art" type="file" />
																</div>
																<div class="form-group">
																		<button type="submit" name="submit_art" id="submit_art" class ="btn btn-default">Crear</button>
																</div>
																
																<div class="form-group">
																	<div class="text">
																		<label class="control-label" id="errora"></label>
																	</div>
																</div>
										
											</div>
										</div>
										
										
										
										<div class="tab-pane" id="ce_art">
										<div class="col-lg-6">
											 <h4>Edicion de Articulos</h4>
													
															<div class="form-group">
														
															<select id="drop_articulos" class="form-control" >
															<option value="0">Articulos</option>
															<?php
																	$obj = new Coneccion();
																	echo $obj->servidor;
																	$result=$obj->GetArticulos();

																	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
																				echo "<option value=\"".$line["articulo"]."\">".$line["nombre"]."</option>\n";
																	}
																	mysql_free_result($result);
																?>
															</select>
															
															</div>
																	<div class= "form-group">
																	
																		
																			<label class="control-label">Nombre</label>
																			<input type="text" class="form-control" id="name_art" name="name_art" placeholder="Nombre Articulo" >
																		
																
																	</div>
																	<div class="form-group">
																	
																
																	<label class="control-label">Codigo</label>
																		<input type="text"  class="form-control" id="codigo_art" name="codigo_art" placeholder="Codigo">
																
																
																
																	
																	<label class="control-label">Precio</label>
																		<input type="text"  class="form-control" id="precio_art" name="precio_art" placeholder="Precio">
																		<input type="hidden" id="imagen_art_hidden">
																	</div>
																
																<div class="form-group">
																<label class="control-label">Descripcion</label>
																<textarea class="form-control" id="desc_art" name="desc_art" rows="4" placeholder="Descripcion del producto"></textarea> 
																</div>
																	<div class="form-group">
																	
																		<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
																		<input name="file_art2" id="file_art2" type="file" />
																		</div>
																	
																	<div class="form-group">
																	
																		<label class="control-label" id="error_art"></label>
																	
																	</div>
																	<div class="form-group">	
																	
																		<button type="submit" id="save_art" class ="btn btn-default">Guardar</button>		
																	
																		<button type="submit"  id="elim_art" class ="btn btn-danger" onClick="Eliminar_art()">Eliminar</button>	
																	</div>
																	
																	<div class="form-group">
																	<label class="control-label" > Asignar a Categoria</label>
																	
																		<select id="asigna_cat" class="form-control" >
																			<option value="0">Categorias</option>
																			
																			</select>
																		
																	</div>
																	<div class="form-group">
																		<button type="submit" id="asignar" class ="btn btn-default">Asignar</button>		
																	</div>	
																	
																	
																	<div class="form-group">
																	<label class="control-label" > Desasignar a Categoria</label>
																		<select id="desasigna_cat" class="form-control" >
																			<option value="0">Categorias</option>
																			
																			</select>
																			
																	</div>
																	<div class="form-group">
																	<button type="submit" id="desasignar" class ="btn btn-default">Desasignar</button>		</div>	
																	
												</div>
													<div class="col-lg-6">
													
													<div class="form-group">
													<div class="service_grid">
																		<div class="col-md-12 service_box">
																		<a class="fancybox" id="im_box_art" href="" data-fancybox-group="gallery" title="" ><img src="" id="im_art" class="img-responsive" alt=""/></a>
																		</div>
																		
																	</div>
													</div>
													</div>
												</div>
										<div class="tab-pane" id="crear_red">
											<div class="col-lg-6">
											<h4>Crear Redes</h4>
												
												<div class="form-group">
														<label class="control-label">Tipo</label>
															<select id="drop_redes" class="form-control" >
															<option value="0">Redes</option>
															<option value="1">Facebook</option>
															<option value="2">Twitter</option>
															<option value="3">Google +</option>
															<option value="4">Instagram</option>
															<option value="5">Linked In</option>
															<option value="6">Pinterest</option>
															<option value="7">Foursquare</option>
															</select>
																
												</div>
												<div class= "form-group">
																	
																			<label class="control-label">Nombre</label>
																			<input type="text" class="form-control" id="name_red" name="nombre_red" placeholder="Nombre Red" >
																	
												</div>
												
												<div class= "form-group">
																	
																			<label class="control-label">Enlace</label>
																			<input type="text" class="form-control" id="url_red" name="url_red" placeholder="Enlace Red" >
																	
												</div>
												
												<div class= "form-group">
																			<button type="submit" id="crear_red_soc" class ="btn btn-default">Crear</button>	</div>			
											</div>
										</div>
										<div class="tab-pane" id="ce_red">
											<div class="col-lg-6">
											<h4>Manejo de Redes</h4>
											
												<div class="form-group">
														<label class="control-label">Nombre</label>
															<select id="drop_redes_creadas" class="form-control" >
															<option value="0">Nombre Red</option>
															<?php 
															$obj = new Coneccion();
																	$result=$obj->Get_Redes();
																	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
																		
																				echo "<option value=\"".$line["red"]."\">".$line["nombre"]."</option>\n";
																	}
																	mysql_free_result($result);
															
															?>
															</select>
																
												</div>
												<div class= "form-group">
																	
																			<label class="control-label">Nombre</label>
																			<input type="text" class="form-control" id="nombre_red" name="nombre_red" placeholder="Nombre Red" >
																	
												</div>
												
												<div class= "form-group">
																	
																			<label class="control-label">Enlace</label>
																			<input type="text" class="form-control" id="ruta_red" name="ruta_red" placeholder="Enlace Red" >
																	
																	
												</div>
												<div class= "form-group">
														<label class="control-label">Tipo</label>
														<select id="drop_redes2" class="form-control" >
															<option value="0">Redes</option>
															<option value="1">Facebook</option>
															<option value="2">Twitter</option>
															<option value="3">Google +</option>
															<option value="4">Instagram</option>
															<option value="5">Linked In</option>
															<option value="6">Pinterest</option>
															<option value="7">Foursquare</option>
														</select>
												</div>
												
												<div class= "form-group">
														<button type="submit" id="guardar_red_soc" class ="btn btn-default">Guardar</button>
														<button type="submit" id="eliminar_red_soc" class ="btn btn-danger">Eliminar</button>																			</div>			
											</div>
										</div>
										<div class="tab-pane" id="ce_cat">
											 <div class="col-lg-6">
											 <h4>Edicion de Categorias</h4>
											
													
															<div class="form-group">
														
															<select id="ddlViewBy" class="form-control" >
															<option value="0">Categorias</option>
															<?php
																	$obj = new Coneccion();
																	echo $obj->servidor;
																	$result=$obj->GetCategorias();

																	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
																				echo "<option value=\"".$line["categoria"]."\">".$line["nombre_categoria"]."</option>\n";
																	}
																	mysql_free_result($result);
																?>
															</select>
														
															</div>
																	<div class= "form-group">
																	
																			<label class="control-label">Nombre</label>
																			<input type="text" class="form-control" id="name_cat" name="nombre_cat" placeholder="Nombre Categoria" >
																	
																	</div>
																	
																	<div class="form-group">
																	
																		<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
																		<input name="fileToUpload" id="filecambioscat" type="file" />
																	
																	</div>
																	<div class="form-group">
																	
																		<label class="control-label" id="error_cat"></label>
																
																	</div>
																	<div class="form-group">
																	
																	
																		<button type="submit" id="save_cat"  class ="btn btn-default">Guardar</button>
																
															
																		<button type="submit"  id="elim_cat" class ="btn btn-danger" onClick="Eliminar_Cat()">Eliminar</button>
																	
																	</div>
													</div>		
												
													<div class="form-group">
													
													
													
													</div>
															
												<div class="col-lg-6">
													<div class="form-group">
																			<div class="service_grid">
																		<div class="col-md-12 service_box">
																		<a class="fancybox" id="im_box_cat" href="" data-fancybox-group="gallery" title="" ><img src="" id="im_cat" class="img-responsive" alt=""/></a>
																		</div>
																		
																	</div>
													</div>
													</div>
												</div>		
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			</div>			
			</div>
                </div>
                <!-- /.row -->
		
            <!-- /.container-fluid -->
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../admin/dist/js/sb-admin-2.js"></script>
	<script>
		$("#drop_redes_creadas").change(function () {
				var end = this.value;
				var request = $.ajax({
				  type: "POST",
				  dataType: "json",
				  url: "funciones.php", //Relative or absolute path to response.php file
				  data: {action: "datos_red",red: end},
				  success: function(data) {
					  
					document.getElementById("nombre_red").value=data["nombre"];
					document.getElementById("ruta_red").value=data["enlace"];
					$("#drop_redes2").val(data["tipo"]);
				  }
				});
				request.fail(function (jqXHR, textStatus, errorThrown) {
				alert(textStatus +"  "+ errorThrown);});	
				
			});
	</script>
		<script>
		$("#drop_imagenes").change(function () {
				var end = this.value;
				var request = $.ajax({
				  type: "POST",
				  dataType: "json",
				  url: "funciones.php", //Relative or absolute path to response.php file
				  data: {action: "datos_img",imagen: end},
				  success: function(data) {
					$("#im_img").attr("src",data["imagen"]);
					$("#im_box_img").attr("href",data["imagen"]);
				  }
				  });
				 request.fail(function (jqXHR, textStatus, errorThrown) {
				alert(textStatus +"  "+ errorThrown);});	
				
			
		});
	</script>
	<script>
		$("#drop_articulos").change(function () {
				var end = this.value;
				var request = $.ajax({
				  type: "POST",
				  dataType: "json",
				  url: "funciones.php", //Relative or absolute path to response.php file
				  data: {action: "datos_art",articulo: end},
				  success: function(data) {
					  
					document.getElementById("name_art").value=data["nombre"];
					document.getElementById("precio_art").value=data["precio"];
					document.getElementById("desc_art").value=data["detalle"];
					document.getElementById("codigo_art").value=data["articulo"];
					document.getElementById("imagen_art_hidden").value=data["imagen"];
					
					$("#asigna_cat").find('option').remove().end().append(data["noasignada"]).val('0');
					$("#desasigna_cat").find('option').remove().end().append(data["asignada"]).val('0');
					
					$("#im_art").attr("src",data["imagen"]);
					$("#im_box_art").attr("href",data["imagen"]);
					
				  }
				});
				request.fail(function (jqXHR, textStatus, errorThrown) {
				alert(textStatus +"  "+ errorThrown);});	
				
			});
	</script>
	 <script type="text/javascript">
        $(document).ready(function () {
            $('.fancybox').fancybox();
        });
    </script>
	<script>
	$("#ddlViewBy").change(function () {
			var end = this.value;
			var request = $.ajax({
			  type: "POST",
			  dataType: "json",
			  url: "funciones.php", //Relative or absolute path to response.php file
			  data: {action: "datos",categoria: end},
			  success: function(data) {
				document.getElementById("name_cat").value=data["nombre_categoria"];
				$("#im_cat").attr("src",data["imagen"]);
				$("#im_box_cat").attr("href",data["imagen"]);
			  }
			});
			request.fail(function (jqXHR, textStatus, errorThrown) {
			alert(textStatus +"  "+ errorThrown);});	
		});
	</script>

	<script>
		function Modificar_Pag(){
			var vis = document.getElementById('vision').value;
			var mis = document.getElementById('mision').value;
			var slog = document.getElementById('slogan').value;
			var his = document.getElementById('historia').value;
			var msg = document.getElementById('mensaje').value;
			var des = document.getElementById('descripcion').value;
			var em = document.getElementById('email').value;
			var dir = document.getElementById('direccion').value;
			var tel = document.getElementById('telefono').value;
			
			var request = $.ajax({
			  type: "POST",
			  dataType: "json",
			  url: "funciones.php", //Relative or absolute path to response.php file
			  data: {action: "mod_pag",vision: vis, mision: mis,slogan: slog,historia: his,descripcion: des,mensaje: msg,email: em, direccion: dir, telefono: tel },
			  success: function(data) {
				if(data["result"]=="1"){
					$("#info").html(
						"Cambios realizados correctamente"	
					);
				
				}else {
					$("#info").html(
					  "Error, intente de nuevo"
					);
				}
			  }
			});
			request.fail(function (jqXHR, textStatus, errorThrown) {
			alert(textStatus +"  "+ errorThrown);});		
		}
	</script>

	<script>
		function Eliminar_Cat(){
			var cat = document.getElementById('ddlViewBy').value;
			var request = $.ajax({
			  type: "POST",
			  dataType: "json",
			  url: "funciones.php", //Relative or absolute path to response.php file
			  data: {action: "elim_cat",categoria: cat},
			  success: function(data) {
					if(data["result"]=="1"){
						
							location.reload();
					}else if(data["result"]=="2"){
						 $("#error_cat").html(
							"Error, intente de nuevo"
						);
						
					}else {
						 $("#error_cat").html(
							"La categoria tiene articulos asignados, no se puede eliminar"
						);
					}
				}
			});
			request.fail(function (jqXHR, textStatus, errorThrown) {
			alert(textStatus +"  "+ errorThrown);});		
		}
	</script>
	<script>
		function Eliminar_art(){
			var art = document.getElementById('drop_articulos').value;
			var request = $.ajax({
			  type: "POST",
			  dataType: "json",
			  url: "funciones.php", //Relative or absolute path to response.php file
			  data: {action: "elim_art",articulo: art},
			  success: function(data) {
				 if(data["result"]=="1"){
							alert("Cambios realizados correctamente");
					 window.location = "../admin.php";
				 }else{
					 $("#error_art").html(
							"Error,articulo se encuentra asignado a categoria"
						); 
				 }
				}
			});
			request.fail(function (jqXHR, textStatus, errorThrown) {
			alert(textStatus +"  "+ errorThrown);});		
		}
	</script>
	<script>
		$('#submit').on('click', function() {
		var file_data = $('#sortpicture').prop('files')[0];   
		var form_data = new FormData();      
		var cat = document.getElementById('nombre_cat').value;
		form_data.append('file', file_data);
		form_data.append('nombre_cat', cat);
		form_data.append('action', "crear_cat");
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados");
						location.reload();
					}else{
						$("#errorc").html(
							data+"Categoria ya existe"
						);
					}
					}
		 });
	});
	</script>
	<script>
		$('#submit_art').on('click', function() {
		var file_data = $('#file_art').prop('files')[0];   
		var form_data = new FormData();      
		var art = document.getElementById('nombre_art').value;
		var codigo = document.getElementById('code_art').value;
		var precio = document.getElementById('price_art').value;
		var descripcion = document.getElementById('descripcion_art').value;
		
		form_data.append('file', file_data);
		form_data.append('nombre', art);
		form_data.append('codigo', codigo);
		form_data.append('precio', precio);
		form_data.append('descripcion', descripcion);
		form_data.append('action', "crear_art");
		
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
						
					if(data==1)
					{
						alert("Cambios Realizados");
						window.location = "../admin.php";
					}else{
						$("#errorc").html(
							data+" "+"Articulo ya existe"
						);
					}
					}
		 });
	});
	</script>
	<script>
		$('#up_imagen').on('click', function() {
		var file_data = $('#subir_imagen').prop('files')[0];   
		var form_data = new FormData();      
		var img = document.getElementById('drop_imagenes').value;
		form_data.append('file', file_data);
		form_data.append('imagen',img);
		form_data.append('action', "cambiar_img");
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados");
						location.reload();
					}else{
						alert("Error"+data);
					}
					}
		 });
	});
	</script>
		<script>
		$('#save_cat').on('click', function() {
		var file_data = $('#filecambioscat').prop('files')[0];
		var categoria= document.getElementById('ddlViewBy').value;		
		var form_data = new FormData();      
		var cat = document.getElementById('name_cat').value;
		
		form_data.append('file', file_data);
		form_data.append('nombre_cat', cat);
		form_data.append('action', "editar_cat");
		form_data.append('categoria', categoria);
		
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados");
						location.reload();
					}else{
						$("#error_cat").html(
							data+"Categoria ya existe"
						);
					}
					}
		 });
	});
	</script>
	
	<script>
		$('#save_art').on('click', function() {
		var file_data = $('#file_art2').prop('files')[0];
		var articulo= document.getElementById('drop_articulos').value;		
		var nombre = document.getElementById('name_art').value;
		var descripcion = document.getElementById('desc_art').value;
		var precio = document.getElementById('precio_art').value;

		var form_data = new FormData();     
		
		form_data.append('file', file_data);
		form_data.append('nombre', nombre);
		form_data.append('action', "cambio_art");
		form_data.append('articulo', articulo);
		form_data.append('descripcion', descripcion);
		form_data.append('precio', precio);
		
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados XD");
						window.location.reload();
					}else{
						$("#error_art").html(
							data+"Categoria ya existe"
						);
					}
					}
		 });
	});
	</script>

	<script>
		$('#asignar').on('click', function() {
		var categoria= document.getElementById('asigna_cat').value;		
		var articulo= document.getElementById('drop_articulos').value;
		var form_data = new FormData();      
		form_data.append('action', "asignar");
		form_data.append('categoria', categoria);
		form_data.append('articulo', articulo);
		alert(articulo+" "+ categoria);
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados");
						location.reload();
					}else{
					
							alert(data+"Categoria ya existe");
					
					}
					}
		 });
	});
	</script>
	
		<script>
		$('#desasignar').on('click', function() {
		var categoria= document.getElementById('desasigna_cat').value;		
		var articulo= document.getElementById('drop_articulos').value;
		var form_data = new FormData();      
		form_data.append('action', "desasignar");
		form_data.append('categoria', categoria);
		form_data.append('articulo', articulo);
		alert(articulo+" "+ categoria);
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados");
					location.reload();
					}else{
					
							alert(data+"Categoria ya existe");
					
					}
					}
		 });
	});
	</script>
	
	<script>
		$('#crear_red_soc').on('click', function() {
		var nombre= document.getElementById('name_red').value;		
		var red= document.getElementById('drop_redes').value;
		var url= document.getElementById('url_red').value;
		
		var form_data = new FormData();      
		form_data.append('action', "crear_red");
		form_data.append('red', red);
		form_data.append('url', url);
		form_data.append('nombre', nombre);
		
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados");
						
					}else{
					
							alert(data+"Ya existe una red con ese nombre");
					
					}
					}
		 });
	});
	</script>
	
	<script>
		$('#guardar_red_soc').on('click', function() {
		var nombre= document.getElementById('nombre_red').value;		
		var red= document.getElementById('drop_redes_creadas').value;
		var url= document.getElementById('ruta_red').value;
		var tipo= document.getElementById('drop_redes2').value;
		
		var form_data = new FormData();      
		form_data.append('action', "mod_red");
		form_data.append('red', red);
		form_data.append('url', url);
		form_data.append('nombre', nombre);
		form_data.append('tipo', tipo);
		
		
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados");
						
					}else{
					
							alert(data+"Ya existe una red con ese nombre");
					
					}
					}
		 });
	});
	</script>
	<script>
		$('#eliminar_red_soc').on('click', function() {
		var red= document.getElementById('drop_redes_creadas').value;
		var form_data = new FormData();      
		form_data.append('action', "elim_red");
		form_data.append('red', red);
	
		
		$.ajax({
					url: 'funciones.php', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
					if(data==1)
					{
						alert("Cambios Realizados");
						
					}else{
					
							alert(data+"Error al eliminar");
					
					}
					
					}
		 });
	});
	</script>
	<script type="text/javascript" src="../js/jquery.fancybox.js"></script>
</body>

</html>
