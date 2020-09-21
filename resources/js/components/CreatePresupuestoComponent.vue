<template>
    <div class="container">
        <div class="row">
            <v-autocomplete
                class="col-md-5"
                outlined
                dense
                v-model="selectedClient"
                :items="clientes"
                item-text="razon_social"
                item-value="id"
                label="Seleccione cliente"
            ></v-autocomplete>
            <v-autocomplete
                v-if="selectedClient != null"
                class="col-md-5 offset-md-2"
                outlined
                dense
                v-model="selectedObra"
                :items="obrasFiltered"
                item-text="nombre"
                item-value="id"
                label="Seleccione obra"
            ></v-autocomplete>
        </div>
        <div class="row" v-if="selectedObra != null">
            <v-autocomplete
                v-model="form.cuenta_id"
                outlined
                dense
                class="col-md-3"
                :items="cuentas"
                item-text="nombre"
                item-value="id"
                label="Seleccione Cuenta"
            ></v-autocomplete>
            <v-text-field
                class="col-md-2 offset-md-1"
                outlined
                v-model="form.costo"
                label="Costo"
                dense
            ></v-text-field>
            <v-text-field
                class="col-md-2 offset-md-1"
                outlined
                v-model="form.neto"
                label="Ingreso Neto"
                dense
            ></v-text-field>
            <v-btn class="col-md-2 offset-md-1" @click="addItem">Agregar</v-btn>
        </div>
        <div class="row">
            <div class="col-md">
                <v-simple-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">Cuenta</th>
                                <th class="text-left">Costo</th>
                                <th class="text-left">Neto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in items" :key="item.cuenta_id">
                                <td>{{ getCuentaName(item.cuenta_id) }}</td>
                                <td>{{ item.costo }}</td>
                                <td>{{ item.neto }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </div>
        </div>
        <div class="row">
            <v-btn @click="save">Guardar</v-btn>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        clientes: {
            type: Array,
            required: true,
        },
        obras: {
            type: Array,
            required: true,
        },
        cuentas: {
            type: Array,
            required: true,
        },
        presupuestoStore: {
            type: String,
            required: true
        }
    },
    computed: {
        obrasFiltered() {
            return this.obras.filter(
                (obra) => obra.cliente_id == this.selectedClient
            );
        },
    },
    data() {
        return {
            selectedClient: null,
            selectedObra: null,
            form: {
                cuenta_id: null,
                costo: null,
                neto: null,
            },
            items: [],
        };
    },
    methods: {
        addItem() {
            const form = {
                cuenta_id: null,
                costo: null,
                neto: null,
            };

            if (this.items.some(item => item.cuenta_id == form.cuenta_id)) {
                return false
            }

            this.items.push(this.form);
            this.form = form;
        },
        clear() {
            const form = {
                cuenta_id: null,
                costo: null,
                neto: null,
            };
            this.form = form;
            this.selectedClient = null;
            this.selectedObra = null;
            this.items = []
        },
        save() {
            const obra_id = this.selectedObra;
            const cuentas = this.items;
            axios.post(this.presupuestoStore, { obra_id, cuentas }).then(resp => {
                if (resp.statusCode == 200) {
                    window.location.href = resp.data
                } else {
                    this.clear()
                }
            })
        },
        getCuentaName(cuentaId) {
            var result = this.cuentas.filter((cuenta) => {return cuenta.id == cuentaId})

            if (result.length > 0) {
                return result[0].nombre;
            } else {
                return 'Not found';
            }
        }
    },
};
</script>
