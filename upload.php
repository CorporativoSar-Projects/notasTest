<?php
//SE debe jalar el codigo de la empresa para crear la carpeta donde ir'a su logo, debe ser una varibale 
//global que venga de registro empresarial, para sustituir en "logotipos"

include 'conexion.php';
$nomEmp = $_POST['nomEmp'];
$nomRep = $_POST['nomRep'];
$ApePater = $_POST['ApePater'];
$ApeMater = $_POST['ApeMater'];
$CorreoE = $_POST['CorreoE'];
$Pass = $_POST['pass'];
$cifra = $Pass;
$Pass = cifrarSHA256($cifra);
function cifrarSHA256($texto)
{
    return hash('sha256', $texto);
}
$codigoEmp = $_POST['codigoEmp'];
$Prospeccion = $_POST['Prospeccion'];
$Notas = $_POST['Notas'];
$Completo = $_POST['Completo'];


$telCont = $_POST['telCont'];
$sitWeb = $_POST['sitWeb'];
$dirEmp = $_POST['dirEmp'];
$temaEmp = $_POST['temaEmp'];
//$logo =$_POST['file'];
//$pass= cifrarSHA256($cifra);
//function cifrarSHA256($texto) {
//	return hash('sha256', $texto);
//}

//Guardar los valores del formulario perzonalizadas etiquetas
$etiquetaEmp = $_POST['etiquetaEmp'];
//$Personalizado=$_POST['Personalizado'];
$Fecha = $_POST['Fecha'];
$Folio = $_POST['Folio'];
$TipoNota = $_POST['TipoNota'];
$NomClien = $_POST['NomClien'];
$CorreoClien = $_POST['CorreoClien'];
$TelefonoClien = $_POST['TelefonoClien'];
$DomiClien = $_POST['DomiClien'];
$FechaIni = $_POST['FechaIni'];
$FechaTerm = $_POST['FechaTerm'];
$Servicio = $_POST['Servicio'];
$Cantidad = $_POST['Cantidad'];
$AñadirServ = $_POST['AñadirServ'];
$Consultar = $_POST['Consultar'];
$EliServ = $_POST['EliServ'];
$NomSer = $_POST['NomSer'];
$Descripcion = $_POST['Descripcion'];
$PrecioUni = $_POST['PrecioUni'];
$CatServ = $_POST['CatServ'];
$IDServ = $_POST['IDServ'];

//para guardar estandar
$etiquetaEmp = $_POST['etiquetaEmp'];
//$Standar=$_POST['Standar'];
$Fechaa = "Fecha";
$Folioo = "Folio";
$TipoNotaa = "Tipo de Nota";
$NomClienn = "Nombre del Cliente";
$CorreoClienn = "Correo del Cliente";
$TelefonoClienn = "Teléfono del Cliente";
$DomiClienn = "Domicilio del Cliente";
$FechaInii = "Fecha de Inicio";
$FechaTermm = "Fecha de Termino";
$Servicioo = "Servicio";
$Cantidadd = "Cantidad";
$AñadirServv = "Añadir Servicio";
$Consultarr = "Consultar";
$EliServv = "Eliminar Servicio";
$NomSerr = "Nombre del Servicio";
$Descripcionn = "Descripción";
$PrecioUnii = "Precio Unitario";
$CatServv = "Catalogo de Servicios";
$IDServv = "ID del Servicio";

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $filename = $file['name'];
    $nimetype = $file['type'];
    $allowed_types = array("image/jpg", "image/jpeg", "image/png"); //}
    if (!in_array($nimetype, $allowed_types)) {
        header("location:index.php");
    }

    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $newFilename = $codigoEmp . '.' . $extension;

    if (!is_dir("logos")) {
        mkdir("logos", 0777);
    }

    move_uploaded_file($file['tmp_name'], "logos/" . $newFilename);
    $urllogo = "logos/" . $newFilename;


    $conexion->begin_transaction();

    try {
        // Primera consulta: Insertar en empresac
        $queU = "INSERT INTO empresac values ('$nomEmp', '$codigoEmp', '$temaEmp', '$CorreoE', '$nomRep', '$Pass', '$sitWeb', '$telCont', '$dirEmp', '$urllogo')";
        if (!$conexion->query($queU)) {
            throw new Exception("Error al insertar en empresac: " . $conexion->error);
        }

        // Segunda consulta: Insertar en usuarioss
        $queU5 = "INSERT INTO usuarioss values ('$nomRep','$ApePater','$ApeMater','$CorreoE','$Pass','$codigoEmp','$_REQUEST[Prospeccion]','$_REQUEST[Notas]','$_REQUEST[Completo]')";
        if (!$conexion->query($queU5)) {
            throw new Exception("Error al insertar en usuarioss: " . $conexion->error);
        }

        // Tercera consulta: Insertar en etiquetas
        if ($etiquetaEmp == "standardLabelsChoose") {
            $queU2 = "INSERT INTO etiquetas  VALUES('$nomEmp', '$Fechaa','$Folioo','$TipoNotaa','$NomClienn','$CorreoClienn','$TelefonoClienn','$DomiClienn','$FechaInii','$FechaTermm','$Servicioo','$Cantidadd','$AñadirServv', '$Consultarr', '$EliServv','$NomSerr', '$Descripcionn', '$PrecioUnii', '$CatServv', '$IDServv');";
        } else if ($etiquetaEmp == "customLabelsChoose") {
            $queU2 = "INSERT INTO etiquetas VALUES('$nomEmp', '$Fecha','$Folio','$TipoNota','$NomClien','$CorreoClien','$TelefonoClien','$DomiClien','$FechaIni','$FechaTerm','$Servicio','$Cantidad','$AñadirServ', '$Consultar', '$EliServ','$NomSer', '$Descripcion', '$PrecioUni', '$CatServ', '$IDServ');";
        }
        if (!$conexion->query($queU2)) {
            throw new Exception("Error al insertar en etiquetas: " . $conexion->error);
        }

        // Si todo ha ido bien, commit la transacción
        $conexion->commit();
        $codigoEmpresaJs = json_encode($codigoEmp);
        echo "<script>
        alert('DATOS GUARDADOS CORRECTAMENTE. Ya puedes Iniciar sesión. Código de empresa: ' + $codigoEmpresaJs);
        window.location.href='index.php'; // Redirigir a la página deseada
        </script>";
    } catch (Exception $e) {
        // Si hay un error, rollback la transacción
        $conexion->rollback();
        echo $e->getMessage();
    }
} else {
    echo "<script>alert('No hay archivo, comunicate con soporte');</script>";
}
