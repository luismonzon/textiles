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
						<li><a href="about.php"><i class="fa fa-star"> </i> Acerca de Nosotros</a></li>
						<li><a href="categorias.php?pag=1"><i class="fa fa-thumbs-up"> </i>Categorias</a></li>
						<li><a class="active scroll" href="contact.php"><i class="fa fa-envelope-o"> </i>Contacto</a></li>
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
       	 <h1 class="blog_head">Contacto</h1>
		 <?php 
			$obj = new Coneccion();
		$result=$obj->Get_Empresa_Info();
		$line = mysql_fetch_array($result, MYSQL_ASSOC);
		$direccion=$line["direccion"];
		$telefono=$line["telefono"];
		$email=$line["email"];
		mysql_free_result($result);
		?>
			<div class="contact">
				<div class="col-md-4 contact_left">
					<h3>Informacion de Contacto</h3>
					<p>Direccion: <?php echo $direccion;?></p>
					<p>Email: <?php echo $email;?></p>
					<p>Telefono: <?php echo $telefono;?></p>
				</div>
				<div class="col-md-8 contact_right">
					<h3>Datos</h3>
					<form method="POST" action="mail.php">
									<div class="text">
										<div class="text-fild">
											<span>Nombre:</span>
											<input type="text" class="text" value="Tu Nombre" id="nombre" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Name here';}">
										</div>
										<div class="text-fild">
											<span>Email:</span>
											<input type="text" class="text" value="Tu Email" id="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email here';}">
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="msg-fild">
											<span>Asunto:</span>
											<input type="text" class="text" value="Tu Asunto" id="asunto" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Subject here';}">
											
									</div>
									<div class="message-fild">
											<span>Message:</span>
											<textarea> </textarea>
									</div>
									<label class="btn1 btn-8 btn-8c"><input type="submit" value="Send"></label>
				
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	     <div class="grid_4">
               
        </div>
	 </div>
	</div>
	
<?php Footer(); ?>