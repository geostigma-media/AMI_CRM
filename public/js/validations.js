$(document).ready(function () {
  let alerta = $(".close").length;
  if (alerta == 1) {
  } else {
    setTimeout(function () {
      $(".alert-success").fadeOut(1500);
    }, 3000);
  }
});
if ($("#formularioInfoPago").length > 0) {
  $("#formularioInfoPago").validate({
    rules: {
      nombreEstudiante: {
        required: true,
      },
      emailEstudiante: {
        required: true,
        email: true,
      },
      linkPago: {
        required: true,
        url: true,
      },
    },
    messages: {
      nombreEstudiante: {
        required: "Este campo es obligatorio",
      },
      emailEstudiante: {
        required: "Este campo es obligatorio",
        email: "Este campo debe ser un correo valido",
      },
      linkPago: {
        required: "Este campo es obligatorio",
        url: "Este campo debe ser una direccion URL valida",
      },
    },
  });
}

if ($("#contratoForm").length > 0) {
  $("#contratoForm").validate({
    rules: {
      name: {
        required: true,
      },
      city: {
        required: true,
      },
      numIdenficication: {
        required: true,
        digits: true,
      },
      phone: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      terminos: {
        required: true,
      },
      terminosCompra: {
        required: true,
      },
      terminosCusro: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Este campo es obligatorio",
      },
      city: {
        required: "Este campo es obligatorio",
      },
      numIdenficication: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numeros",
      },
      phone: {
        required: "Este campo es obligatorio",
      },
      email: {
        required: "Este campo es obligatorio",
        email: "Este campo debe ser un correo valido",
      },
      terminos: {
        required: "Este campo es obligatorio",
      },
      terminosCompra: {
        required: "Este campo es obligatorio",
      },
      terminosCusro: {
        required: "Este campo es obligatorio",
      },
    },
  });
}
if ($("#formCliente").length > 0) {
  $("#formCliente").validate({
    rules: {
      name: {
        required: true,
      },
      phone: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      name: {
        required: "Este campo es obligatorio",
      },
      phone: {
        required: "Este campo es obligatorio",
      },
      email: {
        required: "Este campo es obligatorio",
        email: "Este campo debe ser un correo valido",
      },
    },
  });
}
if ($("#formClienteEdit").length > 0) {
  $("#formClienteEdit").validate({
    rules: {
      name: {
        required: true,
      },
      phone: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      name: {
        required: "Este campo es obligatorio",
      },
      phone: {
        required: "Este campo es obligatorio",
      },
      email: {
        required: "Este campo es obligatorio",
        email: "Este campo debe ser un correo valido",
      },
    },
  });
}

if ($("#contrato").length > 0) {
  $("#contrato").validate({
    rules: {
      title: {
        required: true,
      },
      firstText: {
        required: true,
      },
      secondText: {
        required: true,
      },
    },
    messages: {
      title: {
        required: "Este campo es obligatorio",
      },
      firstText: {
        required: "Este campo es obligatorio",
      },
      secondText: {
        required: "Este campo es obligatorio",
      },
    },
  });
}

if ($("#contratoEdit").length > 0) {
  $("#contratoEdit").validate({
    rules: {
      title: {
        required: true,
      },
      firstText: {
        required: true,
      },
      secondText: {
        required: true,
      },
    },
    messages: {
      title: {
        required: "Este campo es obligatorio",
      },
      firstText: {
        required: "Este campo es obligatorio",
      },
      secondText: {
        required: "Este campo es obligatorio",
      },
    },
  });
}

if ($("#formAsesor").length > 0) {
  $("#formAsesor").validate({
    rules: {
      name: {
        required: true,
      },
      lastname: {
        required: true,
      },
      numIdentification: {
        required: true,
        digits: true,
      },
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        digits: true,
      },
    },
    messages: {
      name: {
        required: "Este campo es obligatorio",
      },
      lastname: {
        required: "Este campo es obligatorio",
      },
      numIdentification: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numeros",
      },
      email: {
        required: "Este campo es obligatorio",
        email: "Este campo debe ser un correo valido",
      },
      phone: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numeros",
      },
    },
  });
}

if ($("#formEmails").length > 0) {
  $("#formEmails").validate({
    rules: {
      title: {
        required: true,
      },
      firstText: {
        required: true,
      },
    },
    messages: {
      title: {
        required: "Este campo es obligatorio",
      },
      firstText: {
        required: "Este campo es obligatorio",
      },
    },
  });
}

if ($("#seguimiento").length > 0) {
  $("#seguimiento").validate({
    rules: {
      taskId: {
        required: true,
      },
      observation: {
        required: true,
      },
    },
    messages: {
      taskId: {
        required: "Este campo es obligatorio",
      },
      observation: {
        required: "Este campo es obligatorio",
      },
    },
  });
}

if ($("#formTarea").length > 0) {
  $("#formTarea").validate({
    rules: {
      name: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Este campo es obligatorio",
      },
    },
  });
}
