<?php
	error_reporting(0);	
	include 'conexion.php';
	$user=$_POST['username'];
	$pass=$_POST['pass'];
	$nomEmp = $_POST['nomEmp'];
	$codigoEmp = $_POST['codigoEmp'];
	$nomRep = $_POST['nomRep'];
	$CorreoE = $_POST['CorreoE'];
	$telCont = $_POST['telCont'];
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/estilos.css">	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
	<link rel="shortcut icon" href="img/1.png" />
	<!--Cambio 2-->
	<script>
        function handleCheckboxClick(checkbox) {
            var checkboxes = document.getElementsByName("opcion[]");
            if (checkbox.value === "Completo" && checkbox.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i] !== checkbox) {
                        checkboxes[i].disabled = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].disabled = false;
                }
            }
        }
    </script>
</head>
<style>
	body{
		background-color: white;
	}
	p{
		font-size: 40px;
	}
	.checkbox-group {
            display: flex;
            flex-direction: row;
        }

        .checkbox-group label {
            margin-right: 10px;
        }
</style>

<body style="font-family:arial;">
	<header id="headerRegEmp">
		<img src="img/SAR svg/1.svg" id="logo">
		<!--<a href="./carritodecompras.php" title="Ver carrito de compras">
			<img src="./imagenes/carrito.png">
			<div id="mensaje">
			<?php echo $mensaje; ?>
		</a>-->
		
    </div>
	</header>
	<br><br><br>
	<div id="divmain">
		<div id="divForm">
			<form id="formRegEmp" method="POST" action="upload.php" enctype="multipart/form-data">
			<!--<form id="formRegEmp" method="POST" action="guardar_etiquetas.php" enctype="multipart/form-data">-->
				<br>
				<center>
                <table id="tableRegEmp">
					<tr>
						<td colspan="2">
							<h1 id="themeTitles">Registro para nuevas empresas</h1>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h3 id="themeTitles">Powered by Innsol Corporation</h3>
							<br><br>
						</td>
					</tr>
                    <tr>
                        <td>
                            <label for="nomEmp" id="labRegForm">Nombre de empresa</label>
							
                        </td>
                        <td>
                            <input type="text" id="nomEmp" name="nomEmp" placeholder="Ej. Innsol Corporation" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="codigoEmp" id="labRegForm">Código de empresa</label>
                        </td>
                        <td>
                            <input type="text" id="codigoEmp" name="codigoEmp" placeholder="Ej. INNCORP" required="true" maxlength="5">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ApePater" id="labRegForm">Apellido Paterno del Representante</label>
                        </td>
                        <td>
                            <input type="text" id="ApePater" name="ApePater" placeholder="Ej. García" required="true">
                        </td>
                    </tr>
                    
					<tr>
                        <td>
                            <label for="ApeMater" id="labRegForm">Apellido Materno del Representante</label>
                        </td>
                        <td>
                            <input type="text" id="ApeMater" name="ApeMater" placeholder="Ej. Juárez" required="true">
                        </td>
                    </tr>

					<tr>
                        <td>
                            <label for="nomRep" id="labRegForm">Nombre(s) del representante</label>
                        </td>
                        <td>
                            <input type="text" id="nomRep" name="nomRep" placeholder="Ej. Esteban Santiago" required="true">
                        </td>
                    </tr>


					<tr>
                        <td>
                            <label for="corCont" id="labRegForm">Correo de contacto</label>
                        </td>
                        <td>
                            <input type="text" id="corCont" name="CorreoE" placeholder="Ej. admin@innsolcorp.com" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="password" id="labRegForm">Contraseña</label>
                        </td>
                        <td>
						<input type="password" id="password" name="pass" placeholder="Contraseña" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="telCont" id="labRegForm">Teléfono de contacto</label>
                        </td>
                        <td>
                            <input type="number" id="telCont" name="telCont" placeholder="Ej. 5589547249" required="true" pattern="[0-9]+" step="1" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/><p style="font-size: 12px;">(Máximo 15 dígitos)</p>
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="file" id="labRegForm">Logotipo</label>
                        </td>
                        <td>
                            <input type="file"  name="file" placeholder="Ej. formato .jpg .png" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="sitWeb" id="labRegForm">Sitio web oficial</label>
                        </td>
                        <td>
                            <input type="text" id="sitWeb" name="sitWeb" placeholder="Ej. www.inncorp.com" required="true">
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label for="dirEmp" id="labRegForm">Dirección</label>
                        </td>
                        <td>
                            <input type="text" id="dirEmp" name="dirEmp" placeholder="Ej. Copernico 23, Miguel Hidalgo, CDMX, 02380" required="true">
                        </td>
					</tr>

					<tr>
                        <td>
                            <label for="Tipo" id="labRegForm">Tipo Contratación</label>
                        </td>
                        <td>
						
						<div class="checkbox-group">
						<label>
                <input type="hidden" name="Prospeccion" value="no">
                <input type="checkbox" name="Prospeccion" value="si" onclick="handleCheckboxClick(this)"> Prospeccion
            </label>
            <label>
                <input type="hidden" name="Notas" value="no">
                <input type="checkbox" name="Notas" value="si" onclick="handleCheckboxClick(this)"> Notas
            </label>
            <label>
                <input type="hidden" name="Completo" value="no">
                <input type="checkbox" name="Completo" value="si" onclick="handleCheckboxClick(this)"> Completos
            </label>
              
        </div>
   
                        </td>
					</tr>

					<tr>
						<td>
                            <label for="temaEmp" id="labRegForm">Tema a elegir</label>
                        </td>
                        <td>
                            <select name="temaEmp" id="temaEmp" onchange="themeTest()">
								<option value="CSS/styleSAR.css">Standard</option>	
								<option value="CSS/customStyle_Turism.css">Turism</option>
								<option value="CSS/customStyle_Tech.css">Tech</option>								
							</select>							
                        </td>
                    </tr>
					
                    <tr>
						<td>
						
                            <label for="etiquetaEmp" id="labRegForm">Configuración de etiquetas</label>
                        </td>
                        <td>
						
                        <select name="etiquetaEmp" id="etiquetaEmp" onchange="labelChoose()">
								
							<option disabled selected="">Selecione una etiqueta</option>

							<option name="Standar" value="standardLabelsChoose">Standard</option>
									
							<option name="Personalizado" value="customLabelsChoose">Personalizadas</option>

						</select>
							<br><br>

							<div style="border:1px solid black; display:none;" id="customLabelsDivEmp">
							    <table style="width:100% !important;">
								<tr>
							            <td>
							                <label for="Fecha">Fecha</label>
							            </td>
							            <td>
							                <input type="text" id="Fecha" name="Fecha" required="true" class="campoPersonalizado" >
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="Folio">Folio</label>
							            </td>
							            <td>
							                <input type="text" id="Folio" name="Folio" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="TipoNota">Tipo de nota a generar</label>
							            </td>
							            <td>
							                <input type="text" id="TipoNota" name="TipoNota" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="NomClien">Nombre del cliente</label>
							            </td>
							            <td>
							                <input type="text" id="NomClien" name="NomClien" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="CorreoClien">Correo del cliente</label>
							            </td>
							            <td>
							                <input type="text" id="CorreoClien" name="CorreoClien" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="TelefonoClien">Teléfono del cliente</label>
							            </td>
							            <td>
							                <input type="text" id="TelefonoClien" name="TelefonoClien" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="DomiClien">Domicilio del cliente</label>
							            </td>
							            <td>
							                <input type="text" id="DomiClien" name="DomiClien" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="FechaIni">Fecha de inicio</label>
							            </td>
							            <td>
							                <input type="text" id="FechaIni" name="FechaIni" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="FechaTerm">Fecha de término</label>
							            </td>
							            <td>
							                <input type="text" id="FechaTerm" name="FechaTerm" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="Servicio">Servicio</label>
							            </td>
							            <td>
							                <input type="text" id="Servicio" name="Servicio" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="Cantidad">Cantidad</label>
							            </td>
							            <td>
							                <input type="text" id="Cantidad" name="Cantidad" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="AñadirServ">Añadir servicio</label>
							            </td>
							            <td>
							                <input type="text" id="AñadirServ" name="AñadirServ" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="Consultar">Consultar</label>
							            </td>
							            <td>
							                <input type="text" id="Consultar" name="Consultar" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="EliServ">Eliminar servicio</label>
							            </td>
							            <td>
							                <input type="text" id="EliServ" name="EliServ" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="NomSer">Nombre de Servicio</label>
							            </td>
							            <td>
							                <input type="text" id="NomSer" name="NomSer" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="Descripcion">Descripción</label>
							            </td>
							            <td>
							                <input type="text" id="Descripcion" name="Descripcion" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="PrecioUni">Precio Unitario</label>
							            </td>
							            <td>
							                <input type="text" id="PrecioUni" name="PrecioUni" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="CatServ">Catálogo de servicios</label>
							            </td>
							            <td>
							                <input type="text" id="CatServ" name="CatServ" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
							        <tr>
							            <td>
							                <label for="IDServ">ID de servicio</label>
							            </td>
							            <td>
							                <input type="text" id="IDServ" name="IDServ" required="true" class="campoPersonalizado">
							            </td>
							        </tr>
				                </table>
							<br><br>
					<tr>
                        <td>
                            <br><br><br><input type="submit"  value="Registrar empresa" class="registrarEmp" id="registrarEmp">
                        </td>  
						<td>
							<br><br><br><input type="button" onclick="nuevo();" value="Necesito ayuda" id="regBt">
                        </td>              
                    </tr>             
                </table>
				</center>
			</form>
			<br><br><br>
		</div>
	</div>
	
</body>
<script>
	

	function nuevo() {
		alert("Por favor, escribe al administrador del sistema o contacta al correo contacto@corporativosaarme.com");
	}

	function themeTest() {
		/*var table = document.getElementById('tableRegEmp');
		table.getElementsByTagName('h1');*/
		var themeButtons = document.getElementById('registrarEmp');
		var themeAllLabels = document.getElementById('formRegEmp');
		themeAllLabels.getElementsByTagName("label");
		var themeTitles = document.getElementById('themeTitles');
		var selThem = document.getElementById('temaEmp').selectedIndex;
		var them = document.getElementById('temaEmp').options;
		var headerTheme = document.getElementById('headerRegEmp');
		if (them[selThem].text == "Turism") {
			headerTheme.style.backgroundColor="rgb(220, 122, 36)";
			themeTitles.style.color="rgb(220, 122, 36)";
			themeAllLabels.style.color="black";
			themeButtons.style.backgroundColor="rgb(220, 122, 36)";
		}
		else if (them[selThem].text == "Tech") {
			headerTheme.style.backgroundColor="#0a71ac";
			themeAllLabels.style.color="#0a71ac";
			themeTitles.style.color="black";
			themeButtons.style.backgroundColor="#0a71ac";

		}
		else if (them[selThem].text == "Standard") {
			headerTheme.style.backgroundColor="#4a4a4a";
			themeTitles.style.color="black";
			themeAllLabels.style.color="black";
			themeButtons.style.backgroundColor="#f13453";
		}
		//alert("Hola:"+them[selThem].text);
	}
	
	function labelChoose() {
    console.log('labelChoose function called'); // Verifica si la función se llama.
    var customLabelsChoosed = document.getElementById('customLabelsDivEmp');
    var selLabels = document.getElementById('etiquetaEmp').selectedIndex;
    var textCustomLabels = document.getElementById('etiquetaEmp').options;
    if (textCustomLabels[selLabels].text == "Standard") {
        console.log('standardLabelsChoose'); // Verifica si se selecciona "Standard".
        customLabelsChoosed.style.display = "none";
    } else {
        console.log('customLabelsChoose'); // Verifica si se selecciona otra opción.
        customLabelsChoosed.style.display = "block";
    }
     
}
document.addEventListener('DOMContentLoaded', (event) => {
			const selectEtiquetaEmp = document.getElementById('etiquetaEmp');
			const customLabelsDivEmp = document.getElementById('customLabelsDivEmp');
			const camposPersonalizados = document.querySelectorAll('.campoPersonalizado');

			function updateRequiredAndVisibility() {
				const isPersonalizado = selectEtiquetaEmp.value === 'customLabelsChoose';
				customLabelsDivEmp.style.display = isPersonalizado ? "block" : "none";
				camposPersonalizados.forEach(campo => {
					campo.required = isPersonalizado;
				});
			}
			
			selectEtiquetaEmp.addEventListener('change', updateRequiredAndVisibility);
			
			// Asegúrate de que el estado requerido esté configurado correctamente cuando se carga la página
			updateRequiredAndVisibility();
	});

</script>
</html>
<?php
if (!isset($_POST['username'])) {
			die();
	}
?>