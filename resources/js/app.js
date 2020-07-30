/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import Vuetify from "vuetify";

window.Vue = require("vue");

Vue.use(Vuetify);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "navigation-component",
    require("./components/NavComponent.vue").default
);

Vue.component(
    "index-component",
    require("./components/IndexComponent.vue").default
);

Vue.component(
    "create-presupuesto",
    require("./components/CreatePresupuestoComponent.vue").default
);

Vue.component(
    "empresa-component",
    require("./components/EmpresaComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    vuetify: new Vuetify()
});