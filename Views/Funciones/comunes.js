function consultarNombre() {
  $("#txtNombre").val("");
  let identificacion = $("#txtIdentificacion").val();

  if (identificacion.length < 10) {
    $.ajax({
      type: "GET",
      url: "https://apis.gometa.org/cedulas/" + identificacion,
      dataType: "json",
      success: function (response) {
        $("#txtNombre").val(response.nombre);
      },
    });
  }
}

function permitirSoloNumeros() {
  $(this).on("keypress", function (e) {
    const code = e.which || e.keyCode;
    if (code < 48 || code > 57) {
      e.preventDefault();
    }
  });
}
