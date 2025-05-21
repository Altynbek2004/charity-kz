import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
// Импорт компонентов
import NewsSection from './components/NewsSection.vue';
import ContactForm from './components/ContactForm.vue';


import en from '../locales/en.json';
import kz from '../locales/kz.json';
import ru from '../locales/ru.json';
import {createI18n} from "vue-i18n";

const i18n = createI18n({
    locale:'kz',
    fallbackLocale:'en',
    messages: {
        en,
        kz,
        ru
    }
})

// Set axios defaults
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found');
}

createApp(App)
    .use(router)
    .use(i18n)
    .component('contact-form', ContactForm)
    .component('news-section', NewsSection)
    .mount('#app');



