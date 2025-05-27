<template>
    <Navbar></Navbar>
    <section class="flex items-center justify-center min-h-screen bg-[#f1f9f7]">
        <div class="text-center relative">
            <div class="absolute inset-0 flex items-center justify-center opacity-10">
                <svg
                    width="200"
                    height="200"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="text-gray-400"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1"
                        d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
            </div>

            <!-- Негізгі мәтін -->
            <h1 class="text-[120px] font-extrabold text-gray-800 relative z-10">404</h1>
            <p class="text-sm tracking-widest text-gray-500 relative z-10">ERROR</p>
        </div>
    </section>
</template>

<script setup>



import Navbar from "@/components/design/Navbar.vue";
</script>

<style scoped>

</style>
