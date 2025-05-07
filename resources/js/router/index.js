import { createRouter, createWebHistory } from 'vue-router';
import ProductList from '../components/ProductList.vue';
import EditProduct from '../components/EditProduct.vue';
import CreateProduct from '../components/CreateProduct.vue';
import HomePage from '../components/HomePage.vue';
import Profile from "@/components/Profile.vue";

const routes = [
    {
        path: '/',
        component: ProductList,
    },
    {
        path: '/products/create',
        component: CreateProduct,
    },
    {
        path: '/products/:id/edit',
        component: EditProduct,
    },
    {
        path: '/homepage',
        component: HomePage,
    },
    {
        path: '/profile/user',
        component: Profile,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
