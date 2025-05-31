<template>
    <div class="min-h-screen bg-mint-50 py-12">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="text-gray-700 mb-2">Сұрағыңыз Бар Ма?</div>
            <h1 class="text-4xl font-bold text-gray-800 mb-10">
                Жиі Қойылатын Сұрақтар
            </h1>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Left side - Image -->
                <div class="bg-mint-100 rounded-lg p-4 overflow-hidden">
                    <img
                        src="/storage/app/public/mainContent/img.png"
                        alt="Children playing with colorful balloons"
                        class="w-full h-full object-cover rounded-lg"
                    />
                </div>

                <!-- Right side - FAQ Accordion -->
                <div class="space-y-4">
                    <div
                        v-for="(item, index) in faqItems"
                        :key="index"
                        class="bg-white rounded-lg shadow-sm"
                    >
                        <div
                            class="flex justify-between items-center p-5 cursor-pointer"
                            @click="toggleItem(index)"
                        >
                            <h3 class="font-medium text-gray-800">{{ item.question }}</h3>
                            <span class="text-xl font-light"
                            >{{ item.isOpen ? '−' : '+' }}</span
                            >
                        </div>
                        <div v-show="item.isOpen" class="p-5 pt-0 border-t border-gray-100">
                            <p class="text-gray-600">{{ item.answer }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'FAQComponent',
    data() {
        return {
            faqImage:
                '/storage/app/public/mainContent/img.png',
            faqItems: [
                {
                    question: 'Әр Баланың Жарқын Болашағы Үшін Бірге Әрекет Етейік.',
                    answer:
                        'Біз әр баланың жарқын болашағы үшін бірге жұмыс істейміз. Біздің мақсатымыз - балаларға сапалы білім беру және олардың дамуына қолдау көрсету.',
                    isOpen: true,
                },
                {
                    question: 'Дұрыс Істеуді Қазір Бастайық',
                    answer:
                        'Балаларға дұрыс тәрбие беру - біздің басты міндетіміз. Біз балаларға дұрыс бағыт-бағдар беріп, олардың болашағын жарқын етуге тырысамыз.',
                    isOpen: false,
                },
                {
                    question: 'Мен Аты-Жөнімді Көрсетпей Қайырымдылық Жасай Аламын ба?',
                    answer:
                        'Әрине, сіз аты-жөніңізді көрсетпей қайырымдылық жасай аласыз. Біз сіздің жеке ақпаратыңызды құпия сақтаймыз және сіздің қалауыңызды құрметтейміз.',
                    isOpen: false,
                },
                {
                    question: 'Жақсы Өмір Үшін Білген Бірге Болыңыз',
                    answer:
                        'Жақсы өмір сүру үшін білім мен бірлік маңызды. Біз балаларға сапалы білім беру арқылы олардың болашағын жарқын етуге тырысамыз.',
                    isOpen: false,
                },
                {
                    question: 'Ай Сайынғы Қайырымдылықты Қалай Тоқтатамын?',
                    answer:
                        'Ай сайынғы қайырымдылықты тоқтату үшін жеке кабинетіңізге кіріп, "Қайырымдылық" бөліміне өтіп, "Тоқтату" батырмасын басыңыз немесе біздің қолдау қызметіне хабарласыңыз.',
                    isOpen: false,
                },
            ],
        };
    },
    methods: {
        toggleItem(index) {
            this.faqItems[index].isOpen = !this.faqItems[index].isOpen;
        },
    },
};
</script>

<style scoped>
.bg-mint-50 {
    background-color: #f0f7f4;
}

.bg-mint-100 {
    background-color: #e0f0ea;
}
</style>
