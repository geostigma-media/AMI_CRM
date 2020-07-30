function contrato() {
  $("#contratocontenedor").show();
  let nombre = $("#name").val();
  $("#nombreContrato").text(nombre);
  let contenido = $(".textoContrato").text();
  $("#contract").val(contenido);
}
7
/*
TODO:
estos debo hacer que
FIXME:
aca esta fallando tal cosa
*/

function dataClient() {
  var datoCliente = $(".datoCliente").val();
  $.getJSON(route("loadClient", { id: datoCliente }), function (data) {
    console.log(data);
    $("#name").val(data[0].name);
    $("#email").val(data[0].email);
  });
}
function dataTemplateEmailSendContractAsesor() {
  var tipoContrato = $("#tipoContrato").val();
  $.getJSON(route("loadTemplate", { id: tipoContrato }), function (data) {
    console.log(data[0].link);
    $("#idtemplate").val(data[0].emailId);
    $("#link").val(data[0].link);
  });
}
function dataClientEmial() {
  var datoCliente = $(".datoClienteEmail").val();
  $.getJSON(route("loadClientSendEmail", { id: datoCliente }), function (data) {
    console.log(data);
    $("#emailEmail").val(data[0].email);
    $("#nameEmail").val(data[0].name);
  });
}

function dataTemplateEmailSendContract() {
  var tipoContrato = $("#tipoContrato").val();
  if (tipoContrato != 0) {
    $.getJSON(route("loadTemplate", { id: tipoContrato }), function (data) {
      console.log(data[0].link);
      $("#idtemplate").val(data[0].emailId);
      $("#link").val(data[0].link);
    });
  }
}

function dataTemplateEmailSendEmialPromotion() {
  var tipoContrato = $("#promocion").val();
  if (tipoContrato != 0) {
    $.getJSON(route("loadTemplatePromotion", { id: tipoContrato }), function (data) {
      console.log(data[0].emailId);
      $("#idtemplateEmial").val(data[0].emailId);
      $("#link").val(data[0].link);
    });
  }
}
