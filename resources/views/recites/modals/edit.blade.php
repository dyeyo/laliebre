<v-app>
  <div class="modal fade{{--  show --}} bd-example-modal-xl" id="exampleEditarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"{{--  style="display:block;" --}}>
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Receta</h5>
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
                  v-model="verPropiedadesReceta.code"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6" md="12">
                  <v-text-field
                  label="Nombre"
                  v-model="verPropiedadesReceta.name"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6" md="12">
                  <v-text-field
                  label="Descripcion"
                  v-model="verPropiedadesReceta.descripction"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="6" sm="6" md="6">
                  <v-text-field
                  label="Precio"
                  v-model="verPropiedadesReceta.price"
                  ></v-text-field>
                </v-col>
                <v-col cols="6" sm="6" md="6">
                  <v-select
                  :items="items_tipo_receta"
                  label="tipo receta"
                  return-object
                  item-text="text"
                  v-model="verPropiedadesReceta.type"
                  ></v-select>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="4" sm="6" md="6">
                  <v-text-field
                  label="Cantidad de porciones"
                  v-model="verPropiedadesReceta.servings"
                  ></v-text-field>
                </v-col>
                <v-col cols="4" sm="6" md="6">
                  <v-select
                  :items="items_stores"
                  label="Seleccionar Tienda"
                  return-object
                  item-text="name"
                  v-model="verPropiedadesReceta.storeId"
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
                <!-- no sirve -->
                <v-btn color="success" block @click="addIngredienteEditar(producto_receta_selected, var_cantidad_ingrediente)" >Agregar Ingrediente</v-btn>
              </v-col>
              <v-data-table dense :headers="headers" :items="verPropiedadesReceta.productos" item-key="name" class="elevation-1">
                <template v-slot:item.accion="{item}" >
                  <v-btn color="success" small icon @click="deleteIngredienteEditar(item)"  >X</v-btn>
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
                v-model="verPropiedadesReceta.link"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="12">
                <v-textarea
                label="Descripcion"
                value=""
                v-model="verPropiedadesReceta.description"
                ></v-textarea>
              </v-col>
            </v-form>
          </v-row>
        </v-container>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" @click="EditarRecetaActualizada(verPropiedadesReceta)" data-dismiss="modal">Editar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </div>
  </div>
</div>
</v-app>
