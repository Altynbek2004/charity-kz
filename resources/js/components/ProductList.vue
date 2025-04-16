<template>
    <div class="font-sans bg-pink-300">
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
                    <button class="bg-sky-400 hover:bg-sky-500 text-white font-medium py-2 px-4 rounded-xl shadow">
                        Кіру
                    </button>

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
</template>

<script>
import axios from 'axios';

export default {
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
        };
    },

    async created() {
        const response = await axios.get('/api/products');
        this.products = response.data;
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
        async deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                await axios.delete(`/api/products/${id}`);
                this.products = this.products.filter(product => product.id !== id);
            }
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
