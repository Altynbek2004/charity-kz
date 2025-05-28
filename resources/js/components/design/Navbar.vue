<template>
    <header class="bg-gradient-to-r from-[#2F6B55] to-[#4A5259] py-4">
        <div class="container mx-auto px-4 flex items-center justify-between">

            <!-- Сол жақ: Logo + Navigation бірге -->
            <div class="flex items-center space-x-12">
                <!-- Logo -->
                <a href="#" class="text-white text-2xl font-semibold">Qoldau</a>

                <!-- Navigation -->
                <nav class="flex items-center space-x-8">
                    <a href="/" class="text-white hover:text-gray-200 cursor-pointer whitespace-nowrap">Басты бет</a>
                    <a href="/" class="text-white hover:text-gray-200 cursor-pointer whitespace-nowrap">Мәзір</a>
                    <a href="/help" class="text-white hover:text-gray-200 cursor-pointer whitespace-nowrap">Көмек алу</a>
                </nav>
            </div>

            <!-- Оң жақ: Actions -->
            <div class="flex items-center space-x-4">
                <button class="text-white hover:text-gray-200 cursor-pointer whitespace-nowrap">En</button>
                <button class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600 transition duration-300 !rounded-button cursor-pointer whitespace-nowrap">Contact us</button>
                <button class="text-white p-2 cursor-pointer whitespace-nowrap">
                    <i class="fas fa-search"></i>
                </button>
            </div>

        </div>
    </header>
</template>
<script>
export default {
    name: "Navbar"
}
</script>
<style scoped>

</style>
