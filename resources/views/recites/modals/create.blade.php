<div id="app">
    <v-app>
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
                <v-container>
                  <v-row>
                    <v-col cols="12" sm="6" md="12">
                      <v-text-field
                      label="Codigo"
                      v-model="var_codigo"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-text-field
                      label="Nombre"
                      v-model="var_nombre"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-text-field
                      label="Descripcion"
                      v-model="var_description"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                      label="Precio"
                      v-model="var_precio"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-select
                      :items="items_tipo_receta"
                      label="tipo receta"
                      return-object
                      item-text="text"
                      v-model="var_tipo_receta_selected"
                      ></v-select>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                      label="Cantidad de porciones"
                      v-model="var_cantidad_porciones"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-select
                      :items="items_stores"
                      label="Seleccionar Tienda"
                      return-object
                      item-text="name"
                      v-model="var_tienda_selected"
                      ></v-select>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-select
                      :items="items_productos_receta"
                      label="Seleccionar ingrediente"
                      return-object
                      item-text="name"
                      v-model="producto_receta_selected"
                      ></v-select>
                    </v-col>
                    <v-col cols="12" sm="6" md="3">
                      <v-text-field
                      label="Cant."
                      v-model="var_cantidad_ingrediente"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="3">
                      <v-text-field
                      label="U.M."
                      disabled
                      v-model="producto_receta_selected.um"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-btn color="success" block @click="addIngrediente(producto_receta_selected, var_cantidad_ingrediente)" >Agregar Ingrediente</v-btn>
                    </v-col>
                    <v-data-table dense :headers="headers" :items="items_ingrediente" item-key="name" class="elevation-1">
                      <template v-slot:item.accion="{item}" >
                      <v-btn color="success" small icon @click="deleteIngrediente(item)"  >X</v-btn>
                      </template>
                    </v-data-table>

                    <v-col cols="12" sm="6" md="12">
                      <v-file-input
                      label="Seleccionar imagen"
                      filled
                      prepend-icon="mdi-camera"
                      v-model="var_imagen"
                      ></v-file-input>
                    </v-col>
                    <v-col cols="12" sm="12" md="12">
                      <v-text-field
                      label="Video"
                      v-model="var_video"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-container>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                  <button type="submit" class="btn btn-primary" @click="addReceta" >Guardar Receta</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </v-app>
</div>
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
      { text: 'Cantidad', value: 'cantidad' },
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
  },
  mounted(){
    this.getPRoductosReceta()
  },
  methods:{
    async getPRoductosReceta(){
      try {
        let {data} = await axios('/productos/recetas')
        this.items_productos_receta = data
      } catch(e) {
        console.log(e);
      }
    },
    async addIngrediente(item, cantidad){
      this.items_ingrediente.push({ id: item.id, name:item.name, cantidad, um:item.um, quantity: item.quantity })
      this.var_cantidad_ingrediente = 0
      this.producto_receta_selected = ''
    },
    async deleteIngrediente(ingrediente){
      let index = this.items_ingrediente.findIndex(item => item.id === ingrediente.id)
      this.items_ingrediente.splice(index,1)

    },
    async addReceta(){
        try {
          var formData = new  FormData();
          var model = {
            code: this.var_codigo,
            name: this.var_nombre,
            storeId: this.var_tienda_selected.id,
            servings: this.var_cantidad_porciones,
            price: this.var_precio,
            products_recipe_id: this.items_ingrediente,
            type: this.var_tipo_receta_selected.value,
            link: this.var_video.value,
            description: this.var_description.value,
          }
          formData.append('image', this.var_imagen)
          formData.append('model', JSON.stringify(model)
          )

        let {data} = await axios.post('/recetas/create', formData, {
          headers: {'Content-Type': 'multipart/form-data'}
        })
        location.reload();
        } catch(e) {
        console.log(e);
        }
    }
  }
})
</script>
