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
          <form action="{{ route('receta.store') }}" method="post" id="formRecetas" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Codigo</label>
              <input type="text" id="code" name="code" class="form-control form-control-line">
            </div>
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" id="name" name="name" class="form-control form-control-line">
            </div>
            <div class="form-group">
              <label>Tipo de receta</label>
              <select id="type" name="type" style="width:100%" class="select2 form-control form-control-line">
                <option value=""></option>
                <option value="1">Desayuno</option>
                <option value="2">Almuerzo</option>
                <option value="3">Antojo</option>
              </select>
            </div>

            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="servings">Cantidad de porciones</label>
                <input type="number" class="form-control text-danger" id="servings" name="servings" value="1" min="1" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="store_id">Seleccionar Tienda</label>
                <select class="custom-select" id="store_id" name="storeId" required>
                  <option selected disabled value="">Elegir...</option>
                  @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div id="product-row">
            {{-- INGREDIENTES --}}

              </div>

            <button id="product-add" class="btn btn-primary" type="button">Agregar Producto</button>
            <hr>
            <div class="form-group">
                <label>Descripcion</label>
                <textarea id="description" name="description" style="resize:none" class="form-control form-control-line text-danger"></textarea>
            </div>
            <div class="form-group">
              <label>Link Video</label>
              <input id="link" type="url" name="link" class="form-control form-control-line text-danger">
            </div>
            <div class="form-group">
              <label for="">Imagen del plato</label>
              <input id="image" type="file" class="form-control-file" name="image">
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
