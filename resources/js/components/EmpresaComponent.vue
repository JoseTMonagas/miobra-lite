<template>
    <v-card class="m-5 p-2">
        <v-card-title>Datos de la Empresa</v-card-title>

        <div class="row">
            <div class="col-md-5">
                <v-text-field
                    v-model="form.razon_social"
                    label="Razon Social"
                    outlined
                    dense
                    :readonly="editing"
                ></v-text-field>
            </div>
            <div class="col-md-2">
                <v-text-field
                    v-model="form.rut"
                    label="RUT"
                    outlined
                    dense
                    :readonly="editing"
                ></v-text-field>
            </div>

            <div class="col-md-5">
                <v-text-field
                    v-model="form.giro"
                    label="Giro"
                    outlined
                    dense
                    :readonly="editing"
                ></v-text-field>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <v-text-field
                    v-model="form.telefono"
                    label="Telefono"
                    outlined
                    dense
                    :readonly="editing"
                ></v-text-field>
            </div>

            <div class="col-md-4">
                <v-text-field
                    v-model="form.correo"
                    label="Correo"
                    outlined
                    dense
                    :readonly="editing"
                ></v-text-field>
            </div>

            <div class="col-md-4">
                <v-text-field
                    v-model="form.comuna"
                    label="Comuna"
                    outlined
                    dense
                    :readonly="editing"
                ></v-text-field>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <v-text-field
                    v-model="form.direccion"
                    label="Direccion"
                    outlined
                    dense
                    :readonly="editing"
                ></v-text-field>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <v-btn @click="edit" v-if="!editing">Editar</v-btn>
            </div>
            <div class="col-md-2">
                <v-btn @click="save" v-if="editing">Guardar</v-btn>
            </div>
            <div class="col-md-2">
                <v-btn @click="reset" v-if="editing">Cancelar</v-btn>
            </div>
        </div>
    </v-card>
</template>
<script>
export default {
    props: {
        empresa: {
            type: Object,
            required: true,
        },
        empresaStore: {
            type: String,
            required: true,
        },
    },
    created() {
        this.form.assign({}, this.empresa);
    },
    data() {
        return {
            disabled: false,
            editing: false,
            form: {},
        };
    },
    methods: {
        edit() {
            this.editing = true;
        },
        reset() {
            this.editing = false;
            this.form.assign({}, this.empresa);
        },
        save() {
            const data = this.form;
            axios.post(this.empresaStore, { ...data }).then((resp) => {
                if (resp.statusCode == 200) {
                    console.log(resp);
                } else {
                    this.reset();
                }
            });
        },
    },
};
</script>
