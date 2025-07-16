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
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../Imagenes/pngtree-medical-cross-and-health-pharmacy-logo-vector-template-image_148831.jpg"
							alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Olvide mi contraseña</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<?php
								if (isset($_POST["txtMensaje"])) {
									echo '<div class="alert alert-warning text-center">' . $_POST["txtMensaje"] . '</div>';
								}
								?>
								<div class="form-group">
									<span>E-Mail</span>
									<input id="txtCorreo" name="txtCorreo" type="email" class="form-control" value="" required
										autofocus>
									<div class="form-text text-muted">
										Posteriormente, te enviaremos un enlace para restablecer la contraseña a tu
										correo electrónico.
									</div>
								</div>
								<div class="form-group m-0">
									<button id="btnRecuperarAcceso" name="btnRecuperarAcceso" type="submit"
										class="btn btn-primary btn-block">
										Reinciar contraseña
									</button>
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