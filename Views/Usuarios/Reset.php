<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutExterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/usuarioController.php';

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
AddHead();
?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../Imagenes/pngtree-medical-cross-and-health-pharmacy-logo-vector-template-image_148831.jpg"
							alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Cambiar Contraseña</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<?php
								if (isset($_POST["txtMensaje"])) {
									echo '<div class="alert alert-warning text-center">' . $_POST["txtMensaje"] . '</div>';
								}
								?>
								<div class="form-group">
									<span>Contraseña Anterior</span>
									<input id="txtContrasennaAnterior" name="txtContrasennaAnterior" type="password"
										class="form-control" minlength="8" data-eye required>
								</div>
								<div class="form-group">
									<span>Contraseña Nueva</span>
									<input id="txtContrasennaNueva" name="txtContrasennaNueva" type="password"
										class="form-control" minlength="8" data-eye required>
								</div>
								<div class="form-group">
									<span>Confirmar Contraseña Nueva</span>
									<input id="txtConfirmar" name="txtConfirmar" type="password" class="form-control"
										minlength="8" data-eye required>
								</div>
								<div class="form-group m-0">
									<button id="btnActualizarContrasenna" name="btnActualizarContrasenna" type="submit"
										class="btn btn-primary btn-block">
										Actualizar Contraseña
									</button>
								</div>
							</form>

							<!-- Botón para volver a principal -->
							<div class="form-group mt-3 text-center">
								<a href="../Home/Principal.php" class="btn btn-secondary">Volver a Inicio</a>
							</div>

						</div>
					</div>
					<?php
					AddFooter();
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
	AddJs();
	?>
</body>

</html>