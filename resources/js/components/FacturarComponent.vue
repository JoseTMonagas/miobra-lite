<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <v-autocomplete
                    v-model="selectedOrden"
                    :items="ordenesCompra"
                    dense
                    outlined
                    label="Si existe seleccione orden de compra"
                    item-text="id"
                    item-value="id"
                    @change="fillItems"
                ></v-autocomplete>
            </div>
            <div class="col-md-4">
                <v-autocomplete
                    v-model="selectedDcto"
                    :items="tipoDocumentos"
                    dense
                    outlined
                    label="Seleccione Tipo de Documento"
                    item-text="text"
                    item-value="value"
                    @change="fillItems"
                ></v-autocomplete>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <cliente-obra-component :getRoute="getRoute" @obra-changed="selectedObra = $event"></cliente-obra-component>
            </div>
        </div>
        <div class="row">
            <v-autocomplete
                class="col-md-4"
                dense
                outlined
                label="Seleccione Producto"
                v-model="form.producto_id"
                :items="productos"
                item-text="nombre"
                item-value="id"
            ></v-autocomplete>
            <v-autocomplete
                class="col-md-4 offset-md-1"
                dense
                outlined
                label="Seleccione Cuenta"
                :items="cuentas"
                item-text="nombre"
                item-value="id"
                v-model="form.cuenta_id"
            ></v-autocomplete>
        </div>
        <div class="row">
            <v-text-field
                class="col-md-3"
                dense
                outlined
                label="Cantidad"
                v-model="form.cantidad"
            ></v-text-field>
            <v-text-field
                class="col-md-3 offset-md-1"
                dense
                outlined
                label="Precio"
                v-model="form.precio"
            ></v-text-field>
            <v-btn class="col-md-1 offset-md-1" @click="addItem">Agregar</v-btn>
        </div>
        <div class="row">
            <v-simple-table class="col-md">
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Producto</th>
                            <th class="text-left">Cuenta</th>
                            <th class="text-left">Cantidad</th>
                            <th class="text-left">Precio</th>
                            <th class="text-left">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(index, item) in items" :key="index">
                            <td>
                                <v-autocomplete
                                    :items="productos"
                                    item-text="nombre"
                                    item-value="id"
                                    dense
                                    outlined
                                    v-model="items[index].producto_id"
                                ></v-autocomplete>
                            </td>
                            <td>
                                <v-autocomplete
                                    :items="cuentas"
                                    item-text="nombre"
                                    item-value="id"
                                    dense
                                    outlined
                                    v-model="items[index].cuenta_id"
                                ></v-autocomplete>
                            </td>
                            <td>
                                <v-text-field
                                    dense
                                    outlined
                                    v-model="items[index].cantidad"
                                ></v-text-field>
                            </td>
                            <td><v-text-field dense outlined v-model="items[index].precio"></v-text-field></td>
                            <td>{{ items[index].cantidad * items[index].precio }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </div>
        <div class="row">
            <v-btn @click="save">Guardar</v-btn>
        </div>
    </div>
</template>
<script>
import ClienteObraComponent from "./ClienteObraComponent.vue";

export default {
    component: {
        ClienteObraComponent: "ClienteObraComponent",
    },
    props: {
        cuentas: {
            type: Array,
            required: true,
        },
        productos: {
            type: Array,
            required: true,
        },
        ordenesCompra: {
            type: Array,
            required: true,
        },
        storeRoute: {
            type: String,
            required: true
        },
        getRoute: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            form: {
                producto_id: null,
                cuenta_id: null,
                cantidad: null,
                precio: null,
            },
            selectedOrden: null,
            selectedObra: null,
            items: [],
            tipoDocumentos: [
                { text: "Factura Electronica", value: "FACTURA ELECTRONICA" },
                { text: "Nota de Credito", value: "NOTA CREDITO" },
                { text: "Nota de Debito", value: "NOTA DEBITO" },
                { text: "Ingreso Interno", value: "INGRESO INTERNO" },
            ]
        };
    },
    methods: {
        save() {
            const orden_compra = this.items;
            const obra_id = this.selectedObra;
            const orden_compra_id = this.selectedOrden;
            axios.post(this.storeRoute, { ...orden_compra, obra_id, orden_compra_id }).then((resp) => {
                if (resp.statusCode == 200) {
                    console.log(resp.data);
                }
            });
        },
        addItem() {
            if (
                this.items.some((item) => {
                    item.producto_id == this.form.producto_id;
                })
            ) {
                return false;
            }
            const data = this.form;
            this.items.push({ ...data });
            Object.assign(this.form, this.defaultForm);
        },
        getProductoName(productoId) {
            var producto = this.productos.find(
                (producto) => producto.id == productoId
            );

            if (producto != null) {
                return producto.nombre;
            }
            return "";
        },
        getCuentaName(cuentaId) {
            var cuenta = this.cuentas.find((cuenta) => cuenta.id == cuentaId);

            if (cuenta != null) {
                return cuenta.nombre;
            }
            return "";
        },
        fillItems() {
            if (this.selectedOrden > 0) {
                var orden = this.ordenes.find(
                    (item) => item.id == this.selectedOrden
                );
                this.items = orden.productos;
            }
        },
    },
};
</script>
