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
<div class="about_top">
    <div class="container">
       <div class="about">
       	 
		 <?php 
		 $obj = new Coneccion();
		 $val=$_REQUEST['id_cat'];
		 $consulta  = $obj->Get_Articulos_Categoria($val);
		 $counter=0;
		 $rango =8*$_REQUEST['pag'];
		 $inicio=8*($_REQUEST['pag']-1);
		 while ($line = mysql_fetch_array($consulta, MYSQL_ASSOC)) 
						{if($counter<$rango&&$counter>=$inicio){
							if($counter%4==0){
								if($counter!=0){
									echo "<div class=\"clearfix \"> </div>";
									echo "</div>\n";}
								echo "<div class=\"service_grid\">\n";
							}
									echo "<div class=\"col-md-3 service_box\">\n";
									echo "<a class=\"fancybox\" href= '".$line['imagen']. "' data-fancybox-group=\"gallery\" title=\" ".$line['nombre']." \"><img src=\"".$line['imagen']."\" class=\"img-responsive\" alt=\"\"/><span> </span></a>\n";
									echo "<h3>".$line['nombre']."</h3>\n";
									echo "<p>".$line["descripcion"]."</p>\n";
									echo "<p> Precio: ".$line["precio"]."</p>";
									echo "</div>\n";
							}	
							$counter++;
						}
		 mysql_free_result($consulta);
		 ?>
		
	       	
       
	   </div>
	   </div>
	   </div>
  <div class="about_top">
<div class="col-md-1">
</div>
<div class="form-group">
			<nav>
			  
			  <ul class="pagination">
			  <?php 
			  $indice=1;
			  $paginas=round($counter/8)+1;
			  while($indice<=$paginas){
				echo '<li ><a href="articulos.php?id_cat='.$val.'&pag='.$indice.'">'.$indice.'<span class="sr-only"></span></a></li>';
				 $indice++;
			  }
			  ?>
				
			  </ul>
			</nav>
	  </div>
</div>
<?php 

Footer();
?>
</body>
</html>
