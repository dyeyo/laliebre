if ($("#formCategorias").length > 0) {
  $("#formCategorias").validate({
    rules: {
      name: {
        required: true
      },
      description: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Este campo es obligatorio"
      },
      description: {
        required: "Este campo es obligatorio"
      },
    }
  });
}

if ($("#formDistrito").length > 0) {
  $("#formDistrito").validate({
    rules: {
      name: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Este campo es obligatorio"
      },
    }
  });
}

if ($("#formPasillos").length > 0) {
  $("#formPasillos").validate({
    rules: {
      name: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Este campo es obligatorio"
      },
    }
  });
}

if ($("#formProductos").length > 0) {
  $("#formProductos").validate({
    rules: {
      categorie_id: {
        required: true
      },
      store_id: {
        required: true
      },
      store_id: {
        required: true
      },
      name: {
        required: true
      },
      description: {
        required: true
      },
      code: {
        required: true,
        digits: true
      },
      price: {
        required: true,
        digits: true
      },
      image: {
        required: true,
      }
    },
    messages: {
      categorie_id: {
        required: "Este campo es obligatorio"
      },
      store_id: {
        required: "Este campo es obligatorio"
      },
      store_id: {
        required: "Este campo es obligatorio"
      },
      name: {
        required: "Este campo es obligatorio"
      },
      description: {
        required: "Este campo es obligatorio"
      },
      code: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numero"
      },
      price: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numero"
      },
      image: {
        required: "Este campo es obligatorio",
      }
    }
  });
}

if ($("#formStore").length > 0) {
  $("#formStore").validate({
    rules: {
      store_id: {
        required: true
      },
      district_id: {
        required: true
      },
      name: {
        required: true
      },
      description: {
        required: true
      },
      logo: {
        required: true,
      }
    },
    messages: {
      store_id: {
        required: "Este campo es obligatorio"
      },
      district_id: {
        required: "Este campo es obligatorio"
      },
      name: {
        required: "Este campo es obligatorio"
      },
      description: {
        required: "Este campo es obligatorio"
      },
      logo: {
        required: "Este campo es obligatorio",
      },
    }
  });
}
if ($("#formTypeStore").length > 0) {
  $("#formTypeStore").validate({
    rules: {
      name: {
        required: true
      },
      image: {
        required: true
      },

    },
    messages: {
      name: {
        required: "Este campo es obligatorio"
      },
      image: {
        required: "Este campo es obligatorio"
      },
    }
  });
}
