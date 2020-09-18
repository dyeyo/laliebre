@extends('layouts.app')
@section('content')
<div id="app">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Recetas</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
          <li class="breadcrumb-item active">Recetas</li>
          <li class="breadcrumb-item" >
            <button type="button" id="btncelular" style="display:none" class="btn btn-info " data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>
              Agregar
            </button>
          </li>
        </ol>
        <button type="button" class="btn btn-info btngrande d-none d-lg-block m-l-15" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus-circle"></i>
          Agregar Receta
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Listado de Recetas</h4>
          @if(Session::has('message'))
          <div class="alert alert-success">
            {!! Session::get('message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
          @endif
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Ingredientes</th>
                  <th>Foto</th>
                  <th>Ver</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                @foreach($recipes as $recipe)
                <tr>
                  <td>{{$recipe->name}}</td>
                  <td>
                    @foreach($recipe->productos as $ingredientes)
                    <span>{{$ingredientes->name}} / </span>
                    @endforeach
                  </td>
                  <td style="width: 20%" >
                    <img src="{{asset('img/recetas/'.$recipe->image)}}" class="img-responsive img-fluid" style="width: 76%;" alt="">
                  </td>
                  <td>
                    <a href="{{route('receta.show', $recipe->id)}}" class="btn btn-btn-outline-light">Ver</a>
                    {{-- <button type="button" data-toggle="modal" @click="verModal({{$recipe}})" data-target="#exampleVerModal">
                      <i class="fas fa-eye"></i>
                      Ver
                    </button> --}}
                  </td>
                  <td>
                    <button type="button" data-toggle="modal" @click="editarModal({{$recipe}})" data-target="#exampleEditarModal">
                      <i class="fas fa-pencil-alt"></i>
                      Editar
                    </button>
                    {{-- <a href="{{route('receta.edit', $recipe->id)}}" class="btn btn-btn-outline-light">EDITAR</a> --}}
                  </td>
                  <td>
                    <form class="user" action="{{ route('receta.delete' , $recipe -> id) }}" method="Get">
                      {{ method_field('delete') }}
                      {{csrf_field()}}
                      <button type="submit" data-toggle="modal" onclick="return confirm('¿Esta seguro de eliminar este registro con nombre {{ $recipe->name }}?')">
                        <i class="fas fa-trash"></i>
                        Eliminar
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal ver -->
  @include('recites.modals.ver')
  <!-- Modal create -->
  @include('recites.modals.create')
  <!-- Modal edit -->
  @include('recites.modals.edit')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet" sync>
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet" sync>
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet" sync>
<script>
  var app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data: {
      items_stores: {!! $stores !!},
      items_tipo_receta: [
      { text: 'Desayuno', value:1 },
      { text: 'Almuerzo', value:2 },
      { text: 'Antojo', value:3 }
      ],
      items_productos_receta: [],
      producto_receta_selected: '',
      items_ingrediente: [],
      headers: [
      {
        text: 'Nombre Ingrediente',
        align: 'start',
        sortable: false,
        value: 'name',
      },
      // TOCADO POR RICHARD 
      // { text: 'Cantidad', value: 'cantidad' },
      { text: 'Cantidad', value: 'quantity_producto' },
      { text: 'Unidad de medida', value: 'um' },
      { text: 'accion', value: 'accion' },
      ],
      headersEdit: [
      {
        text: 'Nombre Ingrediente',
        align: 'start',
        sortable: false,
        value: 'name',
      },
      { text: 'Unidad de medida', value: 'um' },
      { text: 'accion', value: 'accion' },
      ],
      var_cantidad_ingrediente: 0,
      var_imagen: [],
      var_codigo: '',
      var_nombre: '',
      var_precio: '',
      var_video:'',
      var_description:'',
      var_tipo_receta_selected: '',
      var_cantidad_porciones: '',
      var_tienda_selected: '',
      var_link: '',
      description: '',
      Edit_receta: [],
      rules: {
        required: value => !!value || 'Este campo es requerido',
      },
      verPropiedadesReceta: [],     //creado por richard
      verPropiedadesRecetaimagen: false     //creado por richard
    },
    mounted(){
      this.getPRoductosReceta()
    },
    methods:{
      // metodo creado por richard
      editarModal(objeto){
        try{
          console.log(this.items_stores)
          this.verPropiedadesReceta = {
            id: objeto.id,
            code: objeto.code,
            name: objeto.name,
            storeId: this.items_stores.find(obj => obj.id === objeto.storeId),
            servings: objeto.servings,
            price: objeto.price,
            productos: objeto.productos,
            type: parseInt(objeto.type),
            link: objeto.link,
            description: objeto.description
          }
          if(objeto.image != ''){
            this.verPropiedadesRecetaimagen = true
          }else{
            this.verPropiedadesRecetaimagen = false
          }

        }catch(e){
          console.log(e)
        }
      },
      async editarReceta(id){
        var URL = `/recetas/editar/${id}`
        try{
          let {data} = await axios(URL)
          this.Edit_receta = data
        }catch(e){
          console.log(e)
        }
      },
      async getPRoductosReceta(){
        try {
          let {data} = await axios('/productos/recetas')
          this.items_productos_receta = data
        } catch(e) {
          console.log(e);
        }
      },
      async addIngrediente(item, cantidad){
        this.items_ingrediente.push({ id: item.id, name:item.name, quantity_producto:cantidad, um:item.um, quantity: item.quantity })
        this.var_cantidad_ingrediente = 0
        this.producto_receta_selected = ''
      },
      async addIngredienteEditar(item, cantidad){
        console.log(item)
        console.log(cantidad)
        // aqui deberia verificar si ya existe el eliemento en la lista pa poderlo agregar
        this.verPropiedadesReceta.productos.push({ id: item.id, name:item.name, quantity_producto:cantidad, um:item.um, quantity: item.quantity })
        this.var_cantidad_ingrediente = 0
        this.producto_receta_selected = ''
      },
      async deleteIngrediente(ingrediente){
        let index = this.items_ingrediente.findIndex(item => item.id === ingrediente.id)
        this.items_ingrediente.splice(index,1)
      },
      // metodo tocado por richard
      async deleteIngredienteEditar(ingrediente){
        let index = this.verPropiedadesReceta.productos.findIndex(item => item.products_recipe_id === ingrediente.products_recipe_id)
        this.verPropiedadesReceta.productos.splice(index,1)
        // var URL = `/recetas/ingrediente/${ingrediente.id}`
        // try{
        //   let data = await axios.delete(URL)
        // }catch(e){
        //   console.log(e)
        // }
      },
      // metodo agregado por richard
      async EditarRecetaActualizada(item){
        var URL = `/recetas/editar`
        try{
          var formData = new  FormData();
          let imagen = formData.append('image', this.var_imagen)
          item.image = imagen
          let data = await axios.put(URL, item)
          location.reload()
          await this.getPRoductosReceta()
        }catch(e){
          console.log(e)
        }
      },
      async addReceta(){
        var formData = new  FormData();
        var model = {
          code: this.var_codigo,
          name: this.var_nombre,
          storeId: this.var_tienda_selected.id,
          servings: this.var_cantidad_porciones,
          price: this.var_precio,
          products_recipe_id: this.items_ingrediente,
          type: this.var_tipo_receta_selected.value,
          link: this.var_link,
          description: this.description
        }
        formData.append('image', this.var_imagen)
        formData.append('model', JSON.stringify(model))

        let {data} = await axios.post('/recetas/create', formData, {
          headers: {'Content-Type': 'multipart/form-data'},
        })
        location.reload()

      },
      // async EditarReceta(){
      //   var URL = `/recetas/${this.Edit_receta.id}`
      //   try{
      //     let data = await axios.put(URL, this.Edit_receta)
      //   }catch(e){
      //     console.log(e)
      //   }
      // }
    }
  })
</script>
<script>
  $(document).ready(function()
  {
    var productName = "";
    $.get("/productos/recetas", function(result) {
      let max = result.length;
      for (var i=0; i<max; i++) {
        productName += '<option value="'+result[i].id+'">'+ result[i].name+ ' x '+ result[i].quantity+' '+result[i].um+ '</option>';
      }
    })
    .fail(function(){
      alert('Uff! Algo salio mal (@E0)');
    });
    $('.btn-edit').click (function(e) {
      e.preventDefault();
      var id = $(this).prev('input').val();
      $.get("/recetas/productos/"+id, function(result) {
        $("#code").val(result.code);
        $("#name").val(result.name);
          // $("#store_id"   ).val(result.name);
          $("#editModal").modal("show");
          console.log(result);
        })
      .fail(function(){
        alert('Uff! Algo salio mal (@E0)');
      });
    });
      // var x = 2;
      $('#product-add').click (function(e) {
        e.preventDefault();
        toAll();
      });
      $('#product-add-2').click (function(e) {
        e.preventDefault();
        toAll();
      });
      $('#product-row').on("click",".remove-row",function(e) {
        e.preventDefault();
        $(this).parent('div').parent('div').remove();
          // x--;
        });
      function toAll()
      {
        // bro por lo menos fijate de mi codigo como concateno a esto lo que me refiero cuando te digo que esta mal tu codigo sirve pero no es asi no utilizas los recursos
        $('#product-row').append( '<div class="form-row text-center">\
          <div class="col-md-8 mb-3">\
          <select name="products_recipe_id[]" id="productosReceta" class="select2 custom-select text-danger" required>\
          <option selected disabled value="">Elegir...</option>'
          +productName+
          '</select>\
          </div>\
          <div class="col-md-3 mb-3">\
          <input type="number" class="form-control text-danger" name="quantity[]" value="1" min="1" required>\
          </div>\
          <div class="col-md-1 mb-3">\
          <button type="button" class="btn btn-light remove-row">X</button>\
          </div>\
          </div>');
        $('#productosReceta').change(function () {
          var productosReceta = $("#productosReceta").val();
          $.getJSON(route("infoProductos", { id: productosReceta }), function (data) {
            console.log(data.code);
            $("#codigo").val(data.code);
            $("#um").val(data.um);
          });
        })
        //PRODUCTOS POR TIENDAS
      }
    });
  </script>
  @endsection
