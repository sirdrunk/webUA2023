<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  
	<!-- Specific for each page -->
	<title>Estado del Servidor - Ultima Alianza (UA)</title>
	<meta content="Servidor español de Ultima Online (UO), ¡Bienvenido a Ultima Alianza! (UA)" name="description">
	<meta content="mmorpg,rol,ultima,online,uo,ua,juego,servidor,free,gratuito,privado,sphere,sphereserver,mago,caballero,paladin,nigromante,skills,stats,pvp,pvm,quests,misiones,recompensas,british,osi,uoassist,razor,easyuo,uoam,runuo,uofiddler,server,spanish,centred,centred+" name="keywords">
	<!-- End Specific for each page -->
  
	<meta http-equiv="content-type" content="text/html; utf-8" />
	<meta http-equiv="content-language" content="es" />
	<meta name="distribution" content="global" />
	<meta name="revisit-after" content="14 days" />
	<meta name="copyright" content="Ultima Alianza" />
	<meta name="robots" content="FOLLOW,INDEX" />
  
	<meta property="og:title" content="Ultima Alianza - Servidor español de Ultima Online" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://ultima-alianza.com" />
	<meta property="og:description" content="Servidor español de Ultima Online, ¡Bienvenido a Ultima Alianza!" />
	<meta property="og:site_name" content="Ultima Alianza" />
	<meta property="og:image" content="https://ultima-alianza.com/images/logo.png" />
  
  
	<meta name="twitter:card" content="Ultima Alianza - Servidor español de Ultima Online" />
	<meta name="twitter:description" content="Servidor español de Ultima Online, ¡Bienvenido a Ultima Alianza!" />
	<meta name="twitter:site" content="@uasphere" />
	<meta name="twitter:title" content="Ultima Alianza" />
	<meta name="twitter:url" content="https://ultima-alianza.com" />
  
	<!-- Favicons -->
	<link href="assets/img/logo/ua.png" rel="icon">
  
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
  
	<!-- =======================================================
	* Template Name: Gp - v4.10.0
	* Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
  
	<script type="259ecbfce34d0135505f60e2-text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-592757-1', 'auto');
	  ga('send', 'pageview');
	</script>


	<link href="assets/css/datatables.min.css" rel="stylesheet">
	<script src="assets/js/jquery-3.7.1.min.js"></script>
	<script src="assets/js/datatables.js"></script>
	<script type="text/javascript" class="init">
		$(document).ready( function () {
			$('#estadisticas').DataTable({
				paging: false,
				searching: false,
				info: false,
				"ordering": false, // Desactiva el ordenamiento globalmente
				"columnDefs": [
					{ "orderable": false, "targets": "_all" } // Desactiva el ordenamiento en todas las columnas
				]
			});

			$('#paises').DataTable({
				paging: false,
				searching: false,
				info: false,
				"ordering": false, // Desactiva el ordenamiento globalmente
				"columnDefs": [
					{ "orderable": false, "targets": "_all" } // Desactiva el ordenamiento en todas las columnas
				]
			});

			$('#facciones').DataTable({
				paging: false,
				searching: false,
				info: false
			});
			
			$('#players1').DataTable({
				paging: false,
				searching: false,
				info: false
			});

			$('#players2').DataTable({
				paging: false,
				searching: false,
				info: false
			});
		} );
	</script>
  
	<script src="assets/js/components.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <ua-header current="contacta" inner="true"></ua-header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="pt-3">Estado del Servidor</h2>
          <ol>
            <li><a href="index.html">Inicio</a></li>
            <li>Estado del Servidor</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

	<?php
		$hostname = "localhost";
		$username = "uasphere";
		$password = "wopiwopi";
		$database = "uasphere";

		$link = mysqli_connect($hostname,$username,$password);
		mysqli_select_db($link, $database);

		function iif($var,$check=false){
			if (empty($var))
				return "";
			if (is_numeric($var) && $check)
				return "'$var";
				return $var;
			}

			function estado_fortaleza($var){
				if ($var==0)
					return '<font color="#0CFF00">Conquistable</font>';
				else if($var==1)
					return '<font color="#FFC600">Asediándola</font>';
				else
					return '<font color="#848484">Transición</font>';
			}
	?>

    <section class="inner-page">
      	<div class="container">

			<table id="estadisticas" class="mt-4 table table-striped table-bordered">
				<thead>
					<tr>
						<th colspan="2">
							<img src='assets/img/status/estadisticas.png' />  Estadísticas 
						</th>
					</tr>
					<tr class="d-none">
						<th>Descripción</th>
						<th>Número</th>
					</tr>
				</thead>
				<tbody>
                    <?php
						$query = "select * from estadisticas";
						$result = mysqli_query($link, $query);

						$row= mysqli_fetch_array($result);
                        echo '<tr>';
                            echo '<td><img src="assets/img/status/personajes.gif"> Personajes</td>';
						    echo '<td class="dt-type-numeric">' .$row['npcs']. '</td>';
						echo '</tr>';

                        echo '<tr>';
                            echo '<td><img src='assets/img/status/objetos.gif'> Objetos</td>';
                            echo '<td class="dt-type-numeric">' .$row['items']. '</td>';
                        echo '</tr>';
					
						echo '<tr>';						
                            echo '<td><img src='assets/img/status/clanes.png'> Clanes</td>';
                            echo '<td class="dt-type-numeric">' .$row['guilds']. '</td>';
                        echo '</tr>';
					
                        echo '<tr>';
                        echo '<td><img src='assets/img/status/clientes.png'> Clientes</td>';
                        echo '<td class="dt-type-numeric">' .$row['clients']. '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td><img src='assets/img/status/memoria.gif'> Memoria Usada</td>';
                        echo '<td class="dt-type-numeric">' .$row['mem']. '</td>';
                        echo '</tr>';
                    ?>	
				</tbody>
			</table>

            <?php
                mysqli_free_result($result);

                $query = "select COUNT(*) as cuantos,pais from clientes group by pais order by cuantos DESC";
                $result = mysqli_query($link, $query);
                $cuantos=mysqli_num_rows($result);
                $cuantos=$cuantos*2;
            ?>

			<table id="paises" class="mt-4 table table-striped table-bordered">
				<thead>
					<tr>
						<th colspan="2">
							<img src='assets/img/status/buscar.png'> Jugadores conectados desde...
						</th>
					</tr>
					<tr  class="d-none">
						<th>País</th>
						<th>Jugadores</th>
					</tr>
				</thead>
				<tbody>
                    <?php
						$contador=0;
						while ($row= mysqli_fetch_array($result)) {
							if ($contador==0 || $contador==10)
                            echo '<tr>';
                                echo '<td><img src="assets/img/banderas/' .$row['pais']. '.png" title="' .$row['pais']. '"></td>';
                                echo '<td class="dt-type-numeric">' .$row['cuantos']. '</td>';
                            echo '</tr>';
                        }            
                        mysqli_free_result($result);
                    ?>
				</tbody>
			</table>

            

			<table id="facciones" class="mt-4 table table-striped table-bordered">
				<thead>
					<tr>
						<th>
							Facción 
							<img src='assets/img/status/ali.gif'> 
							<img src='assets/img/status/corsa.png'> 
							<img src='assets/img/status/gn.gif'>
						</th>
						<th>Puntos <img src='assets/img/status/puntos.png'></th>
						<th>Fortalezas <img src='assets/img/status/asedio.png'></th>
					</tr>
				</thead>
				<tbody>
                    <?php

                        $query = "select * from estadisticas_faccion";
                        $result = mysqli_query($link, $query);
                        $rows = 1;

                        $query2 = "select *,estado_fortalezas.nombre as fnombre from estadisticas_faccion right join estado_fortalezas using(id_faccion) order by id_faccion ASC";
                        $result2 = mysqli_query($link, $query2);
                        $rows2 = 1;

                        while ($row= mysqli_fetch_array($result)) {
                            echo '<tr>';
                                echo '<td>'.$row['nombre'].'</td>';
                                echo '<td class="dt-type-numeric">' .$row['puntos']. '</td>';
                                echo '<td>';
                                for ($i=1; $i <= $row['fortalezas']; $i++){
                                    $rows2= mysqli_fetch_array($result2);
                                    $fortaleza_nombre=$rows2['fnombre'];
                                    $fortaleza_posicion=$rows2['posicion'];
                                    $fortaleza_estado=$rows2['estado'];
                                    if ($row['id_faccion']==1){
                                        echo '<a class="Ntooltip" href="#">';
                                        if ($fortaleza_estado==1)
                                            echo '<img style="border:0" src="assets/img/status/asedio.png">';
                                        else if($fortaleza_estado==2)
                                            echo '<img style="border:0" src="assets/img/status/transicion.gif">';
                                        else
                                            echo '<img style="border:0" src="assets/img/status/balianza.gif">';
                                        echo '<span><center>';
                                        echo '<img style="border:0" src="assets/img/status/alianza.gif">';
                                        echo "<br>$fortaleza_nombre";
                                        echo "<br>$fortaleza_posicion";
                                        echo '<br>'.(estado_fortaleza($fortaleza_estado)).'';
                                        echo '</center></span>';
                                        echo '</a>';
                                    }else if($row['id_faccion']==2){
                                        echo '<a class="Ntooltip" href="#">';
                                        if ($fortaleza_estado==1)
                                            echo '<img style="border:0" src="assets/img/status/asedio.gif">';
                                        else if($fortaleza_estado==2)
                                            echo '<img style="border:0" src="assets/img/status/transicion.gif">';
                                        else
                                            echo '<img style="border:0" src="assets/img/status/bcorsarios.gif">';
                                        echo '<span><center>';
                                        echo '<img style="border:0" src="assets/img/status/corsarios.gif">';
                                        echo "<br>$fortaleza_nombre";
                                        echo "<br>$fortaleza_posicion";
                                        echo '<br>'.(estado_fortaleza($fortaleza_estado)).'';
                                        echo '</center></span>';
                                        echo '</a>';
                                    }else if($row['id_faccion']==3){
                                        echo '<a class="Ntooltip" href="#">';
                                        if ($fortaleza_estado==1)
                                            echo '<img style="border:0" src="assets/img/status/asedio.gif">';
                                        else if($fortaleza_estado==2)
                                            echo '<img style="border:0" src="assets/img/status/transicion.gif">';
                                        else
                                            echo '<img style="border:0" src="assets/img/status/bguardianegra.gif">';
                                        echo '<span><center>';
                                        echo '<img style="border:0" src="assets/img/status/guardianegra.gif">';
                                        echo "<br>$fortaleza_nombre";
                                        echo "<br>$fortaleza_posicion";
                                        echo '<br>'.(estado_fortaleza($fortaleza_estado)).'';
                                        echo '</center></span>';
                                        echo '</a>';
                                    }
                                }
                                echo ' ' .$row['fortalezas']. '</td>';
                            echo '</tr>';
                            $rows++;
                        }

                        mysqli_free_result($result);
                        mysqli_free_result($result2);

                        ?>
				</tbody>
			</table>

			<table id="players1" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Clan</th>
						<th><Facción</th>
						<th>Rango</th>
						<th>Fama Facción</th>
						<th>Fama</th>
						<th>Karma</th>
						<th>Lugar</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        $query = "select * from clientes";
                        $result = mysqli_query($link, $query);
                        $rows = 1;

                        while ($row= mysqli_fetch_array($result)) {
                            echo '<tr>';
                                echo '<td>' .$row['nombre']. '</td>';
                                echo '<td>' .iif($row['guild'],true). '</td>';
                                echo '<td>' .iif($row['town']). '</td>';
                                echo '<td>' .iif($row['rango']). '</td>';
                                echo '<td class="dt-type-numeric">' .iif($row['rango_puntos']). '</td>';
                                echo '<td class="dt-type-numeric">' .$row['fama']. '</td>';
                                echo '<td class="dt-type-numeric">' .$row['karma']. '</td>';
                                echo '<td>' .iif($row['lugar']). '</td>';
                            echo '</tr>';
                            $rows++;
                        }
                        mysqli_free_result($result);
					?>
				</tbody>
			</table>
			
		</section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<ua-footer></ua-footer>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
</html>