<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
        <!-- Navbar placeholder -->
        <navbar/>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Hero Section -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 text-sm font-medium rounded-full mb-6">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    Байланысқа шығыңыз
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                    Бізбен
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Хабарласыңыз
          </span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Сіздің пікіріңіз бізге маңызды. Сұрақтарыңыз бен ұсыныстарыңызды бізге жіберіңіз, біз тез арада жауап береміз.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/20 p-8 md:p-12">
                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-gray-900 mb-3">Хабарлама жіберу</h2>
                            <p class="text-gray-600">Төмендегі форманы толтырып, бізге хабарласа аласыз</p>
                        </div>

                        <form @submit.prevent="submitForm" class="space-y-6">
                            <!-- Name Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Аты <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input
                                            v-model="form.first_name"
                                            type="text"
                                            class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:bg-white transition-all duration-300 outline-none group-hover:border-gray-300"
                                            placeholder="Сіздің атыңыз"
                                        >
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <p v-if="errors.first_name" class="text-red-500 text-sm mt-2 font-medium">{{ errors.first_name[0] }}</p>
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Тегі <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input
                                            v-model="form.last_name"
                                            type="text"
                                            class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:bg-white transition-all duration-300 outline-none group-hover:border-gray-300"
                                            placeholder="Сіздің тегіңіз"
                                        >
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <p v-if="errors.last_name" class="text-red-500 text-sm mt-2 font-medium">{{ errors.last_name[0] }}</p>
                                </div>
                            </div>

                            <!-- Email & Phone -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Электрондық пошта <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input
                                            v-model="form.email"
                                            type="email"
                                            class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:bg-white transition-all duration-300 outline-none group-hover:border-gray-300"
                                            placeholder="example@email.com"
                                        >
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <p v-if="errors.email" class="text-red-500 text-sm mt-2 font-medium">{{ errors.email[0] }}</p>
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Телефон нөмірі
                                    </label>
                                    <div class="relative">
                                        <input
                                            v-model="form.phone"
                                            type="tel"
                                            class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:bg-white transition-all duration-300 outline-none group-hover:border-gray-300"
                                            placeholder="+7 (___) ___-__-__"
                                        >
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <p v-if="errors.phone" class="text-red-500 text-sm mt-2 font-medium">{{ errors.phone[0] }}</p>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Хабарлама <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                  <textarea
                      v-model="form.message"
                      rows="6"
                      class="w-full px-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:bg-white transition-all duration-300 outline-none group-hover:border-gray-300 resize-none"
                      placeholder="Сіздің хабарламаңызды осы жерге жазыңыз..."
                  ></textarea>
                                    <div class="absolute top-4 right-4">
                                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <p v-if="errors.message" class="text-red-500 text-sm mt-2 font-medium">{{ errors.message[0] }}</p>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button
                                    type="submit"
                                    :disabled="loading"
                                    class="w-full md:w-auto px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 disabled:opacity-70 disabled:cursor-not-allowed disabled:transform-none"
                                >
                  <span v-if="loading" class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Жіберілуде...
                  </span>
                                    <span v-else class="flex items-center justify-center">
                    Хабарлама жіберу
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                  </span>
                                </button>

                                <p v-if="success" class="text-green-600 font-semibold mt-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Хабарламаңыз сәтті жіберілді!
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8">
                    <!-- Contact Card -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/20 p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Байланыс ақпараты</h3>

                        <div class="space-y-6">
                            <div class="flex items-start space-x-4 group">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Мекенжайымыз</h4>
                                    <p class="text-gray-600">4517 Washington Ave. Manchester, Kentucky 39495</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 group">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Телефон</h4>
                                    <a href="tel:+8854476456" class="text-gray-600 hover:text-blue-600 transition-colors">+8854476456</a>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 group">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-pink-500 to-rose-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Электрондық пошта</h4>
                                    <a href="mailto:Givelifecharity@Gmail.Com" class="text-gray-600 hover:text-blue-600 transition-colors">Givelifecharity@Gmail.Com</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/20 p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Жұмыс уақыты</h3>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Дүйсенбі - Жұма</span>
                                <span class="font-semibold text-gray-900">09:00 - 18:00</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Сенбі</span>
                                <span class="font-semibold text-gray-900">10:00 - 16:00</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Жексенбі</span>
                                <span class="font-semibold text-red-500">Демалыс</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/20 p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Әлеуметтік желілер</h3>

                        <div class="flex space-x-4">
                            <a href="#" class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white hover:bg-blue-700 hover:scale-110 transition-all duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white hover:from-purple-600 hover:to-pink-600 hover:scale-110 transition-all duration-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.222.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.749-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Partners Section -->
            <div class="mt-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Серіктестеріміз</h2>
                    <p class="text-gray-600">Біз сенімді серіктестермен бірге жұмыс істейміз</p>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/20 p-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center">
                        <div class="flex justify-center group">
                            <img src="/storage/app/public/images/1.png" alt="Partner 1" class="h-16 opacity-60 grayscale group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300">
                        </div>
                        <div class="flex justify-center group">
                            <img src="/storage/app/public/images/2.png" alt="Partner 2" class="h-16 opacity-60 grayscale group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300">
                        </div>
                        <div class="flex justify-center group">
                            <img src="/storage/app/public/images/3.png" alt="Partner 3" class="h-16 opacity-60 grayscale group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300">
                        </div>
                        <div class="flex justify-center group">
                            <img src="/storage/app/public/images/4.png" alt="Partner 4" class="h-16 opacity-60 grayscale group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from './Navbar.vue';


export default {
    name: 'ContactForm',
    components: {
        Navbar,
    },

    data() {
        return {
            form: {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                message: ''
            },
            errors: {},
            loading: false,
            success: false
        }
    },
    methods: {
        async submitForm() {
            this.loading = true;
            this.errors = {};
            this.success = false;

            try {
                const params = this.form;
                 axios.post('/contact',params).then(response => {
                     if (response.data.success) {
                         setTimeout(() => {
                             this.success = true;
                         }, 2000);
                     }
                     this.resetForm();
                 });

            } catch (error) {
                if (error.response && error.response.data && error.response.data.errors) {
                    this.errors = error.response.data.errors;
                } else {
                    console.error('Error submitting form:', error);
                }
            } finally {
                this.loading = false;
            }
        },
        resetForm() {
            this.form = {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                message: ''
            };
        }
    }
}
</script>

<style scoped>

</style>
