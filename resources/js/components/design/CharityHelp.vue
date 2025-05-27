<template>
    <div class="charity-help min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
        <!-- Header Section -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">Қайырымдылық Көмек</h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Біз адамдарға көмек көрсету арқылы әлемді жақсы етуге тyrысамыз. Сіздің қолдауыңыз арқылы біз көптеген адамдардың өмірін өзгерте аламыз.
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-12">
            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-3xl font-bold text-blue-600 mb-2">1,234</div>
                    <div class="text-gray-600">Көмек алған отбасылар</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-3xl font-bold text-green-600 mb-2">₸2.5М</div>
                    <div class="text-gray-600">Жиналған қаражат</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-3xl font-bold text-purple-600 mb-2">856</div>
                    <div class="text-gray-600">Белсенді донорлар</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-3xl font-bold text-orange-600 mb-2">45</div>
                    <div class="text-gray-600">Белсенді жобалар</div>
                </div>
            </div>

            <!-- Active Projects -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Белсенді Жобалар</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="project in activeProjects" :key="project.id" class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <div class="h-48 bg-gradient-to-br" :class="project.gradient"></div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ project.title }}</h3>
                            <p class="text-gray-600 mb-4">{{ project.description }}</p>
                            <div class="mb-4">
                                <div class="flex justify-between text-sm mb-2">
                                    <span>{{ project.raised.toLocaleString() }} ₸</span>
                                    <span>{{ project.goal.toLocaleString() }} ₸</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" :style="`width: ${(project.raised / project.goal) * 100}%`"></div>
                                </div>
                            </div>
                            <button @click="donateToProject(project.id)" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                                Ауысу
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donation Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Қайырымдылық Көмегі</h2>
                <div class="max-w-2xl mx-auto">
                    <form @submit.prevent="submitDonation">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Аты-жөні</label>
                                <input v-model="donationForm.name" type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Электрондық пошта</label>
                                <input v-model="donationForm.email" type="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Көмек мөлшері (₸)</label>
                            <div class="grid grid-cols-3 md:grid-cols-6 gap-2 mb-4">
                                <button v-for="amount in presetAmounts" :key="amount" type="button"
                                        @click="donationForm.amount = amount"
                                        :class="donationForm.amount === amount ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                        class="py-2 px-4 rounded-lg font-medium transition">
                                    {{ amount.toLocaleString() }}
                                </button>
                            </div>
                            <input v-model.number="donationForm.amount" type="number" min="100" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Басқа сома енгізіңіз">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Жоба таңдау</label>
                            <select v-model="donationForm.projectId" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Жалпы қор</option>
                                <option v-for="project in activeProjects" :key="project.id" :value="project.id">
                                    {{ project.title }}
                                </option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Хабарлама (міндетті емес)</label>
                            <textarea v-model="donationForm.message" rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                      placeholder="Сіздің хабарламаңыз немесе тілектеріңіз"></textarea>
                        </div>

                        <button type="submit" :disabled="isSubmitting"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 rounded-xl text-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition disabled:opacity-50">
                            <span v-if="!isSubmitting">Көмек көрсету</span>
                            <span v-else>Жіберілуде...</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Success Stories -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Табыс Тарихтары</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div v-for="story in successStories" :key="story.id" class="bg-white rounded-xl p-6 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                {{ story.name.charAt(0) }}
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">{{ story.name }}</h4>
                                <p class="text-sm text-gray-500">{{ story.date }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 italic">"{{ story.story }}"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CharityHelp',
    data() {
        return {
            isSubmitting: false,
            donationForm: {
                name: '',
                email: '',
                amount: 5000,
                projectId: '',
                message: ''
            },
            presetAmounts: [1000, 2500, 5000, 10000, 25000, 50000],
            activeProjects: [
                {
                    id: 1,
                    title: 'Балаларға көмек',
                    description: 'Қиын жағдайдағы балаларға білім беру және медициналық көмек көрсету',
                    raised: 180000,
                    goal: 500000,
                    gradient: 'from-pink-400 to-red-500'
                },
                {
                    id: 2,
                    title: 'Кәрілерге қолдау',
                    description: 'Жалғыз кәрілерге күнделікті көмек пен медициналық қызмет көрсету',
                    raised: 320000,
                    goal: 600000,
                    gradient: 'from-purple-400 to-pink-500'
                },
                {
                    id: 3,
                    title: 'Білім беру бағдарламасы',
                    description: 'Кедей отбасылардың балаларына сапалы білім беруге мүмкіндік жасау',
                    raised: 450000,
                    goal: 800000,
                    gradient: 'from-blue-400 to-purple-500'
                }
            ],
            successStories: [
                {
                    id: 1,
                    name: 'Айгүл Серікова',
                    date: '2024 жылдың қазаны',
                    story: 'Сіздердің көмегіңізбен менің балам қажетті операцияны жасатып, қазір сау-саламат. Рақмет сайсыз!'
                },
                {
                    id: 2,
                    name: 'Мұрат Қасымов',
                    date: '2024 жылдың қыркүйегі',
                    story: 'Отбасымыз қиын кезеңнен өтіп жатқанда, сіздердің қолдауыңыз бізге үлкен көмек болды. Барлығына алғыс!'
                }
            ]
        }
    },
    methods: {
        async submitDonation() {
            this.isSubmitting = true;
            try {
                // Simulate API call
                await new Promise(resolve => setTimeout(resolve, 2000));

                // Show success message
                alert(`Рақмет сайсыз! Сіздің ${this.donationForm.amount.toLocaleString()} ₸ көмегіңіз қабылданды.`);

                // Reset form
                this.donationForm = {
                    name: '',
                    email: '',
                    amount: 5000,
                    projectId: '',
                    message: ''
                };
            } catch (error) {
                alert('Қате пайда болды. Қайталап көріңіз.');
            } finally {
                this.isSubmitting = false;
            }
        },

        donateToProject(projectId) {
            this.donationForm.projectId = projectId;
            // Scroll to donation form
            document.querySelector('form').scrollIntoView({ behavior: 'smooth' });
        }
    }
}
</script>

<style scoped>
/* Additional styles if needed */
</style>
