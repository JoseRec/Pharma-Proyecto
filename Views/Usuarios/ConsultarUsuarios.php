<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutInterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/usuarioController.php';

$resultado = ConsultarUsuarios();
?>

<!DOCTYPE html>
<html>
<?php
AddHead();
?>

<body>
    <?php
    showHeader();
    ?>
    <div class="page-wrapper container-fluid" style="max-width: 98%; padding: 20px 15px;">
        <div class="row">
            <div class="col-12">

                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <h4 class="card-title text-primary mb-4" style="font-weight: 600;">Consulta de Productos</h4>

                        <?php
                        if (isset($_POST["txtMensaje"])) {
                            echo '<div class="alert alert-warning text-center">' . $_POST["txtMensaje"] . '</div>';
                        }
                        ?>


                        <div class="table-responsive" style="overflow-x:auto;">
                            <table id="tablaDatos" class="table table-striped table-bordered table-hover"
                                style="min-width: 1000px; font-size: 1.05rem; background: #fff;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Identificación</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        echo "<tr>";
                                        echo "<td>" . $fila["idUsuario"] . "</td>";
                                        echo "<td>" . $fila["Identificacion"] . "</td>";
                                        echo "<td>" . $fila["Nombre"] . "</td>";
                                        echo "<td>" . $fila["Correo"] . "</td>";
                                        echo "<td>" . $fila["Telefono"] . "</td>";
                                        echo "<td>" . $fila["RolNombre"] . "</td>";
                                        echo "<td>" . $fila["EstadoDescripcion"] . "</td>"; // <- cuidado si este campo no existe
                                        echo '<td class="text-center">
                                            <a class="btn p-0 border-0 btnAbrirModal" data-toggle="modal" data-target="#CambiarEstadoUsuario"
                                                data-id="' . $fila["idUsuario"] . '" 
                                                data-nombre="' . $fila["Nombre"] . '" style="background: none;">
                                                <i class="' . ($fila["Estado"] ? 'icon-toggle-on text-success' : 'icon-toggle-off text-danger') . '" style="font-size:1.3em;"></i>
                                            </a>


                                            <a class="btn btn-sm btn-outline-primary ml-2" href="ActualizarUsuario.php?q=' . $fila["idUsuario"] . '" title="Editar Usuario">
                                                <i class="icon-pencil" style="font-size:1.3em;"></i>
                                            </a>
                                        </td>';
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- Modal para cambiar estado -->
    <div class="modal fade" id="CambiarEstadoUsuario" tabindex="-1" role="dialog" aria-labelledby="tituloModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="tituloModal">Confirmación</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" style="font-size:1.5rem;">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="idUsuario" name="idUsuario" class="form-control">
                        <p id="lblNombre" class="mb-0" style="font-weight:600;"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnCambiarEstadoUsuario" name="btnCambiarEstadoUsuario"
                            class="btn btn-primary px-4">Procesar</button>
                        <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    AddJs();
    ?>

    <script>
        $(document).ready(function () {

            new DataTable('#tablaDatos', {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json',
                },
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50],
                responsive: true
            });

            $('.btnAbrirModal').on('click', function () {
                const id = $(this).data('id');
                const nombre = $(this).data('nombre');
                $('#idUsuario').val(id);
                $('#lblNombre').text("¿Desea cambiar el estado del usuario \"" + nombre + "\"?");
            });

        });
    </script>
</body>

</html>