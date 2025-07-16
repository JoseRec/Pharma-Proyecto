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
							<h4 class="card-title">Iniciar Sesión</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<?php
								if (isset($_POST["txtMensaje"])) {
									echo '<div class="alert alert-warning text-center">' . $_POST["txtMensaje"] . '</div>';
								}
								?>
								<div class="form-group">
									<span for="email">E-Mail</span>
									<input id="txtEmail" name="txtEmail" type="email" class="form-control" value="" required
										autofocus>
								</div>
								<div class="form-group">
									<span for="password">Contraseña
										<a href="Forgot.php" class="float-right">
											Olvide mi contraseña
										</a>
									</span>
									<input id="txtContrasenna" name="txtContrasenna" type="password" class="form-control" required
										data-eye>
								</div>
								<div class="form-group m-0">
									<button id="btnIniciarSesion" name="btnIniciarSesion" type="submit" class="btn btn-primary btn-block">
										Iniciar
									</button>
								</div>
								<div class="mt-4 text-center">
									No tienes una cuenta? <a href="Register.php">Crear una</a>
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