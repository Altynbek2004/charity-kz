import { createRouter, createWebHistory } from 'vue-router';
import ProductList from '../components/ProductList.vue';
import EditProduct from '../components/EditProduct.vue';
import CreateProduct from '../components/CreateProduct.vue';
import HomePage from '../components/HomePage.vue';
import Profile from "../components/Profile.vue";
import CharityGroup from "../components/CharityGroup.vue";
import GroupDetails from "../components/GroupDetails.vue";
import GetHelp from "../components/GetHelp.vue";
import MyCard from "../components/MyCard.vue";
import PsichologyAi from "../components/PsichologyAi.vue";
import GiveHelp from "../components/GiveHelp.vue";
import ContactForm from '../components/ContactForm.vue';

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
    },
    {
        path:'/create/group',
        component: CharityGroup
    },
    {
        path: '/group/:id',
        component: GroupDetails
    },
    {
        path: '/help',
        component: GetHelp
    },
    {
        path: '/my-card',
        component: MyCard
    },
    {
        path: '/ai',
        component: PsichologyAi
    },
    {
        path: '/give-help',
        component:GiveHelp
    },
    {
        path: '/contact-us',
        component:ContactForm
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
