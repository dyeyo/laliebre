if ($("#formCategorias").length > 0) {
  $("#formCategorias").validate({
    rules: {
      name: {
        required: true
      },
      description: {
        required: true
      },
      hallway_id: {
        required: true
      }
    },
    messages: {
      name: {
        required: "Este campo es obligatorio"
      },
      description: {
        required: "Este campo es obligatorio"
      },
      hallway_id: {
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
      hallway_id: {
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
      },
      image: {
        required: true,
      },
      quantity: {
        required: true,
        digits: true
      },
      umGeneral: {
        required: true
      }
    },
    messages: {
      categorie_id: {
        required: "Este campo es obligatorio"
      },
      store_id: {
        required: "Este campo es obligatorio"
      },
      umGeneral: {
        required: "Este campo es obligatorio"
      },
      hallway_id: {
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
      },
      image: {
        required: "Este campo es obligatorio",
      },
      quantity: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numero"
      }
    }
  });
}

if ($("#formProductosEdit").length > 0) {
  $("#formProductosEdit").validate({
    rules: {
      categorie_id: {
        required: true
      },
      store_id: {
        required: true
      },
      umGeneral: {
        required: true
      },
      hallway_id: {
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
      },
      quantity: {
        required: true,
        digits: true
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
      umGeneral: {
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
      quantity: {
        required: "Este campo es obligatorio",
        digits: "Este campo solo recibe numero"
      },
      price: {
        required: "Este campo es obligatorio",
      },
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
      },
      emailUser: {
        required: true,
        email: true,
      },
      password: {
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
      emailUser: {
        required: "Este campo es obligatorio",
        email: "Este campo debe ser un correo valido",
      },
      password: {
        required: "Este campo es obligatorio",
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

if ($("#formRecetas").length > 0) {
  $("#formRecetas").validate({
    rules: {
      code: {
        required: true
      },
      name: {
        required: true
      },
      quantity: {
        required: true
      },
      store_id: {
        required: true
      },
      producto_name: {
        required: true
      },
      product_quantity: {
        required: true
      },
      description: {
        required: true
      },
      link: {
        required: true,
        url: true
      },
      image: {
        required: true
      },
      type: {
        required: true
      },
      price: {
        required: true
      }
    },
    messages: {
      code: {
        required: "Este campo es obligatorio"
      },
      name: {
        required: "Este campo es obligatorio"
      },
      quantity: {
        required: "Este campo es obligatorio"
      },
      store_id: {
        required: "Este campo es obligatorio"
      },
      producto_name: {
        required: "Este campo es obligatorio"
      },
      product_quantity: {
        required: "Este campo es obligatorio"
      },
      description: {
        required: "Este campo es obligatorio"
      },
      price: {
        required: "Este campo es obligatorio"
      },
      link: {
        required: "Este campo es obligatorio",
        url: 'Este campo debe ser una url valida'
      },
      image: {
        required: "Este campo es obligatorio"
      },
      type: {
        required: "Este campo es obligatorio"
      },
    }
  });
}
if ($("#formRecetasEditar").length > 0) {
  $("#formRecetasEditar").validate({
    rules: {
      code: {
        required: true
      },
      name: {
        required: true
      },
      quantity: {
        required: true
      },
      store_id: {
        required: true
      },
      producto_name: {
        required: true
      },
      product_quantity: {
        required: true
      },
      description: {
        required: true
      },
      price: {
        required: true
      },
      link: {
        required: true,
        url: true
      },
      type: {
        required: true,
      }
    },
    messages: {
      code: {
        required: "Este campo es obligatorio"
      },
      name: {
        required: "Este campo es obligatorio"
      },
      quantity: {
        required: "Este campo es obligatorio"
      },
      type: {
        required: "Este campo es obligatorio"
      },
      price: {
        required: "Este campo es obligatorio"
      },
      store_id: {
        required: "Este campo es obligatorio"
      },
      producto_name: {
        required: "Este campo es obligatorio"
      },
      product_quantity: {
        required: "Este campo es obligatorio"
      },
      description: {
        required: "Este campo es obligatorio"
      },
      link: {
        required: "Este campo es obligatorio",
        url: 'Este campo debe ser una url valida'
      },
    }
  });
}
