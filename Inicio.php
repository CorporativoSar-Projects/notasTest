<?php
    session_start();
	error_reporting(0);
	echo "Usuario: ".$_SESSION['$user'];
	echo"<br>";
	$codE = $_SESSION['$CodiEmp'];
	$varsesion=$_SESSION['$user'];
	$foliio=$_SESSION['$folio'];
	$tema = $_SESSION['$Tema'];
	//echo 'Tema:'.$Tema;
	if($varsesion==null || $varsesion=='')
	{
    	echo "<script>alert('Debes de iniciar sesion para poder ingresar');</script>";
    	echo "<div id='parent'>		
				<div class='alert alert-danger' id='divSuccessAdd' role='alert'>
				<h4 class='alert-heading'>Fallo en operación</h4>
				<p>No has iniciado sesión, por tanto <b>NO PUEDES ACCEDER AL SISTEMA</b>.</p>
				<p>Por favor inicia sesión primero con tu correo y contraseña.</p>
				<p>Si sigues presentando fallas, comunícate con el Administrador del sistema al correo: <b>contacto@corporativosaarme.com</b></p>
				<hr>
				<br>
				<a href='index.php' class='mb-0'><p class='mb-0'>INICIAR SESIÓN AHORA</p></a>
				</div>
			</div>";
			die();
	}
	else
	{
	    include 'conexion.php';
	}
	global $cont;
	global $id;
	global $tmpPrecio;
	global $tmpDescripcion;
	global $optSelected;
	global $contServ;
	$contServ=0;
	global $serviceArray;
	$serviceArray = array();
	$cont=1;
	$rs = mysqli_query($conexion, "SELECT FOLIO FROM notass	WHERE FechaRegistro = (SELECT MAX(FechaRegistro) FROM notass where ID_Us = '$varsesion');");
	if ($row = mysqli_fetch_row($rs)) {
		$id = trim($row[0]);
		//cho "Valor de id:".$id;
	}
	else{
		$id=0;
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<link rel="stylesheet" href="<?php echo $tema;?>">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="img/1.png"/>
	<title>Inicio Corporativo SAR</title>
	<!--Cambio 3-->
</head>
<style>
	td select{
		width: 100%;
	}
	td input{
		width: 100%;
	}
</style>
<body>
<?php include 'menu.php'; ?>
	<br><br>
	<div id="divGen">
		<h1><center>Bienvenido <br><?php echo $_SESSION['$CodiEmp']?> </center></h1>
	</div>
	<br><br>
    <p>Gracias por visitar nuestro sitio web. Esperamos que te sientas cómodo y encuentres la información que estás buscando.</p>
</body>
</html>
