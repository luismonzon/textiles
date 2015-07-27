<?php 

	include 'footer.php';
	 
	Encabezado();
	?>
	

<body>
<div class="header">
	<div class="col-xs-4">
	  <div class="logo">
		<a href="index.html"><img src="images/logo.png" alt=""/></a>
	  </div>
	</div>
	<div class="col-xs-8 header_right">
	  <span class="menu"></span>
			<div class="top-menu">
					<ul>
						<li><a  href="index.php"><i class="fa fa-home"> </i>Inicio</a></li>
						<li><a class="active scroll" href="about.php"><i class="fa fa-star"> </i> Acerca de Nosotros</a></li>
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
<div class="about_top">
    <div class="container">
        <div class="about">
        	<div class="col-md-8">
        		<h3 class="m_3">Historia<h3>
        		<div class="section_group"> 
			      	<div class="col_1_of_2 s
			      	</div>
			        <div class="col_1_of_2 span_1_of_2">
					
						<?php 
						$obj = new Coneccion();
						echo $obj->servidor;
						$result=$obj->Get_Empresa_Info(1);

						$line = mysql_fetch_array($result, MYSQL_ASSOC); 
							echo "<h4>\"". $line["Slogan"]."\"</h4>\n";
							echo "<p>". $line["Historia"]."</p>\n";
						
						mysql_free_result($result);
						?>
			      	
					</div>
			        <div class="clearfix"> </div>
                </div>
        	</div>
        	
        	<div class="clearfix"> </div>
        </div>
        <div class="about_grid1">
        	<h3>Conoce más</h3>
        	<div class="col-md-4">
        		<div class="list styled custom-list">
				  <ul>
					 <li><span class="dropcap">1</span>  
					   <div class="about_desc">
					 	<h5>Mision</h5>
						<?php 
						echo "<p>". $line["Mision"]."</p>\n";
						?>
						</div>
					 </li>
				  </ul>
				</div>
        	</div>
        	<div class="col-md-4">
        		<div class="list styled custom-list">
				  <ul>
					 <li><span class="dropcap">2</span>  
					   <div class="about_desc">
					 	<h5>Vision</h5>
						<?php
						echo "<p>". $line["Vision"]."</p>\n";
						?>
					 	</div>
					 </li>
				  </ul>
				</div>
        	</div>
        	<div class="col-md-4">
        		<div class="list styled custom-list">
				  <ul>
					 <li><span class="dropcap">3</span>  
					   <div class="about_desc">
					 	<h5>Slogan</h5>
						<?php
							echo "<p>". $line["Slogan"]."</p>\n";
						?>
						</div>
					 </li>
				  </ul>
				</div>
        	</div>
        	<div class="clearfix"> </div>
        </div>

	</div>
</div>
	<?php 
	 Footer();
	 ?>
</body>
</html>		