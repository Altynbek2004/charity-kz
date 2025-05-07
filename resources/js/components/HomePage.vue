<template>
    <section class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto sm:flex items-center max-w-screen-xl gap-8">
            <!-- Left side with image -->
            <div class="sm:w-1/2 p-10">
                <div class="text-center">
                    <img
                        src="/storage/app/public/mainContent/mainImage.png"
                        alt="About Us Image"
                        class="w-full h-auto rounded-2xl shadow-lg"
                    />
                </div>
            </div>

            <!-- Right side with text content -->
            <div class="sm:w-1/2 p-5">
                <div>
          <span class="text-gray-500 border-b-2 border-indigo-600 uppercase text-2xl">
            <b>Біз туралы</b>
          </span>
                    <h2 class="my-4 font-bold text-3xl sm:text-4xl">
                        Қолдау -  <span class="text-red-600">Бірге қамқор болайық.</span>
                    </h2>
                    <p class="text-gray-700">
                        Бала — Болашақ, Ал Олардың Бақытты Болашағы — Біздің Бүгінгі
                        Қолымызда. Біз Әрбір Жанашыр Жанмен Бірге Мұқтаж Балаларға Үміт
                        Сыйлауға Дайынбыз.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-12 text-center">Көмек Қажет Ететін Топтар</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Medical Project -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://img.freepik.com/photos-premium/peinture-representant-pere-ses-enfants-bras-autour-epaules_865340-1123.jpg"
                         class="w-full h-64 object-cover" alt="Medical help">
                    <div class="p-6">
                        <span class="text-green-500 text-sm font-medium">Medical</span>
                        <h3 class="text-xl font-bold mt-2 mb-3">Әлеуметтік Аз Қамтылған Отбасылар</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum Dolor Sit Amet, Consete Sadipiscing Elitр, Sed Diam Nonumy...</p>

                        <div class="mb-2 flex justify-between text-sm">
                            <span>Donatone</span>
                            <span>60%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 60%"></div>
                        </div>

                        <div class="flex justify-between text-sm mb-6">
                            <span>Raised: $600</span>
                            <span>Goal: $1,000</span>
                        </div>
                        <button class="bg-white text-green-500 w-full py-3 rounded font-medium border border-green-500">Donate Now</button>
                    </div>
                </div>

                <!-- Homeless Project -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=870&q=80"
                         class="w-full h-64 object-cover" alt="Homeless children">
                    <div class="p-6">
                        <span class="text-green-500 text-sm font-medium">Homeless</span>
                        <h3 class="text-xl font-bold mt-2 mb-3">Жетім Және Ата-Анасының Қамқорлығынсыз Қалған Балалар</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum Dolor Sit Amet, Consete Sadipiscing Elitр, Sed Diam Nonumy...</p>

                        <div class="mb-2 flex justify-between text-sm">
                            <span>Donatone</span>
                            <span>85%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                        </div>

                        <div class="flex justify-between text-sm mb-6">
                            <span>Raised: $8500</span>
                            <span>Goal: $10,000</span>
                        </div>

                        <button class="bg-white text-green-500 w-full py-3 rounded font-medium border border-green-500">Donate Now</button>
                    </div>
                </div>

                <!-- Education Project -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1531983412531-1f49a365ffed?ixlib=rb-4.0.3&auto=format&fit=crop&w=870&q=80"
                         class="w-full h-64 object-cover" alt="Children with disabilities">
                    <div class="p-6">
                        <span class="text-green-500 text-sm font-medium">Education</span>
                        <h3 class="text-xl font-bold mt-2 mb-3">Мүмкіндігі Шектеулі Балалар</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum Dolor Sit Amet, Consete Sadipiscing Elitр, Sed Diam Nonumy...</p>

                        <div class="mb-2 flex justify-between text-sm">
                            <span>Donatone</span>
                            <span>90%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 90%"></div>
                        </div>

                        <div class="flex justify-between text-sm mb-6">
                            <span>Raised: $9,000</span>
                            <span>Goal: $10,000</span>
                        </div>

                        <button class="bg-white text-green-500 w-full py-3 rounded font-medium border border-green-500">Donate Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-700 py-20 px-4 text-white text-center relative">
        <h1 class="text-3xl font-bold mb-12">Ахмет Байтұрсынұлы</h1>

        <div class="relative max-w-4xl mx-auto">
            <!-- Large Quote Marks -->
            <div class="text-gray-500 text-9xl font-bold absolute -top-20 left-1/2 transform -translate-x-1/2 opacity-20">
                " "
            </div>

            <p class="text-xl md:text-2xl font-medium leading-relaxed z-10 relative">
                Балам Деген Жұрт Болмаса – Жұртым Дейтін Бала Қайдан Шықсын
            </p>
        </div>
    </section>

    <section class="py-16 px-4 md:px-8">
        <h2 class="text-3xl font-bold mb-16 max-w-4xl mx-auto">
            Бір Жүрек Өзгеріс Әкеледі, Ал Жүздеген Жүрек Ғажайып Жасайды
        </h2>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Stat 1 -->
            <div class="bg-green-50 p-8">
                <h3 class="text-4xl font-bold mb-3">109 500+</h3>
                <p class="text-gray-700">
                    2025 Жылы Қазақстанда Мүгедектігі Бар Балалардың Жалпы Саны.
                </p>
            </div>

            <!-- Stat 2 -->
            <div class="bg-green-50 p-8">
                <h3 class="text-4xl font-bold mb-3">31 000+</h3>
                <p class="text-gray-700">
                    2025 Жылы Қазақстанда Тіркелген Жетім Және Ата-Анасының Қамқорлығынсыз Қалған Балалар.
                </p>
            </div>

            <!-- Stat 3 -->
            <div class="bg-green-50 p-8">
                <h3 class="text-4xl font-bold mb-3">8,92%</h3>
                <p class="text-gray-700">
                    Көпбалалы Отбасылар Арасында Кедейлік Деңгейі.
                </p>
            </div>

            <!-- Stat 4 -->
            <div class="bg-green-50 p-8">
                <h3 class="text-4xl font-bold mb-3">100+</h3>
                <p class="text-gray-700">
                    Country Member
                </p>
            </div>
        </div>
    </section>  <!-- footer -->

    <section class="py-16 px-4 md:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-bold">Жаңалықтар</h2>
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
                <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100">
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

                        <button class="border border-green-500 text-green-500 px-8 py-3">Read More</button>
                    </div>
                </div>

                <!-- Blog Post 2 -->
                <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100">
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

                        <button class="border border-green-500 text-green-500 px-8 py-3">Read More</button>
                    </div>
                </div>

                <!-- Blog Post 3 -->
                <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100">
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

                        <button class="border border-green-500 text-green-500 px-8 py-3">Read More</button>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- News -->

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
</script>
