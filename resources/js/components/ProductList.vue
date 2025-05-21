<template>
    <div class="font-sans bg-[#dfcfe6]">
        <navbar/>

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
                <div class="carousel-track relative h-[400px] sm:h-[500px] md:h-[600px] w-full overflow-hidden">
                    <!-- Carousel items -->
                    <div class="carousel-item active absolute top-0 left-0 w-full h-full">
                        <div class="w-full h-full p-4 sm:p-8">
                            <div class="w-full h-full rounded-xl sm:rounded-2xl overflow-hidden relative group">
                                <img src="/storage/app/public/navbarImage/navbarPhoto1.jpg" alt="Geometric art installation" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                <div class="absolute inset-0 from-violet-500/40 to-purple-500/40 mix-blend-overlay"></div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item next absolute top-0 left-0 w-full h-full">
                        <div class="w-full h-full p-4 sm:p-8">
                            <div class="w-full h-full rounded-xl sm:rounded-2xl overflow-hidden relative group">
                                <img src="/storage/app/public/navbarImage/navbarPhoto2.jpg" alt="Futuristic tech setup" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                <div class="absolute inset-0 bg-gradient-to-br from-fuchsia-500/40 to-pink-500/40 mix-blend-overlay"></div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item hidden absolute top-0 left-0 w-full h-full">
                        <div class="w-full h-full p-4 sm:p-8">
                            <div class="w-full h-full rounded-xl sm:rounded-2xl overflow-hidden relative group">
                                <img src="/storage/app/public/navbarImage/navbarPhoto3.jpg" alt="Abstract digital art" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                <div class="absolute inset-0 bg-gradient-to-br from-pink-500/40 to-rose-500/40 mix-blend-overlay"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Cards at the bottom -->
                    <div class="absolute bottom-0 left-0 right-0 flex justify-center gap-6 py-6">
                        <a href="/help/charity" class="bg-white text-gray-900 px-8 py-6 rounded-2xl shadow-lg text-center text-lg font-semibold hover:bg-gray-100 transition">
                            Қайырымдылық Көмек
                        </a>
                        <a href="/ai" class="bg-white text-gray-900 px-8 py-6 rounded-2xl shadow-lg text-center text-lg font-semibold hover:bg-gray-100 transition">
                            Психологиялық Көмек
                        </a>
                        <a href="/help/volunteering" class="bg-white text-gray-900 px-8 py-6 rounded-2xl shadow-lg text-center text-lg font-semibold hover:bg-gray-100 transition">
                            Еріктілік Қызметі
                        </a>
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
import Navbar from './Navbar.vue';
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

    components: {
        HomePage,
        Navbar,
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
        const sendVerificationCode = () => (verificationSent.value = true);
        const verifyCode = () => (isVerified.value = true);

        return { showModal, isVisible, phone, email, verificationCode, verificationSent, isVerified, closeModal, toggleVisibility, sendVerificationCode, verifyCode };
    },

    created() {
        this.isLoggedIn = localStorage.getItem('isLoggedIn') === 'true'
    },

    mounted() {
        this.slides = document.querySelectorAll('.carousel-item');
        this.indicators = document.querySelectorAll('.bottom-2 button, .bottom-4 button');
        this.progressBar = document.querySelector('.progress-bar');
        const carousel = document.querySelector('.carousel-track');

        carousel.addEventListener('touchstart', e => {
            this.touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        carousel.addEventListener('touchend', e => {
            this.touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe();
        }, { passive: true });

        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                this.currentSlide = index;
                this.updateSlides();
                this.resetAutoAdvance();
            });
        });

        this.updateSlides();
        this.resetAutoAdvance();
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
};
</script>

<style>
.carousel-container {
    perspective: 1000px;
    touch-action: pan-y pinch-zoom;
}

.carousel-track {
    transform-style: preserve-3d;
    transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}

.carousel-item {
    backface-visibility: hidden;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}

.carousel-item.active {
    opacity: 1;
    transform: scale(1) translateZ(0);
}

@media (max-width: 640px) {
    .carousel-item.prev {
        opacity: 0;
        transform: scale(0.8) translateX(-50%) translateZ(-100px);
    }

    .carousel-item.next {
        opacity: 0;
        transform: scale(0.8) translateX(50%) translateZ(-100px);
    }
}

@media (min-width: 641px) {
    .carousel-item.prev {
        opacity: 0.7;
        transform: scale(0.9) translateX(-100%) translateZ(-100px);
    }

    .carousel-item.next {
        opacity: 0.7;
        transform: scale(0.9) translateX(100%) translateZ(-100px);
    }
}

.carousel-item.hidden {
    opacity: 0;
    transform: scale(0.8) translateZ(-200px);
}

.nav-button {
    transition: all 0.3s;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}

@media (hover: hover) {
    .nav-button:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }
}

.nav-button:active {
    transform: scale(0.95);
}

.progress-bar {
    transition: width 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}
</style>
