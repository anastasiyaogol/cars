import { createRouter, createWebHistory } from 'vue-router'
import ExampleComponent from "./components/ExampleComponent.vue";
import Home from "./components/Home.vue";
import AddCar from "./components/AddCar";
import MoreDetails from "./components/MoreDetails";
import Profile from "./components/Profile";
const routes = [
    { path: '/', component: Home},
    {path: '/addcar', component: AddCar},
    {path: '/moredetails/:id', name:'article',component: MoreDetails,props:true},
    {path: '/dashboard',component: Profile}
]
export default createRouter({
    history: createWebHistory(),
    routes
})
