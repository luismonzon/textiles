<?php 
	include 'footer.php';
	Encabezado();
	$banner1="";
	$banner2="";
	$banner3="";
	
	?>

	<body>
	<div class="header">
		<div class="col-xs-4">
		  <div class="logo">
		  <?php
		  
						$obj = new Coneccion();
						$result=$obj->Get_Empresa_Info();
						$line = mysql_fetch_array($result, MYSQL_ASSOC);
						$banner1=$line["portada1"];
						$banner2=$line["portada2"];
						$banner3=$line["portada3"];
						
						echo '<a href="index.php"><img src="'.$line["Logo"].'" alt=""/></a>';
						
						mysql_free_result($result);
						
									
						
						
						
						
						
						
		  ?>
		  
		  </div>
		</div>
		<div class="col-xs-8 header_right">
		  <span class="menu"></span>
				<div class="top-menu">
					<ul>
						<li><a class="active scroll" href="index.php"><i class="fa fa-home"> </i>Inicio</a></li>
						<li><a href="about.php"><i class="fa fa-star"> </i> Acerca de Nosotros</a></li>
						<li><a href="categorias.php?pag=1"><i class="fa fa-thumbs-up"> </i>Categorias</a></li>
						<li><a href="contact.php"><i class="fa fa-envelope-o"> </i>Contacto</a></li>
						<div class="clearfix"></div>
					</ul>
				 </div>
				<!-- script for menu -->
					<script>
					$( "span.menu" ).click(function() {
					  $( ".top-menu" ).slideToggle( "slow", function() {
						// Animation complete.
					  });
					});
				</script>
				<!-- script for menu -->
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="slider">

		  <div class="callbacks_container">
			  <ul class="rslides" id="slider">
				<li><img src="<?php echo $banner1; ?>" class="img-responsive" alt=""/>
				  <div class="banner_desc">
					<div class="container">
					  <?php
						
						$obj = new Coneccion();
						$result=$obj->Get_Empresa_Info();
						while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
						{
									echo "<h1>". $line["Descripcion"]."</h1>\n";
									echo "<h2>". $line["mensaje"]."</h2>\n";
						}
						mysql_free_result($result);
					  ?>
					</div>
					<div class="details">
					 <div class="container">
					 <div class="col-xs-10 dropdown-buttons">            			
						<div class="col-xs-4">
						</div>
						<form action="articulos.php" method="GET"> 
							<div class="col-xs-4 dropdown-button">
								<div class="section_room">
								<input type="hidden" value="1" id="pag" name="pag">
								 <select id="id_cat" name="id_cat" onchange="change_country(this.value)" class="frm-field required">
								 <option value="null">Categorias</option>
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
							</div>
							 <div class="col-xs-4">
							</div>
					  
						   <div class="col-xs-2 submit_button"> 
								 <input type="submit" value="Buscar">
							  
						   </div>
					   </form>
					   
					   <div class="clearfix"> </div>
					</div>
				   </div>
				  </div>
				</li>
				<li><img src="<?php echo $banner2; ?>" class="img-responsive" alt=""/>
				 <div class="banner_desc">
					<div class="container">
					  <?php
						
						$obj = new Coneccion();
						echo $obj->servidor;
						$result=$obj->Get_Empresa_Info();

						while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
									echo "<h1>". $line["Descripcion"]."</h1>\n";
									echo "<h2>". $line["mensaje"]."</h2>\n";
						}
						mysql_free_result($result);
					  ?>
					</div>
					<div class="details">
					 <div class="container">
					<div class="col-xs-10 dropdown-buttons">            			
											<div class="col-xs-4">
						</div>
						
						<form action="articulos.php" method="GET"> 
							<div class="col-xs-4 dropdown-button">
								<div class="section_room">
								<input type="hidden" value="1" id="pag" name="pag">
								 <select id="id_cat" name="id_cat" onchange="change_country(this.value)" class="frm-field required">
								 <option value="null">Categorias</option>
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
							</div>
							 <div class="col-xs-4">
							</div>
					  
						   <div class="col-xs-2 submit_button"> 
								 <input type="submit" value="Buscar">
							  
						   </div>
					   </form>
					   <div class="clearfix"> </div>
					</div>
				   </div>
				   </div>
				</li>
				<li><img src="<?php echo $banner3; ?>" class="img-responsive" alt=""/>
				  <div class="banner_desc">
					<div class="container">
					   <?php
						
						$obj = new Coneccion();
						echo $obj->servidor;
						$result=$obj->Get_Empresa_Info();

						while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
									echo "<h1>". $line["Descripcion"]."</h1>\n";
									echo "<h2>". $line["mensaje"]."</h2>\n";
						}
						mysql_free_result($result);
					  ?>
					</div>
					<div class="details">
					 <div class="container">
				<div class="col-xs-10 dropdown-buttons">            			
						<div class="col-xs-4">
						</div>
						<form method="GET" action="articulos.php"> 
							<div class="col-xs-4 dropdown-button">
								<div class="section_room">
								 <input type="hidden" value="1" id="pag" name="pag">
								 <select name="id_cat" onchange="change_country(this.value)" class="frm-field required">
								 <option value="null">Categorias</option>
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
							</div>
							 <div class="col-xs-4">
							</div>
					  
						   <div class="col-xs-2 submit_button"> 
								 <input type="submit" value="Buscar">
						   </div>
					   </form>
					   <div class="clearfix"> </div>
					</div>
					</div>
					</div>
				 </li>
			  </ul>
		 </div>
	</div>
	
	<div class="content_top">
	   <div class="container">
		  <h4 class="m_3">Categorias</h4>
		  <div class="grid_1">
		  
		  <?php 
		  $obj=new Coneccion();
		  $result = $obj->Get_8_Categorias(8);
		  $count =0;
		  while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
				{
						 $count++;
						  echo '<div class="col-md-3 box_1">'."\n";
						  echo '<a href="articulos.php?pag=1&id_cat='.$line['categoria'].'">'."\n".'<img src="'.$line["imagen"].'" class="img-responsive" alt=""/></a>'."\n"	;						
						  echo '<div class="box_2">'."\n";
						  echo '<div class="special-wrap"><div class="hot_offer"><span class="m_11">'.$count.'</span>'."\n".' </div>'."\n".'</div>'."\n".' </div>'."\n";
						  echo '<div class="box_3">';
						  echo '<h3><a href="articulos.php?pag=1&id_cat='.$line['categoria'].'">'.$line['nombre_categoria'].'</a></h3>';
						  echo '<div class="boxed_mini_details clearfix">';
						  echo '</div>'."\n".' </div> '."\n".'</div>'."\n" ;
						  
				}
		  mysql_free_result($result);
			  
		  ?>
						
			<div class="clearfix"> </div>
		</div>
		   <div class="content_bottom">
			<div class="clearfix"> </div>
			</div>
		  
		  </div>
		 </div>
		  <?php 
		  Footer($telefono,$direccion,$email);
		  ?>
		 
	</body>
</html>		

