require('./bootstrap');

require('alpinejs');
import { createApp } from 'vue'
import router from "./router.js"
import store from "./store.js"
import ExampleComponent from "./components/ExampleComponent.vue";
import Home from "./components/Home.vue";
import AddCar from "./components/AddCar.vue";
import MoreDetails from "./components/MoreDetails.vue";
import MainAdd from "./components/MainAdd";
import MainHome from "./components/MainHome";
import Profile from "./components/Profile";
const app = createApp({
    data() {
        return {
            foo: ''
        }
    },
    components: {
        ExampleComponent,
        Home,
        AddCar,
        MoreDetails,
        MainAdd,
        Profile,
        MainHome
    }
})
    app.use(router)
    app.use(store)
    app.mount('.app')
app.config.globalProperties.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
app.config.devtools = false;


