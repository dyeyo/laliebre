<div class="modal fade{{--  show --}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"{{--  style="display:block;" --}}>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Receta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('receta.store') }}" method="post" id="formCategorias" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Codigo</label>
              <input type="text" name="code" class="form-control form-control-line">
          </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control form-control-line">
            </div>

        <div id="product-row">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="quantity">Cantidad de porciones</label>
              <input type="number" class="form-control text-danger" name="quantity" value="1" min="1" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="store_id">Seleccionar Tienda</label>
              <select class="custom-select" name="store_id" required>
                <option selected disabled value="">Elegir...</option>
                @foreach($stores as $store)
                  <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-row text-center">
            <div class="col-md-2 mb-3">
              <label for="product_code"><br>Cod.</label>
              <input type="text" name="product_code[]" class="form-control form-control-line">
            </div>
            <div class="col-md-5 mb-3">
              <label for="producto_name">Nombre<br>producto</label>

              <select class="custom-select text-danger" name="producto_name[]" required>
                <option selected disabled value="">Elegir...</option>
              @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
              @endforeach
              </select>

            </div>
            <div class="col-md-2 mb-3">
              <label for="product_quantity">Cant. porción</label>
              <input type="number" class="form-control text-danger" name="product_quantity[]" value="1" min="1" required>
            </div>
            <div class="col-md-2 mb-3">
              <label for="product_unit">Unidad Medida</label>
              <select class="custom-select" name="product_unit[]" required>
                <option selected disabled value="">?</option>
                <option value="gm">gm</option>
                <option value="mg">mg</option>
              </select>
            </div>
            {{-- <div class="col-md-1 mb-3">
              <label for=""><br>.</label>
              <button type="button" class="btn btn-light btn-search">O</button>
            </div> --}}
            <div class="col-md-1 mb-3">
              <label for=""><br>.</label>
              <button type="button" class="btn btn-light btn-delete">X</button>
            </div>
          </div>

        </div>

        <button id="product-add" class="btn btn-primary" type="button">Agregar Producto</button>
        <hr>

            <div class="form-group">
                <label>Descripcion</label>
                <textarea name="description" style="resize:none" class="form-control form-control-line text-danger"></textarea>
            </div>
            <div class="form-group">
              <label>Link Video</label>
              <input type="url" name="link" class="form-control form-control-line text-danger">
          </div>
          <div class="form-group">
            <label for="">Imagen del plato</label>
            <input type="file" class="form-control-file" name="image">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Receta</button>
        </form>

        </div>
      </div>
    </div>
  </div>