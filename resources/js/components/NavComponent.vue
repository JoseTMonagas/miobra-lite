<template>
    <nav>
        <v-app-bar dense dark>
            <v-app-bar-nav-icon
                @click.stop="drawer = !drawer"
            ></v-app-bar-nav-icon>
            <v-toolbar-title>MiObra</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon>
                <v-icon></v-icon>
            </v-btn>
        </v-app-bar>
        <v-navigation-drawer v-model="drawer" absolute temporary>
            <v-list>
                <v-list-item href="/">
                    <v-list-item-icon>
                        <v-icon>mdi-home</v-icon>
                    </v-list-item-icon>

                    <v-list-item-title>Home</v-list-item-title>
                </v-list-item>

                <v-list-group>
                    <template v-slot:activator>
                        <v-list-item-title>Maestro</v-list-item-title>
                    </template>

                    <v-list-item link href="/empresa">
                        <v-list-item-title>
                            Empresa
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>

                    <v-list-item link href="/usuarios">
                        <v-list-item-title>
                            Usuarios
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>

                    <v-list-group dense  sub-group>
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Tablas</v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <v-list-item link href="/estados-obra">
                            <v-list-item-title
                                >Estados de Obra</v-list-item-title
                            >
                            <v-list-item-icon>
                                <v-icon></v-icon>
                            </v-list-item-icon>
                        </v-list-item>

                        <v-list-item link href="/controles-pago">
                            <v-list-item-title
                                >Controles de Pago</v-list-item-title
                            >
                            <v-list-item-icon>
                                <v-icon></v-icon>
                            </v-list-item-icon>
                        </v-list-item>

                        <v-list-item link href="/tipos-cuenta">
                            <v-list-item-title
                                >Tipos de Cuenta</v-list-item-title
                            >
                            <v-list-item-icon>
                                <v-icon></v-icon>
                            </v-list-item-icon>
                        </v-list-item>

                        <v-list-item link href="/medios-pago">
                            <v-list-item-title>Medios Pago</v-list-item-title>
                            <v-list-item-icon>
                                <v-icon></v-icon>
                            </v-list-item-icon>
                        </v-list-item>

                        <v-list-item link href="/bancos">
                            <v-list-item-title>Bancos</v-list-item-title>
                            <v-list-item-icon>
                                <v-icon></v-icon>
                            </v-list-item-icon>
                        </v-list-item>

                        <v-list-item link href="/indicadores">
                            <v-list-item-title>Indicadores</v-list-item-title>
                            <v-list-item-icon>
                                <v-icon></v-icon>
                            </v-list-item-icon>
                        </v-list-item>
                    </v-list-group>

                    <v-list-item link href="/productos">
                        <v-list-item-title>
                            Productos
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>
                </v-list-group>

                <v-list-group>
                    <template v-slot:activator>
                        <v-list-item-title>Ventas</v-list-item-title>
                    </template>

                    <v-list-item link href="/clientes">
                        <v-list-item-title>
                            Clientes
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>

                    <v-list-item link href="/obras">
                        <v-list-item-title>
                            Obras
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>


                    <v-list-item link href="/cuentas">
                        <v-list-item-title>
                            Cuentas
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>

                    <v-list-item link href="/presupuestos">
                        <v-list-item-title>
                            Presupuestos
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>

                    <v-list-item link href="/pagos">
                        <v-list-item-title>
                            Estados de Pago
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>

                    <v-list-item link href="/facturar">
                        <v-list-item-title>
                            Facturar
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>

                    <v-list-item link href="/reportes">
                        <v-list-item-title>
                            Reportes
                        </v-list-item-title>
                        <v-list-item-icon>
                            <v-icon></v-icon>
                        </v-list-item-icon>
                    </v-list-item>
                </v-list-group>
            </v-list>
        </v-navigation-drawer>
    </nav>
</template>
<script>
export default {
    data() {
        return {
            drawer: false,
            items: [
                { title: "Clientes", icon: "folder-shared", href: "/clientes" },
            ],
        };
    },
};
</script>
