<?php
// Iniciar sesión para usar $_SESSION
session_start();



// Asegurarse de que la sesión está iniciada y que existe la variable '$CodiEmp'
if (isset($_SESSION['$CodiEmp'])) {

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }

    // Obtener el ID de la empresa de la sesión y proteger contra la inyección de SQL
    $id_empresa = $conexion->real_escape_string($_SESSION['$CodiEmp']);

    // Consultar para obtener el logo de la empresa específica
    $query = "SELECT logo FROM empresac WHERE codigoE = '{$id_empresa}'";
    $resultado = $conexion->query($query);

    if ($resultado) {
        // Verificar si se encontró el logo
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $logo_empresa = htmlspecialchars($fila['logo']);
        } else {
            die("No se encontró el logo para la empresa con ID: {$id_empresa}");
        }
        // Liberar el resultado
        $resultado->free();
    } else {
        die("Error al ejecutar la consulta: " . $conexion->error);
    }

	$query1 = "SELECT Paq_Notas, Paq_Completo, Paq_Prospeccion FROM usuarioss WHERE id_empresa = '{$id_empresa}'";
    $resultado = $conexion->query($query1);

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $paqNotas = $fila["Paq_Notas"];
            $paqCompleto = $fila["Paq_Completo"];
            $paqProspeccion = $fila["Paq_Prospeccion"];
        } else {
            die("No se encontraron datos para la empresa con ID: {$id_empresa}");
        }
        $resultado->free();
    } else {
        die("Error al ejecutar la consulta: " . $conexion->error);
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    die("No hay una empresa iniciada sesión.");
}



?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php if (isset($paqNotas) && $paqNotas === "si" || isset($paqCompleto) && $paqCompleto === "si" || isset($paqProspeccion) && $paqProspeccion === "si") : ?>
        <a class="navbar-brand" href="#"><img src="<?php echo $logo_empresa; ?>" width="100" height="100" alt="Logo de la empresa" style="margin-left: 100px !important;"></a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php if (isset($paqNotas) && $paqNotas === "si") : ?>

                <li class="nav-item" id="mInicio" style="margin-left: 75px !important;height: 70px;">
                    <a class="nav-link" href="Inicio.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item" id="mInicio" style="margin-left: 75px !important;height: 70px;">
                    <a class="nav-link" href="notas.php">Notas<span class="sr-only">(current)</span></a>
                </li>
				<li class="nav-item" id="mInicio" style="margin-left: 75px !important;height: 70px;">
                <a class="nav-link" href="gestionarservicios.php">Gestionar servicios</a>
            </li>
            <li class="nav-item" id="mManageServices" style="margin-left: 75px !important;">
                <a class="nav-link" href="historial_notas.php">Historial de Notas</a>
            </li>
				
            <?php endif; ?>
            <?php if (isset($paqCompleto) && $paqCompleto === "si") : ?>
                <!-- Agregar aquí las opciones específicas para 'Completo' -->
				<li class="nav-item" id="mInicio" style="margin-left: 75px !important;height: 70px;">
                    <a class="nav-link" href="Inicio.php">Inicio<span class="sr-only">(current)</span></a>
                </li>

				<li class="nav-item" id="mInicio" style="margin-left: 75px !important;height: 70px;">
                    <a class="nav-link" href="notas.php">Notas<span class="sr-only">(current)</span></a>
                </li>

				<li class="nav-item" id="mInicio" style="margin-left: 75px !important;height: 70px;">
                <a class="nav-link" href="gestionarservicios.php">Gestionar servicios</a>
            </li>
            <li class="nav-item" id="mManageServices" style="margin-left: 75px !important;">
                <a class="nav-link" href="historial_notas.php">Historial de Notas</a>
            </li>
			<li class="nav-item" id="mLeads" style="margin-left: 90px !important;">
                    <a class="nav-link" href="prospeccion.php">Prospección</a>
                </li>
				
            <?php endif; ?>
            <?php if (isset($paqProspeccion) && $paqProspeccion === "si") : ?>
				
				<li class="nav-item" id="mInicio" style="margin-left: 75px !important;height: 70px;">
                    <a class="nav-link" href="Inicio.php">Inicio<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item" id="mLeads" style="margin-left: 90px !important;">
                    <a class="nav-link" href="prospeccion.php">Prospección</a>
                </li>

            <?php endif; ?>
            
            <li class="nav-item" id="mWebSite" style="margin-left: 80px !important;">
                <a class="nav-link" href="https://www.corporativosaarme.com">Ir al sitio web</a>
            </li>
            <li class="nav-item" style="margin-left: 100px !important;">
                <div style="display: flex; align-items: center;">
                    <img src="img/cerrar-sesion" width="18" height="18" style="margin-right: 50px;">
                    <a class="nav-link" href="cerrar_sesion.php" style="margin-right: 20px;">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </div>
</nav>