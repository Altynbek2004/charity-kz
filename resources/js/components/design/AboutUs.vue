<template>
    <div class="min-h-screen bg-white">
        <!-- Header Navigation -->
        <Navbar></Navbar>


        <!-- Main Content -->
        <main class="container mx-auto px-12 py-16 flex flex-col md:flex-row items-center justify-between">
            <!-- Left Side - Images -->
            <div class="relative w-full md:w-1/2 mb-10 md:mb-0">
                <div class="bg-[#E8F4F1] p-4 rounded-lg relative z-10">
                    <div class="overflow-hidden rounded-lg">
                        <img
                            src="https://readdy.ai/api/search-image?query=joyful%20children%20with%20colorful%20clothes%20raising%20their%20arms%20in%20celebration%20with%20floating%20colorful%20bubbles%20around%20them%2C%20warm%20golden%20background%2C%20artistic%20painterly%20style%2C%20happiness%20and%20childhood%20joy%2C%20vibrant%20colors%2C%20emotional%20moment&width=500&height=400&seq=img001&orientation=landscape"
                            alt="Happy children celebrating"
                            class="w-full h-full object-cover object-top"
                        />
                    </div>
                </div>
                <div class="absolute bottom-[-50px] right-[-30px] w-3/5 z-20 bg-[#E8F4F1] p-4 rounded-lg">
                    <div class="overflow-hidden rounded-lg">
                        <img
                            src="https://readdy.ai/api/search-image?query=two%20young%20girls%20in%20traditional%20Kazakh%20clothing%20standing%20in%20a%20meadow%20with%20trees%20in%20background%2C%20soft%20natural%20lighting%2C%20traditional%20embroidered%20dresses%20in%20green%20and%20red%2C%20cultural%20heritage%2C%20innocent%20smiles%2C%20authentic%20rural%20setting&width=300&height=250&seq=img002&orientation=landscape"
                            alt="Children in traditional clothes"
                            class="w-full h-full object-cover object-top"
                        />
                    </div>
                </div>
            </div>

            <!-- Right Side - Text Content -->
            <div class="w-full md:w-1/2 md:pl-16">
                <div class="mb-4">
                    <h3 class="text-gray-600 text-sm tracking-widest uppercase border-b border-gray-300 pb-2 inline-block">БІЗ ТУРАЛЫ</h3>
                </div>

                <h1 class="text-4xl font-bold text-gray-800 mb-6">ҚОЛДАУ — Бірге Қамқор Болайық.</h1>

                <p class="text-gray-700 leading-relaxed mb-8">
                    Бала — Болашақ, Ал Олардың Бақытты Болашағы — Біздің Бүгінгі Қолымызда. Біз Әрбір Жанашыр Жанмен Бірге Мүмкіндік Балаларға Үміт Сыйлауға Дайынбыз.
                </p>

                <button class="bg-[#2F6B55] text-white px-6 py-3 rounded-md hover:bg-[#245344] transition duration-300 !rounded-button cursor-pointer whitespace-nowrap">
                    Көбірек білу
                </button>
            </div>
        </main>


        <!-- Impact Section -->
        <section class="py-16">
            <div class="container mx-auto px-12">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-1/2 mb-10 md:mb-0 md:pr-12">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">Біздің Әсер</h2>
                        <p class="text-gray-600 mb-6">Соңғы жылдары біз мыңдаған балаларға көмек көрсетіп, олардың өмірін жақсартуға үлес қостық. Әрбір қолдау - бұл баланың болашағына жасалған инвестиция.</p>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-3xl font-bold text-[#2F6B55]">5000+</h3>
                                <p class="text-gray-600">Қолдау көрсетілген балалар</p>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-[#2F6B55]">200+</h3>
                                <p class="text-gray-600">Өткізілген шаралар</p>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-[#2F6B55]">50+</h3>
                                <p class="text-gray-600">Серіктес ұйымдар</p>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-[#2F6B55]">20+</h3>
                                <p class="text-gray-600">Қалалар мен аймақтар</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2">
                        <div class="bg-[#E8F4F1] p-4 rounded-lg">
                            <div class="overflow-hidden rounded-lg">
                                <img
                                    src="https://readdy.ai/api/search-image?query=diverse%20group%20of%20children%20and%20adults%20participating%20in%20a%20community%20event%2C%20warm%20and%20supportive%20atmosphere%2C%20people%20helping%20each%20other%2C%20community%20center%20with%20educational%20materials%2C%20soft%20natural%20lighting%2C%20hopeful%20expressions%2C%20multicultural%20setting&width=600&height=400&seq=img003&orientation=landscape"
                                    alt="Community support event"
                                    class="w-full h-full object-cover object-top"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <AboutUsSection></AboutUsSection>


</template>

<script lang="ts" setup>

    import { ref, onMounted } from 'vue';
    import AboutUsSection from "@/components/design/AboutUsSection.vue";
    import Navbar from "@/components/design/Navbar.vue";

    onMounted(() => {

    });
</script>

<style scoped>
.bg-gradient-to-r {
    background-image: linear-gradient(to right, #2F6B55, #4A5259);
}

input:focus {
    outline: none;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}
</style>
