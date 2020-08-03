@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Editar Receta</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/recetas">Recetas</a></li>
              <li class="breadcrumb-item active">Editar Receta {{$receta->name}}</li>
            </ol>
        </div>
    </div>
</div>
  <div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card"> <img class="card-img" src="{{asset('img/recetas/'.$receta->image)}}" height="456" alt="Card image">
          <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
              <div class="align-self-center">
                  <h4 class="card-title">{{$receta->name}}</h4>
                  <h6 class="card-subtitle">{{$receta->store->name}}</h6>
                  <p class="text-white">
                    {{$receta->description}}
                  </p>
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-body">
            <small class="text-muted">Nombre de la Receta</small>
              <h6>{{$receta->store->name}}</h6>
            <small class="text-muted p-t-30 db">Tienda Propietaria</small>
              <h6>{{$receta->store->name}}</h6>
              <small class="text-muted p-t-30 db">Descripcion de la receta</small>
              <h6> {{$receta->description}}</h6>
              <div class="map-box">
                <iframe src="{{URL::to($receta->link)}}" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen=""></iframe>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Editar recetas {{$receta->name}}</h4>
        @if(Session::has('message'))
          <div class="alert alert-success">
            {!! Session::get('message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        @endif
        <form action="{{ route('receta.update',$receta->id) }}" method="post" id="formRecetasEditar" enctype="multipart/form-data">
          @csrf
          {{ method_field('put') }}
          <div class="form-group">
            <label>Codigo</label>
            <input type="text" value="{{$receta->code}}" id="code" name="code" class="form-control form-control-line">
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" value="{{$receta->name}}" id="name" name="name" class="form-control form-control-line">
          </div>
          <div class="form-group">
            <label>Tipo de receta</label>
            <select id="type" name="type" style="width:100%" class="select2 form-control form-control-line">
              @if($receta->type === 1)
                <option value="1">Desayuno</option>
                <option value="2">Almuerzo</option>
                <option value="3">Antojo</option>
              @elseif($receta->type === 2)
                <option value="2">Almuerzo</option>
                <option value="1">Desayuno</option>
                <option value="3">Antojo</option>
              @else
                <option value="3">Antojo</option>
                <option value="2">Almuerzo</option>
                <option value="1">Desayuno</option>
              @endif
            </select>
          </div>
          <div id="product-row">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="servings">Cantidad de porciones</label>
                <input type="number" class="form-control text-danger" id="servings" name="servings" value="1" min="1" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="store_id">Seleccionar Tienda</label>
                <select class="select2 custom-select" id="store_id" style="width:100% !important" name="storeId" required>
                  <option selected disabled value="">Elegir...</option>
                  @foreach($stores as $store)
                    <option @if($receta->store->id === $store->id) selected='selected' @endif value="{{$store->id}}">{{$store->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          {{-- INGREDIENTES --}}
          <button id="product-add" class="btn btn-primary" type="button">Agregar Producto</button>
          <div class="form-group">
            <label>Descripcion</label>
            <textarea id="description" name="description" style="resize:none" class="form-control form-control-line text-danger">
              {{ltrim ($receta->description)}}
            </textarea>
          </div>
          <div class="form-group">
            <label>Link Video</label>
            <input id="link" type="url" value="{{$receta->link}}" name="link" class="form-control form-control-line text-danger">
          </div>
          <div class="form-group">
            <label for="">Imagen del plato</label>
            <input id="image" type="file" class="form-control-file" name="image">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar Receta</button>
              <a href="{{ route('recetas') }}" class="btn btn-warning">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
    {{-- <div class="card">
      <div class="card-body">
        <h4 class="card-title">Gestion de Ingredientes</h4>
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($ingredientes->productos as $ingrediete)
                  </tr>
                      <td>{{$ingrediete->name}}</td>
                      <td style="width: 20%" >
                        <img src="{{asset('img/recetas/'.$ingrediete->image)}}" class="img-responsive img-fluid" style="width: 76%;" alt="">
                      </td>
                      <td>
                        <form class="user"  action="{{route('ingrediente.delete', $ingrediete->id)}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button class="btn btn-btn-outline-light"  onclick="return confirm('¿Esta seguro de eliminar este registro?')"  type="submit">ELIMINAR</button>
                        </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div> --}}
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
    $('#product-row').append('<div class="form-row text-center">\
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
