jQuery.validator.addMethod(
  "filesize_max",
  function (value, element, param) {
    var isOptional = this.optional(element),
      file;

    if (isOptional) {
      return isOptional;
    }

    if ($(element).attr("type") === "file") {
      if (element.files && element.files.length) {
        file = element.files[0];

        const size = file.size / 1024;
        return size && size <= param;
      }
    }
    return false;
  },
  "La foto no puede pesar mas de 4 MegaBytes"
);
if ($("#formResidente").length > 0) {
  $("#formResidente").validate({
    rules: {
      name: {
        required: true,
      },
      lastname: {
        required: true,
      },
      num_identification: {
        required: true,
        digits: true,
      },
      address: {
        required: true,
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
      num_identification: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numeros",
      },
      address: {
        required: "Este campo es obligatorio",
      },
      phone: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numeros",
      },
    },
  });
}

if ($("#formUser").length > 0) {
  $("#formUser").validate({
    rules: {
      resident_id: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      role_id: {
        required: true,
      },
    },
    messages: {
      resident_id: {
        required: "Este campo es obligatorio",
      },
      email: {
        required: "Este campo es obligatorio",
        email: "Este campo debe tener formato de correo electronico",
      },
      role_id: {
        required: "Este campo es obligatorio",
      },
    },
  });
}

if ($("#formIngreso").length > 0) {
  $("#formIngreso").validate({
    rules: {
      concept: {
        required: true,
      },
      value: {
        required: true,
        digits: true,
      },
    },
    messages: {
      concept: {
        required: "Este campo es obligatorio",
      },
      value: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numero",
      },
      role_id: {
        required: "Este campo es obligatorio",
      },
    },
  });
}
if ($("#formEgresos").length > 0) {
  $("#formEgresos").validate({
    rules: {
      concept: {
        required: true,
      },
      value: {
        required: true,
        digits: true,
      },
    },
    messages: {
      concept: {
        required: "Este campo es obligatorio",
      },
      value: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numero",
      },
      role_id: {
        required: "Este campo es obligatorio",
      },
    },
  });
}

if ($("#contratoForm").length > 0) {
  $("#contratoForm").validate({
    rules: {
      numIdenficication: { required: true },
      phone: { required: true },
      empresa_nombre: { required: true },
      empresa_direccion: { required: true },
      front_photo_document: {
        required: true,
        filesize_max: 4096,
      },
      back_photo_document: {
        required: true,
        filesize_max: 4096,
      },
      sign_photo: {
        required: true,
        filesize_max: 4096,
      },
      referencia_nombre: { required: true },
      referencia_direccion: { required: true },
      referencia_telefono: { required: true },
      referencia_ocupacion: { required: true },
      referencia_tipo: { required: true },
      terminos: { required: true },
      terminosCompra: { required: true },
      terminosCusro: { required: true },
    },
  });
}
