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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styleSAR.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Historial de Notas</title>
</head>
<style>	
	#leadsTable td{
		border: 1px solid black !important;
	}
	#leadsTable{
		border: 0px solid black;
		font-size: 12px;
		width: 100% !important;
	}
</style>
<body onload="changeLabels();">
	
		<table id="leadsTable">
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
            <tr>
                <td>Id Cliente</td>
                <td>Id Usuario</td>
                <td>Id Total</td>
                <td>PDF</td>
            </tr>
			
				<?php
           
                $sql="SELECT * FROM notass";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){	
				?>			
			
<tr>
<td><?php echo $mostrar['IDCliente']?></td>
<td><?php echo $mostrar['ID_Us']?></td>
<td><?php echo $mostrar['Total']?></td>
<td><?php echo $mostrar['FECHAI']?></td>
<td><?php echo $mostrar['PDF']?></td>
</tr>
<?php 
}
?>
</table>
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
		window.open("searchProspect.php", "ventanaEmergente", "width=700,height=500,resizable=no");
	}

	function changeLabels() {
		
		document.getElementById('labelEliminar').innerHTML="Editar Nota";
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