<template>
    <div class="relative z-50">
        <!-- Фон анимациялары -->
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-emerald-100 via-white to-emerald-50 animate-fade-in-slow"></div>
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-emerald-300/20 rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-emerald-400/20 rounded-full filter blur-3xl animate-pulse-slower"></div>

        <!-- Навигация -->
        <nav class="bg-white shadow-md py-4 border-b border-emerald-100">
            <div class="container mx-auto flex justify-between items-center px-4">
                <!-- Лого және мәзір -->
                <div class="flex items-center gap-6">
                    <a href="/" class="transition-transform duration-500 hover:scale-110">
                        <img src="/storage/app/public/navbarImage/logo.png" alt="QOLDAU"
                             class="h-12 w-12 rounded-full shadow-lg ring-2 ring-emerald-300 transition hover:ring-emerald-500" />
                    </a>
                    <ul class="flex gap-6 text-sm font-semibold text-emerald-700">
                        <li><a href="/" class="hover:text-emerald-500 transition">{{ $t('menu') }}</a></li>
                        <li><a href="/help" class="hover:text-emerald-500 transition">{{ $t('get_help') }}</a></li>
                        <li><a href="/contact-us" class="hover:text-emerald-500 transition">{{ $t('contact_us') }}</a></li>
                    </ul>
                </div>

                <!-- Кнопкалар -->
                <div class="flex items-center gap-3">
                    <button class="bg-emerald-400 hover:bg-emerald-500 text-white font-medium py-2 px-4 rounded-xl shadow-md transition duration-300 transform hover:scale-105">
                        {{ $t('help') }}
                    </button>

                    <button v-if="!isLoggedIn" @click="showModal = 'login'"
                            class="bg-emerald-500 hover:bg-emerald-600 text-white font-medium py-2 px-4 rounded-xl shadow-md transition duration-300 transform hover:scale-105">
                        {{ $t('login') }}
                    </button>

                    <button v-else @click="goToProfile"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-xl shadow-md transition duration-300 transform hover:scale-105">
                        {{ $t('profile') }}
                    </button>

                    <!-- Тіл таңдау -->
                    <div class="flex items-center gap-2">
                        <img v-for="(flag, lang) in flags" :key="lang" :src="flag" :alt="lang"
                             @click="changeLanguage(lang)"
                             class="h-6 w-6 rounded-full ring ring-emerald-300 hover:ring-emerald-500 cursor-pointer transition" />
                    </div>
                </div>
            </div>
        </nav>

        <!-- Modal -->
        <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="relative bg-white rounded-3xl w-96 p-8 shadow-2xl animate-fade-in z-10">
                <h2 class="text-xl font-semibold text-emerald-600 mb-4">{{ $t('sign_in') }}</h2>
                <input type="email" v-model="email" placeholder="Email"
                       class="w-full border border-emerald-300 rounded-lg py-3 px-4 mb-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition" />
                <input type="password" v-model="password" placeholder="Password"
                       class="w-full border border-emerald-300 rounded-lg py-3 px-4 mb-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition" />
                <button @click="login"
                        class="w-full py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg font-bold transition duration-300 transform hover:scale-105 shadow">
                    {{ $t('login') }}
                </button>
                <button @click="register"
                        class="w-full py-3 mt-3 border-2 border-emerald-500 text-emerald-500 hover:bg-emerald-50 rounded-lg font-bold transition duration-300 transform hover:scale-105">
                    {{ $t('register') }}
                </button>
                <button @click="closeModal"
                        class="absolute top-2 right-2 text-gray-400 hover:text-emerald-500 text-xl">&times;</button>
            </div>
        </div>
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


                const token = response.data.token;
                this.isLoggedIn = true
                // ✅ Сақтау
                localStorage.setItem('token', token);
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
/* Optional: қосымша анимациялар Tailwind config ішінде болмаса, мына жерде жаза аласың */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in {
    animation: fadeIn 0.5s ease-out forwards;
}
.animate-fade-in-slow {
    animation: fadeIn 2s ease-out forwards;
}
.animate-pulse-slow {
    animation: pulse 4s infinite;
}
.animate-pulse-slower {
    animation: pulse 6s infinite;
}
</style>
