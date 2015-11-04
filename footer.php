<?php 
include 'coneccion.php';



	function Footer(){
 ?>

<footer class="footer">
		 <div class="container">
    <div class="grid_7">
        <div class="col-md-4 box_4">
		
             <ul class="social-network social-circle">
                        <?php 
						$obj = new Coneccion();
						$result=$obj->Get_Redes();
						while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
						{
							$tipo="";
							$clase="";
							
							if($line["tipo"]==1){
								$tipo="fa fa-facebook";
								$clase="icoFacebook";
							}
							else if($line["tipo"]==2){
								$tipo="fa fa-twitter";
								$clase="icoTwitter";
							}
							else if($line["tipo"]==3){
								$tipo="fa fa-google-plus";
								$clase="icoGoogle";
							}
							else if($line["tipo"]==4){
								$tipo="fa fa-instagram";
								$clase="icoLinkedin";
							}
							else if($line["tipo"]==5){
								$tipo="fa fa-Linkedin";
								$clase="icoLinkedin";
							}
							else if($line["tipo"]==6){
								$tipo="fa fa-Pinterest";
								$clase="icoGoogle";
							}
							else if($line["tipo"]==7){
								$tipo="fa fa-foursquare";
								$clase="icoGoogle";
							}
							
							echo "<li><a href=\"http://".$line["enlace"]."\" class=\"".$clase."\" ><i class=\"".$tipo."\"></i></a></li>";
									
						}
						mysql_free_result($result);
						?>
						
                    </ul>
        </div>
		<?php 
			$obj = new Coneccion();
		$result=$obj->Get_Empresa_Info();
		$line = mysql_fetch_array($result, MYSQL_ASSOC);
		$direccion=$line["direccion"];
		$telefono=$line["telefono"];
		$email=$line["email"];
		mysql_free_result($result);
		?>
        <div class="col-md-4">
            <address class="footer-addr">
                <?php
				echo $direccion;
				?>
				<br>
                E-MAIL:
                <a href="#"><?php echo $email; ?></a>
                <div class="phone">
                    <span>(502)</span><?php echo $telefono; ?>
                </div>
            </address>
        </div>
		<?php 
		
		 $obj=new Coneccion();
		  $result = $obj->Get_8_Categorias(10);
		  $count =0;
		  while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
				{
						 
						  if($count==0){
							echo '<div class="col-md-2">'."\n";
							echo '<ul class="list_2">'."\n";
							  
						  }else if($count==5){
							echo '  </ul>'."\n";
							echo '</div>'."\n";
							echo '<div class="col-md-2">'."\n";
							echo '<ul class="list_2">'."\n";
						  }
						  
						  echo '<li>'."\n";
						  echo '<a href="articulos.php?pag=1&id_cat='.$line["categoria"].'">'.$line["nombre_categoria"].'</a>'."\n";
						  echo '</li>'."\n";
						  if($count==9){
							echo '  </ul>'."\n";
							echo '</div>'."\n";
						  }
						  $count++;
				}
		  mysql_free_result($result);
		
		?>
        <div class="clearfix"> </div>
    </div>
    <div class="copy">
        <p>© 2015 Design by W3Layout</p>
		<p>Development by <a href="http://rsolutions.comyr.com">RSolutions</a></p>
    </div>
</div>
</footer>

	<?php 
	} 
	
	
	function Encabezado (){
	?>
	
<html>
<head>
    <title>Empresa de Textiles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">

        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="css/style_social.css">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet:100,300,400,500,600,700,800,900' type='text/css'>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
    <script src="js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.fancybox').fancybox();
        });
    </script>
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true   // 100% fit in a container
            });
        });
    </script>
</head>

	
	<?php
	}
	?>