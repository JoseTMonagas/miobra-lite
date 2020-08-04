<template>
    <div class="row">
        <v-autocomplete
            class="col-md-5"
            outlined
            dense
            v-model="selectedClient"
            :items="clientes"
            item-text="nombre"
            item-value="id"
            label="Seleccione cliente"
        ></v-autocomplete>
        <input name="cliente_id" type="hidden" :value="selectedClient"/>
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
        <input name="obra_id" type="hidden" :value="selectedObra"/>
    </div>
</template>
<script>
export default {
    props: {
        getRoute: {
            type: String,
            default: '/clientes/obra'
        }
    },
    computed: {
        obraFiltered() {
            if (this.obras.length > 0) {
                return this.obras.filter(
                    (obra) => obra.cliente_id == this.selectedClient
                );
            }
            return []
        },
    },
    created() {
        this.getData();
    },
    data() {
        return {
            clientes: [],
            obras: [],
            selectedClient: null,
            selectedObra: null,
        };
    },
    watch: {
        selectedClient(val) {
            this.$emit("client-changed", val)
        },
        selectedOrden(val) {
            this.$emit("obra-changed", val)
        }
    },
    methods: {
        getData() {
            axios.get(this.getRoute).then(resp => {
                if (resp.statusCode == 200) {
                    this.clientes = resp.data.clientes;
                    this.obras = resp.data.obras;
                }
            })
        }
    },
};
</script>
