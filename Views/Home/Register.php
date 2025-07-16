<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutExterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/homeController.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
AddHead();
?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../Imagenes/pngtree-medical-cross-and-health-pharmacy-logo-vector-template-image_148831.jpg"
							alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Registrase</h4>
							<form class="my-login-validation" action="" method="POST">
								<?php
								if (isset($_POST["txtMensaje"])) {
									echo '<div class="alert alert-warning text-center">' . $_POST["txtMensaje"] . '</div>';
								}
								?>
								<div class="form-group">
									<span>Nombre Completo</span>
									<input id="txtNombre" name="txtNombre" type="text" class="form-control" required
										autofocus>
								</div>

								<div class="form-group">
									<span>Dirección E-mail</span>
									<input id="txtCorreo" name="txtCorreo" type="email" class="form-control" required>
								</div>

								<div class="form-group">
									<span>Cédula</span>
									<input id="txtCedula" name="txtCedula" type="text" class="form-control" required>
								</div>

								<div class="form-group">
									<span>Teléfono</span>
									<input id="txtTelefono" name="txtTelefono" type="text" class="form-control"
										required>
								</div>

								<div class="form-group">
									<span>Contraseña</span>
									<input id="txtContrasenna" name="txtContrasenna" type="password"
										class="form-control" minlength="8" data-eye required>

									<div class="form-group">
										<span>Confirmar Contraseña</span>
										<input id="txtConfirmar" name="txtConfirmar" type="password" class="form-control"
											minlength="8" data-eye required>
									</div>

									<div class="form-group m-0">
										<button id="btnRegistrarUsuario" name="btnRegistrarUsuario" type="submit"
											class="btn btn-primary btn-block">
											Registrarse
										</button>
									</div>
									<div class="mt-4 text-center">
										Ya tienes una cuenta? <a href="Login.php">Login</a>
									</div>
							</form>
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