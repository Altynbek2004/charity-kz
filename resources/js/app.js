import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import ChatApp from './components/design/Chat.vue'
// Импорт компонентов
import NewsSection from './components/NewsSection.vue';
import ContactForm from './components/ContactForm.vue';


import en from '../locales/en.json';
import kz from '../locales/kz.json';
import ru from '../locales/ru.json';
import {createI18n} from "vue-i18n";
import axios from "axios";

const i18n = createI18n({
    locale:'kz',
    fallbackLocale:'en',
    messages: {
        en,
        kz,
        ru
    }
})





window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Axios-ты дұрыс конфигурациялау


const authToken = localStorage.getItem('token');
if (authToken) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${authToken}`;
}



// 🛡️ CSRF токен — Laravel үшін қажет

const csrfTokenMeta = document.head.querySelector('meta[name="csrf-token"]');
if (csrfTokenMeta) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfTokenMeta.content;
} else {
    console.error('CSRF token not found');
}

createApp(App)
    .use(router)
    .use(i18n)
    .component('contact-form', ContactForm)
    .component('news-section', NewsSection)
    .component('chat-app', ChatApp)
    .mount('#app');



