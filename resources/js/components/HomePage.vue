<template>
    <section class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto sm:flex items-center max-w-screen-xl gap-8">
            <!-- Left side with image -->
            <div class="sm:w-1/2 p-10 fade-in" id="about-us-left">
                <div class="text-center">
                    <img
                        src="/storage/app/public/mainContent/mainImage.png"
                        alt="About Us Image"
                        class="w-full h-auto rounded-2xl shadow-lg"
                    />
                </div>
            </div>

            <!-- Right side with text content -->
            <div class="sm:w-1/2 p-5 fade-in" id="about-us-right" style="animation-delay: 0.5s;">
                <div>
                    <span class="text-gray-500 border-b-2 border-indigo-600 uppercase text-2xl">
                        <b>{{ $t('about_us') }}</b>
                    </span>
                    <h2 class="my-4 font-bold text-3xl sm:text-4xl">
                        {{ $t('support') }} - <span class="text-red-600">{{ $t('together_caring')}}</span>
                    </h2>
                    <p class="text-gray-700">
                        {{ $t('children_future') }}
                    </p>
                </div>
            </div>
        </div>


    </section>

    <!-- Көмек Қажет Ететін Топтар -->
    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-12 text-center">{{ $t('groups_in_need')}}</h2>
            <!-- Карточкалар тұрады -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Medical Project -->
                <div
                    v-for="group in groups"
                    :key="group.id"
                    @click="goToDetails(group.id)"
                    class="group-card cursor-pointer transition-transform duration-300 transform hover:scale-105">
                    <img :src="'/' + group.image" class="group-image" alt="Medical help">
                    <div class="p-6">
                        <span class="text-green-500 text-sm font-medium">{{ group.name }}</span>
                        <h3 class="text-xl font-bold mt-2 mb-3">{{ group.title }}</h3>
                        <p class="text-gray-600 mb-4">{{ group.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ахмет Байтұрсынұлы -->
    <section class="bg-gray-700 py-20 px-4 text-white text-center relative fade-in-scale">
        <h1 class="text-3xl font-bold mb-12">Ахмет Байтұрсынұлы</h1>

        <div class="relative max-w-4xl mx-auto">
            <div class="text-gray-500 text-9xl font-bold absolute -top-20 left-1/2 transform -translate-x-1/2 opacity-20">
                " "
            </div>

            <p class="text-xl md:text-2xl font-medium leading-relaxed z-10 relative">
                {{ $t('quote') }}
            </p>
        </div>
    </section>

    <!--Бір жүрек өзгеріс әкеледі, ал жүздеген жүрек ғажайып жасайды-->
    <section class="py-16 px-4 md:px-8">
        <h2 class="text-3xl font-bold mb-16 max-w-4xl mx-auto">
            {{ $t('quote1')}}
        </h2>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-green-50 p-8 stat-card">
                <h3 class="text-4xl font-bold mb-3">109 500+</h3>
                <p class="text-gray-700">
                    2025 Жылы Қазақстанда Мүгедектігі Бар Балалардың Жалпы Саны.
                </p>
            </div>

            <div class="bg-green-50 p-8 stat-card">
                <h3 class="text-4xl font-bold mb-3">31 000+</h3>
                <p class="text-gray-700">
                    2025 Жылы Қазақстанда Тіркелген Жетім Және Ата-Анасының Қамқорлығынсыз Қалған Балалар.
                </p>
            </div>

            <div class="bg-green-50 p-8 stat-card">
                <h3 class="text-4xl font-bold mb-3">8,92%</h3>
                <p class="text-gray-700">
                    Көпбалалы Отбасылар Арасында Кедейлік Деңгейі.
                </p>
            </div>

            <div class="bg-green-50 p-8 stat-card">
                <h3 class="text-4xl font-bold mb-3">100+</h3>
                <p class="text-gray-700">
                    Country Member
                </p>
            </div>
        </div>
    </section>

    <!--Жаңалықтар-->
    <section class="py-16 px-4 md:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-bold">{{ $t('news')}}</h2>
                <div class="flex gap-2">
                    <button class="bg-green-50 hover:bg-green-100 rounded-full p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="bg-green-50 hover:bg-green-100 rounded-full p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100 transition-transform duration-300 transform hover:-translate-y-2 hover:shadow-lg news-card">
                    <div class="h-56 bg-gray-200"></div>
                    <div class="p-6">
                        <div class="flex items-center gap-8 text-gray-500 text-sm mb-3">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zm-4 7a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Esther Howard</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>12 Sep 2021</span>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold mb-3">Charity, Expectations Vs. Reality</h3>
                        <p class="text-gray-600 mb-4">
                            Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Sed Diam Nonumy, Tempor Invidunt Ut Labore Et Magna Aliquyam Erat, Sed Diam Voluptua...
                        </p>

                        <button class="border border-green-500 text-green-500 px-8 py-3">{{ $t('read_more')}}</button>
                    </div>
                </div>

                <!-- Blog Post 2 -->
                <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100 transition-transform duration-300 transform hover:-translate-y-2 hover:shadow-lg news-card">
                    <div class="h-56 bg-gray-200"></div>
                    <div class="p-6">
                        <div class="flex items-center gap-8 text-gray-500 text-sm mb-3">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zm-4 7a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Jacob Jones</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>22 Aug 2021</span>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold mb-3">This Week's Top Stories About Charity</h3>
                        <p class="text-gray-600 mb-4">
                            Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Sed Diam Nonumy, Tempor Invidunt Ut Labore Et Magna Aliquyam Erat, Sed Diam Voluptua...
                        </p>

                        <button class="border border-green-500 text-green-500 px-8 py-3">{{ $t('read_more')}}</button>
                    </div>
                </div>

                <!-- Blog Post 3 -->
                <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100 transition-transform duration-300 transform hover:-translate-y-2 hover:shadow-lg news-card">
                    <div class="h-56 bg-gray-200"></div>
                    <div class="p-6">
                        <div class="flex items-center gap-8 text-gray-500 text-sm mb-3">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zm-4 7a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Floyd Miles</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>30 Jul 2021</span>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold mb-3">Why You Should Focus On Charity</h3>
                        <p class="text-gray-600 mb-4">
                            Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Sed Diam Nonumy, Tempor Invidunt Ut Labore Et Magna Aliquyam Erat, Sed Diam Voluptua...
                        </p>

                        <button class="border border-green-500 text-green-500 px-8 py-3 btn-ripple">{{ $t('read_more')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="chat-widget" class="fixed bottom-4 right-4 z-50">
        <button @click="toggleChat" class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white p-3 rounded-full shadow-2xl hover:scale-110 transition transform duration-300">
            🤖
        </button>
    </div>

    <div v-show="chatVisible" id="chat-window" class="fixed bottom-24 right-4 w-80 max-w-sm h-[480px] bg-white shadow-2xl rounded-2xl flex flex-col z-50 border border-gray-200 overflow-hidden animate__animated animate__fadeInUp">
        <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center py-3 px-4 font-semibold text-lg">
            AI Чат
            <button @click="toggleChat" class="absolute right-3 top-3 text-white hover:text-gray-300 text-sm">✖</button>
        </div>

        <div ref="messages" class="flex-1 px-4 py-3 overflow-y-auto text-sm space-y-3 bg-gray-50">
            <div v-for="(message, index) in messages" :key="index" :class="message.sender === 'user' ? 'text-right' : 'text-left'">
                <span :class="message.sender === 'user' ? 'inline-block bg-gray-200 px-3 py-2 rounded' : 'inline-block bg-blue-100 px-3 py-2 rounded'">
                    {{ message.text }}
                </span>
            </div>
        </div>

        <div class="p-3 bg-white border-t border-gray-200 flex items-center space-x-2">
            <input v-model="inputText" placeholder="Хабарлама жаз..." class="flex-1 text-sm px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400" @keydown.enter="sendMessage" />
            <button @click="sendMessage" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-full transition">
                Жіберу
            </button>
        </div>
    </div>


    <footer class="bg-gray-800 text-white py-12 px-4 md:px-8">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Column 1 - Logo & Stats -->
            <div class="md:col-span-3">
                <div class="flex items-center gap-2 mb-8">
                    <span class="text-green-400 text-3xl">❤</span>
                    <span class="text-white font-bold text-2xl">QOLDAU</span>
                </div>

                <p class="text-3xl font-bold mb-2">10k</p>
                <p class="font-medium text-lg">Worldwide Client <br>Already Connected</p>
            </div>

            <!-- Column 2 - Quick Links -->
            <div class="md:col-span-3">
                <h3 class="text-lg font-bold mb-6">Quick Link</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Blog Post</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Photo Gallery</a></li>
                </ul>
            </div>

            <!-- Column 3 - Get In Touch -->
            <div class="md:col-span-2">
                <h3 class="text-lg font-bold mb-6">Get In Touch</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-400 hover:text-white">Contact Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Our Services</a></li>
                </ul>
            </div>

            <!-- Column 4 - Address -->
            <div class="md:col-span-2">
                <h3 class="text-lg font-bold mb-6">Address</h3>
                <p class="text-gray-400">
                    2464 Royal Ln. Mesa, New Jersey 45463
                </p>
            </div>

            <!-- Column 5 - Newsletter -->
            <div class="md:col-span-2">
                <h3 class="text-lg font-bold mb-6">Newsletter</h3>
                <div class="flex mb-3">
                    <input type="email" placeholder="Enter Your Email" class="px-4 py-2 w-full text-gray-900">
                    <button class="bg-green-500 text-white px-4 py-2">Subscribe</button>
                </div>
                <p class="text-gray-400 text-sm">Your email is safe with us,we don't spam.</p>

                <div class="mt-6">
                    <h4 class="font-medium mb-3">Follow Me</h4>
                    <div class="flex space-x-2">
                        <a href="#" class="bg-gray-700 hover:bg-gray-600 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="bg-gray-700 hover:bg-gray-600 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="bg-gray-700 hover:bg-gray-600 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.441 16.892c-2.102.144-6.784.144-8.883 0-2.276-.156-2.541-1.27-2.558-4.892.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0 2.277.156 2.541 1.27 2.559 4.892-.018 3.629-.285 4.736-2.559 4.892zm-6.441-7.234l4.917 2.338-4.917 2.346v-4.684z"/>
                            </svg>
                        </a>
                        <a href="#" class="bg-gray-700 hover:bg-gray-600 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>  <!-- footer -->
</template>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const fadeElements = document.querySelectorAll(".fade-in");
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 }
    );
    fadeElements.forEach((element) => {
        observer.observe(element);
    });
});
import axios from "axios";

const toggleChat = () => {
    const chatWindow = document.getElementById('chat-window');
    chatWindow.classList.toggle('hidden');
};
const sendMessage = () => {
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    if (!message) return;

    const messagesDiv = document.getElementById('chat-messages');

    const userMsg = document.createElement('div');
    userMsg.className = 'text-right';
    userMsg.innerHTML = `<span class="inline-block bg-gray-200 px-3 py-2 rounded">${message}</span>`;
    messagesDiv.appendChild(userMsg);

    messagesDiv.scrollTop = messagesDiv.scrollHeight;

    input.value = '';

    fetch('/ai-message', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ message: message })
    })
        .then(res => res.json())
        .then(data => {
            const botMsg = document.createElement('div');
            botMsg.className = 'text-left';
            botMsg.innerHTML = `<span class="inline-block bg-blue-100 px-3 py-2 rounded">${data.reply}</span>`;
            messagesDiv.appendChild(botMsg);
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        })
        .catch(err => {
            console.error('AI жауап қатпады', err);
        });
};
export default {
    mounted() {
        // Fade Up
        const cards = document.querySelectorAll(".fade-up");
        const fadeUpObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        fadeUpObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.7 }
        );
        cards.forEach((card) => fadeUpObserver.observe(card));

        // Fade In Scale
        const section = document.querySelector(".fade-in-scale");
        const scaleObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        scaleObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.5 }
        );
        if (section) scaleObserver.observe(section);

        // Stat Cards
        const statCards = document.querySelectorAll(".stat-card");
        const statCardObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        statCardObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.5 }
        );
        statCards.forEach((card) => statCardObserver.observe(card));

        // News Cards
        const newsCards = document.querySelectorAll(".news-card");
        const newsCardObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        newsCardObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.6 }
        );
        newsCards.forEach((card) => newsCardObserver.observe(card));
    },

    data() {
        return {
            groups:[],
            isVisible: false,
            chatVisible: false,
            inputText: '',
            messages: [],
        };
    },
    created() {
        this.fetchGroups();
        window.addEventListener("scroll", this.handleScroll);
    },
    beforeUnmount() {
        window.removeEventListener("scroll", this.handleScroll);
    },
    methods:{
      async fetchGroups(){
        try{
            const response = await axios.get('/group');
            this.groups = response.data;
        }  catch (e)
        {
            console.error('Error fetching groups:', e);
        }
      },
        handleScroll() {
            const windowHeight = window.innerHeight;
            const elements = document.querySelectorAll(".fade-up");
            elements.forEach((el) => {
                const rect = el.getBoundingClientRect();
                if (rect.top < windowHeight - 100) {
                    el.classList.add("show");
                }
            });
        },

        goToDetails(id) {
            this.$router.push(`/group/${id}`);
        },

        toggleChat() {
            this.chatVisible = !this.chatVisible;
        },
        async sendMessage() {
            if (!this.inputText.trim()) return;

            // Add user message
            this.messages.push({ sender: 'user', text: this.inputText.trim() });
            this.inputText = '';

            // Simulate AI response (replace this with real API call)
            setTimeout(() => {
                this.messages.push({ sender: 'bot', text: 'Сәлем! Мен саған қалай көмектесе аламын?' });
                this.$nextTick(() => {
                    const messagesRef = this.$refs.messages;
                    messagesRef.scrollTop = messagesRef.scrollHeight;
                });
            }, 500);
        }

    },
};
</script>
<style>

    .group-card {
        background-color: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .group-card:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
    }

    .group-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .group-card:hover .group-image {
        transform: scale(1.05);
    }

    .fade-in-scale {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.8s ease-out;
    }

    .fade-in-scale.show {
        opacity: 1;
        transform: scale(1);
    }


    .stat-card {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s ease-out;
    }

    .stat-card.show {
        opacity: 1;
        transform: translateY(0);
    }

    .news-card {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s ease-out;
    }

    .news-card.show {
        opacity: 1;
        transform: translateY(0);
    }

    .btn-ripple {
        position: relative;
        overflow: hidden;
    }

    .btn-ripple::after {
        content: "";
        position: absolute;
        width: 300%;
        height: 300%;
        top: 50%;
        left: 50%;
        background: rgba(76, 175, 80, 0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: transform 0.6s;
    }

    .btn-ripple:hover::after {
        transform: translate(-50%, -50%) scale(1);
    }



</style>
