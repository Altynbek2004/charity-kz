<template>
    <div class="font-sans bg-[#dfcfe6]">
        <nav class="bg-pink-300 shadow-md py-4">
            <div class="container mx-auto max-w-screen-xl px-4 flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0">

                <!-- Лого және мәзір -->
                <div class="flex items-center gap-6">
                    <img src="/storage/app/public/navbarImage/logo.png" alt="QOLDAU" class="h-12 w-12 rounded-full">
                    <ul class="flex gap-6 text-sm font-semibold text-gray-800">
                        <li><button class="hover:underline">Мәзір</button></li>
                        <li><a href="#" class="hover:underline">Көмек алу</a></li>
                    </ul>
                </div>

                <!-- Көмек беру / Кіру және тілдер -->
                <div class="flex flex-wrap items-center gap-4">
                    <button class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-4 rounded-xl shadow">
                        Көмек беру
                    </button>

                    <button @click="showModal = 'login'" class="bg-sky-400 hover:bg-sky-500 text-white font-medium py-2 px-4 rounded-xl shadow">
                        Кіру
                    </button>

                    <!-- Модальное окно -->
                    <div v-if="showModal" class="fixed inset-0 flex items-center justify-center z-50">
                        <div @click="closeModal" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

                        <!-- Login Modal -->
                        <div v-if="showModal === 'login'" class="relative bg-white rounded-3xl w-96 p-8 shadow-lg z-10">
                            <h2 class="text-center text-2xl font-bold mb-6">Войти</h2>

                            <div class="mb-4 relative">
                                <input type="text" v-model="phone" @input="formatPhoneNumber" maxlength="16" placeholder="+7 ___ ___ __ __" class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]" />
                            </div>
                            <div class="mb-4 relative">
                                <input :type="isVisible ? 'text' : 'password'" placeholder="Введите пароль" class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]" />
                                <span @click="toggleVisibility" class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-[#cda57d] transition-colors">
                                    <component :is="isVisible ? 'eye-off-icon' : 'eye-icon'" class="w-5 h-5" />
                                </span>
                            </div>

                            <button class="w-full py-3 bg-[#cda57d] text-white rounded-lg font-bold mb-4">Войти</button>
                            <button @click="showModal = 'register'" class="w-full py-3 border-2 border-[#cda57d] text-[#cda57d] rounded-lg font-bold mb-4">Зарегистрироваться</button>
                            <p class="text-xs text-center text-gray-500 mb-4">
                                Нажимая на кнопку «Зарегистрироваться», вы соглашаетесь с условиями <a href="#" class="text-[#cda57d] underline">договора-оферты</a> и даете согласие на обработку <a href="#" class="text-[#cda57d] underline">персональных данных</a>.
                            </p>
                            <a href="#" class="text-center block text-[#cda57d]">Забыл пароль</a>
                        </div>

                        <!-- Register Modal -->
                        <div v-if="showModal === 'register'" class="fixed inset-0 flex items-center justify-center z-50">
                            <div @click="closeModal" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

                            <div class="relative bg-white rounded-3xl w-96 p-8 shadow-lg z-10">
                                <h2 class="text-center text-2xl font-bold mb-6">Зарегистрироваться</h2>

                                <div v-if="step === 1" class="mb-4">
                                    <input
                                        v-model="email"
                                        @input="validateEmail"
                                        placeholder="Введите email"
                                        class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]"
                                    />
                                    <button :disabled="!validEmail" @click="nextStep" class="w-full mt-4 py-3 bg-[#cda57d] text-white rounded-lg font-bold">
                                        Получить код
                                    </button>
                                </div>

                                <div v-if="step === 2" class="mb-4">
                                    <input
                                        v-model="code"
                                        @input="validateCode"
                                        maxlength="6"
                                        placeholder="Введите код"
                                        class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]"
                                    />
                                    <button :disabled="code.length !== 6" @click="nextStep" class="w-full mt-4 py-3 bg-[#cda57d] text-white rounded-lg font-bold">
                                        Далее
                                    </button>
                                </div>

                                <div v-if="step === 3" class="mb-4">
                                    <input
                                        v-model="password"
                                        type="password"
                                        placeholder="Создайте пароль"
                                        class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]"
                                    />
                                    <button :disabled="password.length < 6" @click="submitForm" class="w-full mt-4 py-3 bg-[#cda57d] text-white rounded-lg font-bold">
                                        Создать пароль
                                    </button>
                                </div>

                                <button @click="closeModal" class="w-full mt-4 py-3 border-2 border-[#cda57d] text-[#cda57d] rounded-lg font-bold">
                                    Отмена
                                </button>
                            </div>

                        </div>
                    </div>


                    <!-- Тілдер -->
                    <div class="flex items-center gap-2">
                        <img src="https://flagcdn.com/w40/kz.png" alt="KZ" class="h-5 w-5 rounded-full" />
                        <img src="https://flagcdn.com/w40/gb.png" alt="EN" class="h-5 w-5 rounded-full" />
                        <img src="https://flagcdn.com/w40/ru.png" alt="RU" class="h-5 w-5 rounded-full" />
                    </div>
                </div>
            </div>
        </nav>
        <div class="fixed inset-0 -z-10">
            <div class="absolute inset-0 bg-gradient-to-br from-violet-900/20 via-purple-900/20 to-fuchsia-900/20"></div>
            <div class="absolute top-1/4 left-1/4 w-48 h-48 sm:w-96 sm:h-96 bg-violet-500/10 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-48 h-48 sm:w-96 sm:h-96 bg-fuchsia-500/10 rounded-full filter blur-3xl"></div>
        </div>

        <!-- Main container -->
        <div class="w-full max-w-7xl mx-auto">
            <!-- Carousel container -->
            <div class="carousel-container relative">
                <!-- Progress bar -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-white/10 rounded-full overflow-hidden z-20">
                    <div class="progress-bar absolute top-0 left-0 h-full w-1/3 bg-gradient-to-r from-violet-500 to-fuchsia-500"></div>
                </div>

                <!-- Navigation buttons -->
                <button class="nav-button absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center z-20 text-white touch-manipulation" onclick="prevSlide()" title="Previous slide">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <button class="nav-button absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center z-20 text-white touch-manipulation" onclick="nextSlide()" title="Next slide">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Carousel track -->
                <div class="carousel-track relative h-[400px] sm:h-[500px] md:h-[600px] overflow-hidden">
                    <!-- Carousel items -->
                    <div class="carousel-item active absolute top-0 left-0 w-full h-full">
                        <div class="w-full h-full p-4 sm:p-8">
                            <div class="w-full h-full rounded-xl sm:rounded-2xl overflow-hidden relative group">
                                <img src="/storage/app/public/navbarImage/unsplash1.png" alt="Geometric art installation" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                <div class="absolute inset-0 bg-gradient-to-br from-violet-500/40 to-purple-500/40 mix-blend-overlay"></div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item next absolute top-0 left-0 w-full h-full">
                        <div class="w-full h-full p-4 sm:p-8">
                            <div class="w-full h-full rounded-xl sm:rounded-2xl overflow-hidden relative group">
                                <img src="/storage/app/public/navbarImage/unsplash2.png" alt="Futuristic tech setup" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                <div class="absolute inset-0 bg-gradient-to-br from-fuchsia-500/40 to-pink-500/40 mix-blend-overlay"></div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item hidden absolute top-0 left-0 w-full h-full">
                        <div class="w-full h-full p-4 sm:p-8">
                            <div class="w-full h-full rounded-xl sm:rounded-2xl overflow-hidden relative group">
                                <img src="/storage/app/public/navbarImage/unsplash3.png" alt="Abstract digital art" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                <div class="absolute inset-0 bg-gradient-to-br from-pink-500/40 to-rose-500/40 mix-blend-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Indicators -->
                <div class="absolute bottom-2 sm:bottom-4 left-1/2 -translate-x-1/2 flex gap-1 sm:gap-2 z-20">
                    <button class="w-8 sm:w-12 h-1 sm:h-1.5 rounded-full bg-white/40 hover:bg-white/60 transition-colors" title="Go to slide 1"></button>
                    <button class="w-8 sm:w-12 h-1 sm:h-1.5 rounded-full bg-white/20 hover:bg-white/60 transition-colors" title="Go to slide 2"></button>
                    <button class="w-8 sm:w-12 h-1 sm:h-1.5 rounded-full bg-white/20 hover:bg-white/60 transition-colors" title="Go to slide 3"></button>
                </div>
            </div>
        </div>
    </div>
    <HomePage></HomePage>
</template>

<script>
import axios from 'axios';
import HomePage from './HomePage.vue';
import VueTheMask from 'vue-the-mask';
import { ref } from 'vue';
import { Eye, EyeOff } from 'lucide-vue-next';

export default {
    directives: {
      mask:VueTheMask.mask,
    },
    data() {
        return {
            products: [],
            currentSlide: 0,
            slides: [],
            indicators: [],
            progressBar: null,
            autoAdvanceTimer: null,
            touchStartX: 0,
            touchEndX: 0,
            showModal: false,
            phone:"+7 ",
            step:1,
            email:"",
            validEmail: false,
            code:"",
            password: "",
        };
    },

    components: {
        HomePage,
        'eye-icon': Eye,
        'eye-off-icon': EyeOff
    },

    setup() {
        const showModal = ref('');
        const isVisible = ref(false);
        const phone = ref('+7 ');
        const email = ref('');
        const verificationCode = ref('');
        const verificationSent = ref(false);
        const isVerified = ref(false);

        const closeModal = () => (showModal.value = '');
        const toggleVisibility = () => (isVisible.value = !isVisible.value);
        const formatPhoneNumber = () => {
            phone.value = phone.value.replace(/[^\d+]/g, '').replace(/(.{3})(.{3})(.{3})(.{2})(.{2})/, '$1 $2 $3 $4 $5').substring(0, 16);
        };
        const sendVerificationCode = () => (verificationSent.value = true);
        const verifyCode = () => (isVerified.value = true);

        return { showModal, isVisible, phone, email, verificationCode, verificationSent, isVerified, closeModal, toggleVisibility, formatPhoneNumber, sendVerificationCode, verifyCode };
    },

    async created() {
        const response = await axios.get('/api/products');
        this.products = response.data;
    },
    methods: {
        closeModal() {
            this.showModal = false;
            this.step = 1;
            this.email = "";
            this.code = "";
            this.password = "";
        },
        validateEmail() {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            this.validEmail = emailPattern.test(this.email);
        },
        validateCode() {
            this.code = this.code.replace(/[^0-9]/g, "").slice(0, 6);
        },
        nextStep() {
            this.step++;
        },
        submitForm() {
            alert(`Пароль создан: ${this.password}`);
            this.closeModal();
        },
        formatPhoneNumber() {
            let digits = this.phone.replace(/\D/g, "");

            if (!digits.startsWith("7")) {
                digits = "7" + digits;
            }

            if (digits.length > 11) {
                digits = digits.slice(0, 11);
            }

            this.phone = `+7 ${digits.slice(1, 4)} ${digits.slice(4, 7)} ${digits.slice(7, 11)}`.trim();
        },
        async deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                await axios.delete(`/api/products/${id}`);
                this.products = this.products.filter(product => product.id !== id);
            }
        },
    },
};
</script>

<style scoped>
.create-btn, .delete-btn {
    margin-left: 10px;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
}
.delete-btn {
    background-color: red;
    color: white;
}
.create-btn {
    display: block;
    margin-top: 20px;
    background-color: green;
    color: white;
    text-align: center;
    text-decoration: none;
    padding: 8px 12px;
}
</style>
