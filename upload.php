<?php
//SE debe jalar el codigo de la empresa para crear la carpeta donde ir'a su logo, debe ser una varibale 
//global que venga de registro empresarial, para sustituir en "logotipos"

include 'conexion.php';
$nomEmp =$_POST['nomEmp'];
$codigoEmp =$_POST['codigoEmp'];
$nomRep =$_POST['nomRep'];
$CorreoE =$_POST['CorreoE'];
$Pass =$_POST['Pass'];
$telCont =$_POST['telCont'];
$sitWeb =$_POST['sitWeb'];
$dirEmp =$_POST['dirEmp'];
$temaEmp =$_POST['temaEmp'];

//Guardar los valores del formulario perzonalizadas etiquetas
$etiquetaEmp = $_POST['etiquetaEmp'];
$Fecha = $_POST['Fecha'];
$Folio=$_POST['Folio'];
$TipoNota=$_POST['TipoNota'];
$NomClien=$_POST['NomClien'];
$CorreoClien=$_POST['CorreoClien'];
$TelefonoClien=$_POST['TelefonoClien'];
$DomiClien=$_POST['DomiClien'];
$FechaIni=$_POST['FechaIni'];
$FechaTerm=$_POST['FechaTerm'];
$Servicio=$_POST['Servicio'];
$Cantidad=$_POST['Cantidad'];
$AñadirServ=$_POST['AñadirServ'];
$Consultar=$_POST['Consultar'];
$EliServ=$_POST['EliServ'];
$NomSer=$_POST['NomSer'];
$Descripcion=$_POST['Descripcion'];
$PrecioUni=$_POST['PrecioUni'];
$CatServ=$_POST['CatServ'];
$IDServ=$_POST['IDServ'];

    if (isset($_FILES['file'])){
        $file = $_FILES['file'];
        $filename = $file['name'];
        $nimetype = $file['type'];
        $allowed_types = array("image/jpg", "image/jpeg", "image/png");
        if (!in_array($nimetype, $allowed_types)){
             header("location:index.php");
        }
        if(!is_dir("$codigoEmp")){
            mkdir("$codigoEmp", 0777);
           echo $codigoEmp;

        }
        move_uploaded_file($file['tmp_name'], $codigoEmp."/".$filename);
        rename( $codigoEmp."/".$filename, $codigoEmp."/"."logo.png");
        $queU="INSERT INTO EmpresaC values ('$nomEmp', '$codigoEmp', '$temaEmp', '$CorreoE', '$nomRep', ' ', '$sitWeb', '$telCont', '$dirEmp');" ;
      

        //Guardar variables en la base de estandar
if($etiquetaEmp == 'standardLabelsChoose'){
$queU2="INSERT INTO etiquetas VALUES ( 'Fecha','Folio','Tipo de nota a generar', 'Nombre del cliente','Correo del cliente','Teléfono del cliente','Domicilio del cliente','Fecha de inicio','Fecha de término','Servicio','Cantidad', 'Añadir servicio', 'Consultar','Eliminar servicio','Nombre de Servicio', 'Descripción','Precio Unitario', 'Catálogo de servicios','ID de servicio');";
} else if($etiquetaEmp == 'customLabelsChoose'){
//Guardar Variables en la base de perzonalizado
$queU2="INSERT INTO etiquetas VALUES( '$Fecha','$Folio','$TipoNota','$NomClien','$CorreoClien','$TelefonoClien','$DomiClien','$FechaIni','$FechaTerm','$Servicio','$Cantidad','$AñadirServ', '$Consultar', '$EliServ','$NomSer', '$Descripcion', '$PrecioUni', '$CatServ', '$IDServ');";
}
        if ($conexion->query($queU) and $conexion->query($queU2)) {
		echo "<script>alert('DATOS GUARDADOS CORRECTAMENTE. Ya puedes Iniciar sesión.');</script>";
	    }
	    else{
		echo "Error al actualizar los datos, verifica los datos e inténtalo de nuevo.".mysqli_error($conexion);
		header('Location: registroEmpresarial.php');
	    }
    }
    else{
    	echo "<script>alert('No hay archivo, comunicate con soporte');</script>";
    }
    

?>