    <v-app>
        <div class="modal fade{{--  show --}}" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"{{--  style="display:block;" --}}>
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Receta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <v-container>
                    <v-form ref="editForm">
                  <v-row>
                    <v-col cols="12" sm="6" md="12">
                      <v-text-field
                      :rules="[rules.required]"
                      label="Codigo"
                      v-model="Edit_receta.code"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-text-field
                      :rules="[rules.required]"
                      label="Nombre"
                      v-model="Edit_receta.name"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-text-field
                      :rules="[rules.required]"
                      label="Descripcion"
                      v-model="Edit_receta.description"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                      :rules="[rules.required]"
                      label="Precio"
                      v-model="Edit_receta.price"
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
                      :rules="[rules.required]"
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
                      :rules="[rules.required]"
                      label="U.M."
                      disabled
                      v-model="producto_receta_selected.um"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-btn color="success" block @click="addIngredienteEditar(producto_receta_selected, var_cantidad_ingrediente)" >Agregar Ingrediente</v-btn>
                    </v-col>
                    <v-data-table dense :headers="headersEdit" :items="Edit_receta.productos" item-key="name" class="elevation-1">
                      <template v-slot:item.accion="{item}" >
                      <v-btn color="success" small icon @click="deleteIngredienteEditar(item)"  >X</v-btn>
                      </template>
                    </v-data-table>
                  </v-row>
                  </v-form>
                </v-container>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                  <button type="submit" class="btn btn-primary" @click="EditarReceta" >Editar Receta</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </v-app>
