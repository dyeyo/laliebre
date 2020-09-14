<v-app>
  <div class="modal fade{{--  show --}} bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"{{--  style="display:block;" --}}>
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Receta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <v-container>
            <v-form ref="createForm" >
              <v-row>
                <v-col cols="12" sm="6" md="12">
                  <v-text-field
                  label="Codigo"
                  v-model="var_codigo"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6" md="12">
                  <v-text-field
                  label="Nombre"
                  v-model="var_nombre"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6" md="12">
                  <v-text-field
                  label="Descripcion"
                  v-model="var_description"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="6" sm="6" md="6">
                  <v-text-field
                  label="Precio"
                  v-model="var_precio"
                  ></v-text-field>
                </v-col>
                <v-col cols="6" sm="6" md="6">
                  <v-select
                  :items="items_tipo_receta"
                  label="tipo receta"
                  return-object
                  item-text="text"
                  v-model="var_tipo_receta_selected"
                  ></v-select>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="4" sm="6" md="6">
                  <v-text-field
                  label="Cantidad de porciones"
                  v-model="var_cantidad_porciones"
                  ></v-text-field>
                </v-col>
                <v-col cols="4" sm="6" md="6">
                  <v-select
                  :items="items_stores"
                  label="Seleccionar Tienda"
                  return-object
                  item-text="name"
                  v-model="var_tienda_selected"
                  ></v-select>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="4" sm="12" md="4">
                  <v-select
                  :items="items_productos_receta"
                  label="Seleccionar ingrediente"
                  return-object
                  item-text="name"
                  v-model="producto_receta_selected"
                  ></v-select>
                </v-col>
                <v-col cols="4" sm="12" md="4">
                  <v-text-field
                  label="Cant."
                  v-model="var_cantidad_ingrediente"
                  ></v-text-field>
                </v-col>
                <v-col cols="4" sm="12" md="4">
                  <v-text-field
                  label="U.M."
                  disabled
                  v-model="producto_receta_selected.um"
                  ></v-text-field>
                </v-col>
              </v-row>
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

              <v-col cols="12" sm="6" md="12">
                <v-text-field
                label="link"
                id="id"
                v-model="var_link"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="12">
                <v-textarea
                label="Descripcion"
                value=""
                v-model="description"
                ></v-textarea>
              </v-col>
            </v-form>
          </v-row>
        </v-container>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary" @click="addReceta" data-dismiss="modal">Guardar Receta</button>
        </div>
      </div>
    </div>
  </div>
</div>
</v-app>
