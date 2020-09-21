<template>
    <div class="container">
        <ClienteObraComponent :getRoute="getRoute"></ClienteObraComponent>
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
                        <tr v-for="item in items" :key="item.producto_id">
                            <td>{{ getProductoName(item.producto_id) }}</td>
                            <td>{{ getCuentaName(item.cuenta_id) }}</td>
                            <td>{{ item.cantidad }}</td>
                            <td>{{ item.precio }}</td>
                            <td>{{ item.cantidad * item.precio }}</td>
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
    components: {
        ClienteObraComponent,
    },
    props: {
        productos: {
            type: Array,
            required: true,
        },
        cuentas: {
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
            defaultForm: {
                producto_id: null,
                cuenta_id: null,
                cantidad: null,
                precio: null,
            },
            form: {
                producto_id: null,
                cuenta_id: null,
                cantidad: null,
                precio: null,
            },
            items: [],
        };
    },
    methods: {
        save() {
            const orden_compra = this.items
            axios.post(this.storeRoute, {...orden_compra}).then(resp => {
                if (resp.statusCode == 200) {
                    console.log(resp.data)
                }            })
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
            var producto = this.productos.find(producto => producto.id == productoId)

            if (producto != null) {
                return producto.nombre;
            }
            return ''
        },
        getCuentaName(cuentaId) {
            var cuenta = this.cuentas.find(cuenta => cuenta.id == cuentaId);

            if (cuenta != null) {
                return cuenta.nombre;
            }
            return ''
        }
    },
};
</script>
