<!-- The exported code uses Tailwind CSS. Install Tailwind CSS in your dev environment to ensure all styles work. -->

<template>
    <div class="min-h-screen bg-white">
        <!-- Hero Section -->
        <section class="relative overflow-hidden">
            <div class="container mx-auto px-6 py-16 flex flex-wrap items-center">
                <div class="w-full lg:w-1/2 z-10">
                    <p class="text-gray-600 mb-2">Welcome To Charity</p>
                    <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-800 mb-6">Let Us Come Together To Make A Difference</h1>
                    <p class="text-gray-600 mb-8 max-w-lg">
                        We believe in the power of collective action to create meaningful change in our communities.
                        Join us in our mission to provide support, resources, and hope to those who need it most.
                    </p>

                    <div class="flex flex-wrap -mx-4 mb-12">
                        <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 h-full">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white mr-3">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <h3 class="font-medium text-gray-800">Our Mission</h3>
                                </div>
                                <p class="text-gray-600 text-sm">
                                    To empower communities through sustainable support programs and create lasting positive impact in the lives of vulnerable populations.
                                </p>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-4">
                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 h-full">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white mr-3">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <h3 class="font-medium text-gray-800">Our Vision</h3>
                                </div>
                                <p class="text-gray-600 text-sm">
                                    A world where every individual has access to basic necessities, equal opportunities, and the support needed to thrive in their communities.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-700 font-medium">Donations</span>
                            <span class="text-gray-700 font-medium">75%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-emerald-500 h-2.5 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-700 font-medium">Medical Help</span>
                            <span class="text-gray-700 font-medium">90%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-emerald-500 h-2.5 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 relative">
                    <div class="absolute inset-0 bg-emerald-50 rounded-lg"></div>
                    <img
                        src="https://readdy.ai/api/search-image?query=A%20heartwarming%20scene%20of%20diverse%20volunteers%20working%20together%20at%20a%20charity%20event%2C%20helping%20distribute%20food%20and%20supplies%20to%20people%20in%20need.%20The%20image%20shows%20compassion%20and%20community%20spirit%20with%20a%20bright%2C%20hopeful%20atmosphere%20and%20soft%20natural%20lighting.%20The%20background%20is%20simple%20and%20clean%20to%20highlight%20the%20human%20connection%20and%20charitable%20work.&width=600&height=500&seq=charity-hero-image&orientation=landscape"
                        alt="Charity volunteers helping community"
                        class="relative z-10 rounded-lg shadow-lg object-cover w-full h-full"
                    />

                    <div class="absolute top-10 right-10 bg-white p-6 rounded-lg shadow-md z-20">
                        <h4 class="text-emerald-600 font-medium mb-4">Together We're Going To Make The Future</h4>
                        <ul class="space-y-3 text-sm text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-2"></i>
                                <span>Children Where We Are Able To Fulfill All</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-2"></i>
                                <span>Their Requirements To Keep Them Safe From Wicked World</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-2"></i>
                                <span>We Help Through Support Our And Start Changing The World</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-emerald-500 mt-1 mr-2"></i>
                                <span>Keeping Kids Hearts From Bad Influences</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <p class="text-gray-600 mb-2">About</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Our Features</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-lg shadow-sm p-8">
                        <div class="flex justify-center mb-6">
                            <div class="w-20 h-20 rounded-full bg-emerald-500 flex items-center justify-center text-white">
                                <i class="fas fa-home text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-4">Food & Homeless Charity</h3>
                        <p class="text-gray-600 text-center mb-6">
                            We provide nutritious meals and safe shelter for those experiencing homelessness, while working to address the root causes of housing insecurity in our communities.
                        </p>
                        <ol class="space-y-3">
                            <li class="flex">
                                <span class="font-medium mr-2">1.</span>
                                <span>Join Your Hand With Us For A Better Life</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">2.</span>
                                <span>Let's Do The Right Thing Now</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">3.</span>
                                <span>Providing Warm Meals Every Day</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">4.</span>
                                <span>Emergency Shelter For Families</span>
                            </li>
                        </ol>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white rounded-lg shadow-sm p-8">
                        <div class="flex justify-center mb-6">
                            <div class="w-20 h-20 rounded-full bg-emerald-500 flex items-center justify-center text-white">
                                <i class="fas fa-hand-holding-usd text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-4">Make A Donation</h3>
                        <p class="text-gray-600 text-center mb-6">
                            Your generous contributions directly fund our programs and services, making an immediate impact in the lives of those we serve through our various community initiatives.
                        </p>
                        <ol class="space-y-3">
                            <li class="flex">
                                <span class="font-medium mr-2">1.</span>
                                <span>Join Your Hand With Us For A Better Life</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">2.</span>
                                <span>Let's Do The Right Thing Now</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">3.</span>
                                <span>Support Our Education Programs</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">4.</span>
                                <span>Help Fund Medical Assistance</span>
                            </li>
                        </ol>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white rounded-lg shadow-sm p-8">
                        <div class="flex justify-center mb-6">
                            <div class="w-20 h-20 rounded-full bg-emerald-500 flex items-center justify-center text-white">
                                <i class="fas fa-handshake text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-4">Non Profit NGO</h3>
                        <p class="text-gray-600 text-center mb-6">
                            As a registered non-profit organization, we operate with transparency and accountability, ensuring that your support creates the maximum positive impact in our community.
                        </p>
                        <ol class="space-y-3">
                            <li class="flex">
                                <span class="font-medium mr-2">1.</span>
                                <span>Join Your Hand With Us For A Better Life</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">2.</span>
                                <span>Let's Do The Right Thing Now</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">3.</span>
                                <span>Transparent Financial Reporting</span>
                            </li>
                            <li class="flex">
                                <span class="font-medium mr-2">4.</span>
                                <span>Children Where We Are Able To Fulfill All</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-16">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Stat 1 -->
                    <div class="bg-emerald-50 rounded-lg p-8 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full border-2 border-emerald-500 flex items-center justify-center">
                                <i class="fas fa-user-shield text-emerald-500 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-4xl font-bold text-gray-800 mb-2">4597+</h3>
                        <p class="text-gray-600">People Helped</p>
                    </div>

                    <!-- Stat 2 -->
                    <div class="bg-emerald-50 rounded-lg p-8 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full border-2 border-emerald-500 flex items-center justify-center">
                                <i class="fas fa-users text-emerald-500 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-4xl font-bold text-gray-800 mb-2">8945+</h3>
                        <p class="text-gray-600">Volunteers</p>
                    </div>

                    <!-- Stat 3 -->
                    <div class="bg-emerald-50 rounded-lg p-8 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full border-2 border-emerald-500 flex items-center justify-center">
                                <i class="fas fa-hands-helping text-emerald-500 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-4xl font-bold text-gray-800 mb-2">10M+</h3>
                        <p class="text-gray-600">Poor People Served</p>
                    </div>

                    <!-- Stat 4 -->
                    <div class="bg-emerald-50 rounded-lg p-8 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-16 h-16 rounded-full border-2 border-emerald-500 flex items-center justify-center">
                                <i class="fas fa-globe-americas text-emerald-500 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-4xl font-bold text-gray-800 mb-2">100+</h3>
                        <p class="text-gray-600">Country Members</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Gallery -->
        <section class="py-10">
            <div class="container mx-auto px-4">
                <h2 class="text-xl font-semibold mb-6">Our Gallery</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <!-- Gallery item -->
                    <div class="bg-gray-300 h-40 rounded hover:scale-105 hover:shadow-lg transition duration-300 ease-in-out"></div>
                    <div class="bg-gray-300 h-40 rounded hover:scale-105 hover:shadow-lg transition duration-300 ease-in-out"></div>
                    <div class="bg-gray-300 h-40 rounded hover:scale-105 hover:shadow-lg transition duration-300 ease-in-out"></div>
                    <div class="bg-gray-300 h-40 rounded hover:scale-105 hover:shadow-lg transition duration-300 ease-in-out"></div>
                    <div class="bg-gray-300 h-40 rounded hover:scale-105 hover:shadow-lg transition duration-300 ease-in-out"></div>
                    <div class="bg-gray-300 h-40 rounded hover:scale-105 hover:shadow-lg transition duration-300 ease-in-out"></div>
                </div>
            </div>
        </section>


        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-12">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">About Us</h3>
                        <p class="text-gray-400 mb-4">
                            We are a dedicated non-profit organization committed to making a positive impact in communities around the world through various humanitarian initiatives.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Home</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">About Us</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Our Causes</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Get Involved</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Contact Us</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold mb-4">Our Programs</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Food & Shelter</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Medical Support</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Education</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Clean Water</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition cursor-pointer">Child Protection</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold mb-4">Contact Info</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-400">123 Charity Lane, Compassion City, CC 12345</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-phone-alt text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-400">+1 (555) 123-4567</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-envelope text-emerald-500 mt-1 mr-3"></i>
                                <span class="text-gray-400">info@charityorganization.org</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
                    <p>© 2025 Charity Organization. All Rights Reserved.</p>
                    <div class="flex justify-center mt-4 space-x-6">
                        <i class="fab fa-cc-visa text-2xl"></i>
                        <i class="fab fa-cc-mastercard text-2xl"></i>
                        <i class="fab fa-cc-paypal text-2xl"></i>
                        <i class="fab fa-cc-apple-pay text-2xl"></i>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script lang="ts" setup>
import { ref, onMounted } from 'vue';

onMounted(() => {
    // Any initialization code can go here
});
</script>

<style scoped>
.font-serif {
    font-family: 'Georgia', serif;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance: textfield;
}
</style>
