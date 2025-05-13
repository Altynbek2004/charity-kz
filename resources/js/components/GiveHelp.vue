<template>
    <div class="max-w-4xl mx-auto p-4 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Қайырымдылық жасау</h1>

        <!-- 1. Қайырымдылық түрі -->
        <div class="bg-teal-800 p-4 rounded-lg mb-6">
            <p class="text-white mb-2">1. Қайырымдылық түрі</p>
            <div class="grid grid-cols-2 md:grid-cols-6 gap-2">
                <button
                    v-for="type in types"
                    :key="type.value"
                    @click="activeType = type.value"
                    :class="activeType === type.value ? 'bg-white text-teal-800' : 'bg-transparent text-white border border-teal-600'"
                    class="py-2 px-4 rounded text-sm font-medium flex items-center justify-center"
                >
                    <span v-if="type.icon" class="mr-2" v-html="type.icon"></span>
                    {{ type.label }}
                </button>
            </div>
        </div>

        <!-- 2. Қайырымдылық сомасы -->
        <div class="mb-6">
            <p class="text-gray-800 mb-2">2. Қайырымдылық сомасы</p>
            <div class="grid grid-cols-2 md:grid-cols-6 gap-2 mb-2">
                <button
                    v-for="amt in amounts"
                    :key="amt"
                    @click="activeAmount = amt"
                    :class="activeAmount === amt ? 'bg-orange-300 text-white' : 'border border-orange-200 text-orange-400'"
                    class="py-3 px-4 rounded text-center"
                >
                    {{ amt }} ₸
                </button>
            </div>
            <input
                type="number"
                v-model.number="customAmount"
                placeholder="Басқа сома ₸"
                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500"
            />
        </div>

        <!-- 3. Қайырымдылық мерзімі -->
        <div class="mb-6">
            <p class="text-gray-800 mb-2">3. Қайырымдылық мерзімі</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-2">
                <button
                    v-for="period in periods"
                    :key="period.value"
                    @click="activePeriod = period.value"
                    :class="activePeriod === period.value ? 'bg-orange-300 text-white' : 'border border-orange-200 text-orange-400'"
                    class="py-3 px-4 rounded text-center"
                >
                    {{ period.label }}
                </button>
            </div>
            <div class="text-sm text-gray-600 italic">
                Сіз жазылым арқылы қайырымдылық жасай аласыз
            </div>
        </div>

        <!-- 4. Отбасыларға көмектесу -->
        <div class="mb-6">
            <p class="text-gray-800 mb-2">4. Отбасыларға көмектесу</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <input
                    type="text"
                    v-model="name"
                    placeholder="Есіміңіз"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
                <input
                    type="email"
                    v-model="email"
                    placeholder="E-mail почта"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
            </div>
            <div class="flex items-start mb-4">
                <button
                    @click="submitDonation"
                    class="bg-teal-800 text-white py-3 px-6 rounded font-medium"
                >
                    Қайырымдылық жасау
                </button>
                <div class="ml-4 text-sm text-gray-600 flex-1">
                    «Қайырымдылық жасау» батырмасын басу арқылы сіз
                    <a href="#" class="text-teal-600 underline">офертаның шарттарымен</a>
                    келісесіз және
                    <a href="#" class="text-teal-600 underline">дербес деректерді</a> өңдеуге келісім бересіз
                </div>
            </div>
            <div class="flex items-center">
                <input
                    type="checkbox"
                    id="anonymous"
                    v-model="anonymous"
                    class="mr-2"
                />
                <label for="anonymous" class="text-gray-700">Анонимді көмек</label>
            </div>
        </div>

        <hr class="border-gray-200 my-4">

        <!-- Confirmation message -->
        <div v-if="message" class="mt-4 p-4 bg-green-100 text-green-800 rounded">
            {{ message }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'DonationForm',
    data() {
        return {
            types: [
                { value: 'online', label: 'Сайтта онлайн' },
                { value: 'kaspi', label: 'Kaspi.kz', icon: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" /></svg>' },
                { value: 'halyk', label: 'Halyk', icon: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" /></svg>' },
                { value: 'jusan', label: 'Jusan', icon: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" /></svg>' },
                { value: 'other', label: 'Басқа', icon: '<span class="mr-2">...</span>' },
                { value: 'transfer', label: 'Аудару' }
            ],
            amounts: [100, 500, 1000, 3000, 5000, 10000],
            periods: [
                { value: 'monthly', label: 'Ай сайын' },
                { value: 'weekly', label: 'Апта сайын' },
                { value: 'daily', label: 'Күн сайын' },
                { value: 'once', label: 'Бір реттік' }
            ],
            activeType: 'online',
            activeAmount: 1000,
            customAmount: null,
            activePeriod: 'once',
            name: '',
            email: '',
            anonymous: false,
            message: ''
        }
    },
    methods: {
        submitDonation() {
            const amount = this.customAmount || this.activeAmount;
            this.message = `Рақмет! Сіз ${amount} ₸ мөлшерінде ${
                this.activePeriod === 'once' ? 'бір реттік' : this.activePeriod
            } қайырымдылық жасадыңыз`;
            // Reset form if needed
        }
    }
}
</script>

<style scoped>
/* Add scoped styles here if needed */
</style>
