<?php
	session_start();
	include 'conexion.php';	
	error_reporting(0);
	echo "Usuario: ".$_SESSION['$user'];
	$varsesion=$_SESSION['$user'];
	if($varsesion==null || $varsesion=='')
	{
    	echo 'Debes de iniciar sesion para poder ingresar';
    	header('Location: index.php');
		die();
	}
	global $contLeads;
	//Poner variables para jalar de la base de datos de pdfgen
	global $nomCliente,$domCliente;
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styleSAR.css">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Historial de Notas</title>
</head>
<style>	
	#leadsTable{
		margin:150px auto;
		border: 0px solid black;
		font-size: 12px;
		width: 100% !important;
		display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
		
	}
	table{
		
		background-color: white;
		text-align: left;
	}
	th,td{
		border: solid 1px black;
		padding: 10;
	}
	thead{
		background-color:#F9A615;
		border-bottom: solid 5px #0f362d;
		color:white;
	}
	tr:nth-child(even){
		background-color: #ddd;

	}
	.btn-custom {
  background-color: transparent; /* Fondo transparente */
  color: #000; /* Color de texto (negro en este caso) */
  /* Otros estilos si es necesario */
}

</style>
<body onload="changeLabels();">
<?php include 'menu.php'; ?>
	
<tr>
				<td colspan="13" style="border: 0px !important"><h3><br>Base de datos de Notas<br><br></h3></td>
			</tr>
			<tr>
				<td colspan="3" style="border: 0px !important">
					<div align="left">
					<h6 style="color:;">Total de leads del equipo: <b><?php echo $contLeadCL; ?></b></h6>
					<h6 style="color: red;">Mis leads: <b><?php echo $contMyLeadCL; ?></b></h6><br>
					</div>
				</td>
			</tr>
		<div id="leadsTable">
			
			<table>
				<thead>
				<tr>
				<th>Correo Cliente</th><th>Usuario que Elaboro</th><th>Monto de Nota</th><th>Fecha de Registro</th><th>Generar PDF<a href="pdfGen.php" <img src="img/logopdf.PNG" width="25" height="25"></th>
			     </tr>
			</thead>
            
        
			<?php
           
               // $sql="SELECT * FROM notass";
				$sql = "SELECT * FROM notass WHERE ID_Us = '$varsesion'";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){	
					$nomCliente=$mostrar['IDCliente'];
					$domCliente=$mostrar['ID_US'];
					$idservicio=$mostrar['NomSer'];
					$idservicio2=$mostrar['NomSer2'];
					$idservicio3=$mostrar['NomSer3'];
					$idservicio4=$mostrar['NomSer4'];
					$cantidad=intval($mostrar['Cantidad']);
					$cantidad2=intval($mostrar['Cantidad2']);
					$cantidad3=intval($mostrar['Cantidad3']);
					$cantidad4=intval($mostrar['Cantidad4']);
					$descripcion=$mostrar['descripcion'];
					$descripcion2=$mostrar['descripcion2'];
					$descripcion3=$mostrar['descripcion3'];
					$descripcion4=$mostrar['descripcion4'];
					$precio=$mostrar['precio'];
					$precio2=$mostrar['precio2'];
					$precio3=$mostrar['precio3'];
					$precio4=$mostrar['precio4'];
					$importe=$mostrar['importe'];
					$importe2=$mostrar['importe2'];
					$importe3=$mostrar['importe3'];
					$importe4=$mostrar['importe4'];
					$tipoNota=$mostrar['TipoNota'];
					$folio=$mostrar['FOLIO'];
					$fecha=$mostrar['fecha'];
					$subtotal=$mostrar['subtotal'];
					$iva=$mostrar['IVA'];
					$riva=$mostrar['RIVA'];
					$risr=$mostrar['ISR'];
					$total=$mostrar['Total'];

					$dartext="pdfGen.php?nomCliente=".$nomCliente."&domCliente=".$domCliente."&idservicio=".$idservicio."&idservicio2=".$idservicio2."&idservicio3=".$idservicio3."&idservicio4=".$idservicio4.
					"&cantidad=".$cantidad."&cantidad2=".$cantidad2."&cantidad3=".$cantidad3."&cantidad4=".$cantidad4.
					"&descripcion=".$descripcion."&descripcion2=".$descripcion2."&descripcion3=".$descripcion3."&descripcion4=".$descripcion4.
                    "&precio=".$precio."&precio2=".$precio2."&precio3=".$precio3."&precio4=".$precio4.
					"&importe=".$importe."&importe2=".$importe2."&importe3=".$importe3."&importe4=".$importe4.
					"&tipoNota=".$tipoNota."&folio=".$folio."&fecha=".$fecha."&subtotal=".$subtotal."&iva=".$iva."&riva=".$riva."&risr=".$risr.
					"&total=".$total.""

				?>	
	
<tr>
<td><?php echo $mostrar['IDCliente']?></td><td><?php echo $mostrar['ID_Us']?></td><td><?php echo $mostrar['Total']?></td><td><?php echo $mostrar['FechaRegistro']?></td><td><a href="<?php echo $dartext;?>" class="btn btn-custom"><i class="far fa-file-pdf"></i> <img src="img/logopdf.PNG" width="25" height="25"></a></td>
</tr>
<?php 
}
?>
</table>
</div>
	</div>
</body>
<script>
	function changeLeadColor(argument) {
		var a=argument.value;
		var idlead=argument.id;
		var b=document.getElementById('leadRow'+idlead);
		//var b=table.getElementByTagName("tr");
		if(a=='nuevo' || a=='primCotacto'){
			b.style.backgroundColor='#ECECEC';
		}
		else if(a=='proceso'){
			b.style.backgroundColor='#FFE779';
		}
		else if(a=='calificado'){
			b.style.backgroundColor='#96FF8E';
		}
		else if(a=='noCalificado'){
			b.style.backgroundColor='#FFA8A8';
		}
	}
	

	function verConsulta() {
		window.open("searchNotas.php", "ventanaEmergente", "width=700,height=500,resizable=no");
	}

	function changeLabels() {
		document.getElementById('labelAñadir').innerHTML="";
		document.getElementById('labelEliminar').innerHTML="Eliminar Nota";
		document.getElementById('labelConsultar').innerHTML="Buscar Nota";
	}
	var currentLoc = window.location.href;
	var links = document.querySelectorAll('nav a');
	for (var i=0; i<links.length; i++) {
		if (links[i].href===currentLoc) {
			links[i].classList.add('active');
			break;
		}
	}
</script>
</html>