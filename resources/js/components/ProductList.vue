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
        <div class="max-w-4xl mx-auto mt-8 p-4 bg-gradient-to-r from-pink-200 to-pink-300 rounded-xl">
            <div class="relative">
                <div class="text-center mb-4 italic text-teal-600 text-xl font-semibold px-4">
                    "Балам деген жұрт болмаса, жұртым дейтін бала қайдан шықсын?"
                    <div class="text-right text-teal-700 text-base">-Ахмет Байтұрсынұлы</div>
                </div>

                <div class="relative h-80 rounded-2xl overflow-hidden group flex justify-center items-center">
                    <!-- Бүйірдегі кішірек суреттер - сол жақ -->
                    <div class="absolute left-0 h-full w-24 flex items-center opacity-50">
                        <img
                            id="left-preview"
                            src="/storage/app/public/navbarImage/unsplash1.png"
                            alt="Previous slide preview"
                            class="object-cover h-full rounded-l-2xl"
                        />
                    </div>

                    <!-- Орталық негізгі сурет -->
                    <div class="z-10 max-w-3xl rounded-2xl overflow-hidden">
                        <img
                            id="main-image"
                            src="/storage/app/public/navbarImage/unsplash2.png"
                            alt="Main slide"
                            class="object-cover w-full h-72 shadow-lg slide-transition"
                        />
                    </div>

                    <!-- Бүйірдегі кішірек суреттер - оң жақ -->
                    <div class="absolute right-0 h-full w-24 flex items-center opacity-50">
                        <img
                            id="right-preview"
                            src="/storage/app/public/navbarImage/unsplash3.png"
                            alt="Next slide preview"
                            class="object-cover h-full rounded-r-2xl"
                        />
                    </div>

                    <div class="absolute right-0 h-full w-24 flex items-center opacity-50">
                        <img
                            id="right-preview"
                            src="/storage/app/public/navbarImage/unsplash4.png"
                            alt="Next slide preview"
                            class="object-cover h-full rounded-r-2xl"
                        />
                    </div>

                    <!-- Алдыңғы слайд батырмасы -->
                    <div class="absolute left-8 top-1/2 transform -translate-y-1/2">
                        <button
                            id="prev-button"
                            class="bg-white/30 hover:bg-white/50 p-2 rounded-full text-white shadow-lg"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Келесі слайд батырмасы -->
                    <div class="absolute right-8 top-1/2 transform -translate-y-1/2">
                        <button
                            id="next-button"
                            class="bg-white/30 hover:bg-white/50 p-2 rounded-full text-white shadow-lg"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Слайдер индикаторлары -->
                <div id="indicators" class="flex justify-center gap-2 mt-4">
                    <!-- JS арқылы индикаторлар құрылады -->
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
        };
    },
    async created() {
        const response = await axios.get('/api/products');
        this.products = response.data;
    },

    mounted() {
        const imagePaths = [
            "/storage/app/public/navbarImage/unsplash1.png",
            "/storage/app/public/navbarImage/unsplash2.png",
            "/storage/app/public/navbarImage/unsplash3.png",
            "/storage/app/public/navbarImage/unsplash4.png"
        ];
        imagePaths.forEach((src) => {
            const img = new Image();
            img.src = src;
        });
    },


    methods: {
        async deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                await axios.delete(`/api/products/${id}`);
                this.products = this.products.filter(product => product.id !== id);
            }
        },
    },
};
document.addEventListener('DOMContentLoaded', function() {
    const images = [
        "/storage/app/public/navbarImage/unsplash1.png",
        "/storage/app/public/navbarImage/unsplash2.png",
        "/storage/app/public/navbarImage/unsplash3.png",
        "/storage/app/public/navbarImage/unsplash4.png",
    ];

    let currentIndex = 0;
    const mainImage = document.getElementById('main-image');
    const leftPreview = document.getElementById('left-preview');
    const rightPreview = document.getElementById('right-preview');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    const indicatorsContainer = document.getElementById('indicators');

    // Индикаторларды құру
    function createIndicators() {
        indicatorsContainer.innerHTML = '';
        images.forEach((_, index) => {
            const indicator = document.createElement('button');
            indicator.className = `h-3 w-3 rounded-full cursor-pointer transition-all ${
                currentIndex === index ? 'bg-purple-600 w-5' : 'bg-gray-300'
            }`;
            indicator.addEventListener('click', () => goToSlide(index));
            indicatorsContainer.appendChild(indicator);
        });
    }

    // Слайдтарды жаңарту
    function updateSlides() {
        mainImage.src = images[currentIndex];

        const prevIndex = currentIndex === 0 ? images.length - 1 : currentIndex - 1;
        const nextIndex = currentIndex === images.length - 1 ? 0 : currentIndex + 1;

        leftPreview.src = images[prevIndex];
        rightPreview.src = images[nextIndex];

        createIndicators();
    }

    // Алдыңғы слайдке өту
    function prevSlide() {
        currentIndex = currentIndex === 0 ? images.length - 1 : currentIndex - 1;
        updateSlides();
    }

    // Келесі слайдке өту
    function nextSlide() {
        currentIndex = currentIndex === images.length - 1 ? 0 : currentIndex + 1;
        updateSlides();
    }

    // Нақты слайдке өту
    function goToSlide(index) {
        currentIndex = index;
        updateSlides();
    }

    // Батырма әрекеттерін орнату
    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);

    // Бастапқы индикаторларды көрсету
    createIndicators();
    updateSlides();

    // Автоматты түрде ауыстыру (қосымша мүмкіндік)
    setInterval(nextSlide, 5000);
});
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
