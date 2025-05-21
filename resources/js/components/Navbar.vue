<template>
    <nav class="bg-pink-300 shadow-md py-4">
        <div class="container mx-auto max-w-screen-xl px-4 flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0">

            <!-- Лого және мәзір -->
            <div class="flex items-center gap-6">
                <a href="/" class="transition-transform duration-300 hover:scale-110">
                    <img  src="/storage/app/public/navbarImage/logo.png" alt="QOLDAU" class="h-12 w-12 rounded-full"/>
                </a>
                <ul class="flex gap-6 text-sm font-semibold text-gray-800">
                    <li><button class="hover:underline">{{ $t('menu') }}</button></li>
                    <li><a href="/help" class="hover:underline">{{ $t('get_help') }}</a></li>
                    <li><a href="/contact-us" class="hover:underline">{{ $t('contact_us') }}</a></li>
                </ul>
            </div>

            <!-- Көмек беру / Кіру және тілдер -->
            <div class="flex flex-wrap items-center gap-4">
                <a href="/give-help">
                    <button class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-4 rounded-xl shadow">
                        {{ $t('help')}}
                    </button>
                </a>

                <button v-if="!isLoggedIn" @click="showModal = 'login'" class="bg-sky-400 hover:bg-sky-500 text-white font-medium py-2 px-4 rounded-xl shadow">
                    {{$t('login')}}
                </button>

                <button
                    v-else
                    @click="goToProfile"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-xl shadow"
                >
                    My Profile
                </button>

                <!-- Модальное окно -->
                <div v-if="showModal" class="fixed inset-0 flex items-center justify-center z-50">
                    <div @click="closeModal" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

                    <!-- Login Modal -->
                    <div v-if="showModal === 'login'" class="relative bg-white rounded-3xl w-96 p-8 shadow-lg z-10">
                        <h2 class="text-center text-2xl font-bold mb-6">{{ $t('sign_in') }}</h2>

                        <div class="mb-4 relative">
                            <input type="email" v-model="email" placeholder="hello@example.com" class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]" />
                        </div>
                        <div class="mb-4 relative">
                            <input :type="isVisible ? 'text' : 'password'" v-model="password" placeholder="Введите пароль" class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]" />
                            <span @click="toggleVisibility" class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-[#cda57d] transition-colors">
                                    <component :is="isVisible ? 'eye-off-icon' : 'eye-icon'" class="w-5 h-5" />
                                </span>
                        </div>

                        <button @click="submitLogin" class="w-full py-3 bg-[#cda57d] text-white rounded-lg font-bold mb-4">
                            {{ $t('sign_in') }}
                        </button>


                        <button @click="showModal = 'register'" class="w-full py-3 border-2 border-[#cda57d] text-[#cda57d] rounded-lg font-bold mb-4">
                            {{ $t('sign_up') }}</button>
                        <p class="text-xs text-center text-gray-500 mb-4">
                            Нажимая на кнопку «Зарегистрироваться», вы соглашаетесь с условиями <a href="#" class="text-[#cda57d] underline">договора-оферты</a> и даете согласие на обработку <a href="#" class="text-[#cda57d] underline">персональных данных</a>.
                        </p>
                        <a href="#" class="text-center block text-[#cda57d]">{{$t('forgot_password')}}</a>
                    </div>

                    <!-- Register Modal -->
                    <div v-if="showModal === 'register'" class="fixed inset-0 flex items-center justify-center z-50">
                        <div @click="closeModal" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
                        <div class="relative bg-white rounded-3xl w-96 p-8 shadow-lg z-10">
                            <h2 class="text-center text-2xl font-bold mb-6">{{ $t('sign_up') }}</h2>

                            <div v-if="step === 1" class="mb-4">
                                <input
                                    v-model="email"
                                    @input="validateEmail"
                                    placeholder="Введите email"
                                    type="email"
                                    name="email"
                                    class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]"
                                />
                                <button :disabled="!validEmail" @click="sendCode" class="w-full mt-4 py-3 bg-[#cda57d] text-white rounded-lg font-bold">
                                    {{ $t('get_code') }}
                                </button>

                            </div>

                            <div v-if="step === 2" class="mb-4">
                                <input
                                    v-model="code"
                                    @input="validateCode"
                                    maxlength="6"
                                    placeholder="Введите код"
                                    name="code"
                                    class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]"
                                />
                                <button :disabled="code.length !== 6" @click="verifyCode" class="w-full mt-4 py-3 bg-[#cda57d] text-white rounded-lg font-bold">
                                    {{ $t('next') }}
                                </button>
                            </div>

                            <div v-if="step === 3" class="mb-4">
                                <input
                                    v-model="password"
                                    type="password"
                                    placeholder="Создайте пароль"
                                    name="password"
                                    class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:border-[#cda57d]"
                                />
                                <button @click="submitRegistration" class="w-full py-3 bg-[#cda57d] text-white rounded-lg font-bold mb-4">
                                    {{ $t('sign_up') }}
                                </button>
                            </div>

                            <button @click="closeModal" class="w-full mt-4 py-3 border-2 border-[#cda57d] text-[#cda57d] rounded-lg font-bold">
                                {{ $t('cancel')}}
                            </button>
                        </div>
                    </div>
                    <div>
                        <button @click="openRegister" class="bg-[#cda57d] text-white px-4 py-2 rounded-lg">{{ $t('sign_up') }}</button>
                    </div>

                </div>


                <!-- Тілдер -->
                <div class="flex items-center gap-2">
                    <button>
                        <img @click="changeLanguage('kz')" src="https://flagcdn.com/w40/kz.png" alt="KZ" class="h-5 w-5 rounded-full" />
                    </button>
                    <button>
                        <img @click="changeLanguage('en')" src="https://flagcdn.com/w40/gb.png" alt="EN" class="h-5 w-5 rounded-full" />
                    </button>
                    <button>
                        <img @click="changeLanguage('ru')" src="https://flagcdn.com/w40/ru.png" alt="RU" class="h-5 w-5 rounded-full" />
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="fixed inset-0 -z-10">
        <div class="absolute inset-0 bg-gradient-to-br from-violet-900/20 via-purple-900/20 to-fuchsia-900/20"></div>
        <div class="absolute top-1/4 left-1/4 w-48 h-48 sm:w-96 sm:h-96 bg-violet-500/10 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-48 h-48 sm:w-96 sm:h-96 bg-fuchsia-500/10 rounded-full filter blur-3xl"></div>
    </div>
</template>


<script>
import {ref} from "vue";
import axios from "axios";

export default {
    name: "Navbar",

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
            step:1,
            email:"",
            validEmail: true,
            code:"",
            password: "",
            loading: false,
            isLoggedIn: false,
            isVisible: false,

        };
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
        const sendVerificationCode = () => (verificationSent.value = true);
        const verifyCode = () => (isVerified.value = true);

        return { showModal, isVisible, phone, email, verificationCode, verificationSent, isVerified, closeModal, toggleVisibility, sendVerificationCode, verifyCode };
    },

    created() {
        this.isLoggedIn = localStorage.getItem('isLoggedIn') === 'true'
    },
    methods: {
        openRegister(){
            this.showModal = 'register';
            this.step=1;
            this.email = this.code = this.password = '';
            this.validEmail = false
        },
        closeModal() {
            this.showModal = false;
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
        handleSwipe() {
            const swipeThreshold = 50;
            const diff = this.touchStartX - this.touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
        },
        updateSlides() {
            this.slides.forEach((slide, index) => {
                slide.className = 'carousel-item absolute top-0 left-0 w-full h-full';
                if (index === this.currentSlide) {
                    slide.classList.add('active');
                } else if (index === (this.currentSlide + 1) % this.slides.length) {
                    slide.classList.add('next');
                } else if (index === (this.currentSlide - 1 + this.slides.length) % this.slides.length) {
                    slide.classList.add('prev');
                } else {
                    slide.classList.add('hidden');
                }
            });

            this.indicators.forEach((indicator, index) => {
                indicator.className = `w-8 sm:w-12 h-1 sm:h-1.5 rounded-full transition-colors ${
                    index === this.currentSlide ? 'bg-white/40' : 'bg-white/20'
                } hover:bg-white/60`;
            });

            if (this.progressBar) {
                this.progressBar.style.width = `${((this.currentSlide + 1) / this.slides.length) * 100}%`;
            }
        },
        resetAutoAdvance() {
            clearInterval(this.autoAdvanceTimer);
            this.autoAdvanceTimer = setInterval(this.nextSlide, 5000);
        },
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
            this.updateSlides();
            this.resetAutoAdvance();
        },
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            this.updateSlides();
            this.resetAutoAdvance();
        },



        async sendCode(){
            this.loading = true;
            try{
                await axios.post('/send-code',{email: this.email});
                this.step = 2;
            }catch (e){
                alert(e.response?.data?.message || 'Ошибка при отправке кода!');
            } finally {
                this.loading = false;
            }
        },
        async verifyCode(){
            this.loading = true;
            try{
                const res = await axios.post('/verify-code', {
                    email:this.email,
                    code:this.code.trim()
                });
                if(res.data.success){
                    this.step = 3;
                }else {
                    alert('Неверный код или истек срок действия');
                }
            }catch (e) {
                alert(e.response?.dark?.message || 'Ошибка при входе кода');
            } finally {
                this.loading = false;
            }
        },
        async submitRegistration(){
            this.loading = true;
            try {
                const response = await axios.post('/register', {
                    email: this.email,
                    password: this.password
                });

                if (response.data.success)
                {
                    alert(response.data.message);
                    window.location.href = '/';
                }
            } catch (e) {
                alert(e.response?.data?.message || 'Ошибка при регистрации');
            } finally {
                this.loading = false;
            }
        },
        async submitLogin(){
            try{
                const response = await axios.post('/login',{
                    email:this.email,
                    password: this.password
                });
                this.isLoggedIn = true
                localStorage.setItem('isLoggedIn', 'true')
                this.closeModal()
                alert(response.data.message || "Сәтті кірдіңіз");
                this.showModal = '';
            }catch (e){
                if (e.response?.data?.message) {
                    alert(e.response.data.error || 'Ошибка при логин');
                } else {
                    alert('Қате! Кейінірек байқап көріңіз')
                }
            }
        },
        goToProfile() {
            this.$router.push( '/profile/user' )
        },
        changeLanguage(lang){
            this.$i18n.locale = lang;
        },

        toggleVisibility() {
            this.isVisible = !this.isVisible
        },
    },
}
</script>


<style scoped>

</style>
