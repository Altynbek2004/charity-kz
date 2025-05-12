import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
// Импорт компонентов
import NewsSection from './components/NewsSection.vue';

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

createApp(App).use(router).use(i18n).mount('#app');
