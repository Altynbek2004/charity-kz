<template>
    <div class="volunteer-service min-h-screen bg-gradient-to-br from-green-50 to-teal-100">

        <!-- Navbar placeholder -->
        <navbar/>

        <!-- Header Section -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">Еріктілік Қызметі</h1>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Еріктілер болып қызмет ету арқылы қоғамға пайдалы жұмыс істеп, адамдарға көмек көрсетіңіз. Сіздің уақытыңыз бен қабілетіңіз арқылы біз көп нәрсеге жете аламыз.
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-12">
            <!-- Volunteer Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-3xl font-bold text-green-600 mb-2">342</div>
                    <div class="text-gray-600">Белсенді еріктілер</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-3xl font-bold text-blue-600 mb-2">1,856</div>
                    <div class="text-gray-600">Жасалған жұмыс сағаты</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-3xl font-bold text-purple-600 mb-2">28</div>
                    <div class="text-gray-600">Белсенді жобалар</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                    <div class="text-3xl font-bold text-orange-600 mb-2">95%</div>
                    <div class="text-gray-600">Қанағаттану деңгейі</div>
                </div>
            </div>

            <!-- Volunteer Opportunities -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Еріктілік Мүмкіндіктері</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="opportunity in opportunities" :key="opportunity.id"
                         class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <div class="h-48 flex items-center justify-center text-6xl" :class="opportunity.bgColor">
                            {{ opportunity.icon }}
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-xl font-semibold text-gray-900">{{ opportunity.title }}</h3>
                                <span class="px-3 py-1 text-xs font-medium rounded-full" :class="opportunity.categoryColor">
                  {{ opportunity.category }}
                </span>
                            </div>
                            <p class="text-gray-600 mb-4">{{ opportunity.description }}</p>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <span class="font-medium mr-2">📅</span>
                                    {{ opportunity.schedule }}
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <span class="font-medium mr-2">📍</span>
                                    {{ opportunity.location }}
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <span class="font-medium mr-2">👥</span>
                                    {{ opportunity.spots }} орын қажет
                                </div>
                            </div>
                            <button @click="applyForOpportunity(opportunity.id)"
                                    class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
                                Қатысу
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Еріктілікке Тіркелу</h2>
                <div class="max-w-2xl mx-auto">
                    <form @submit.prevent="submitVolunteerApplication">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Аты-жөні</label>
                                <input v-model="volunteerForm.name" type="text" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Жасы</label>
                                <input v-model.number="volunteerForm.age" type="number" min="16" max="80" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Телефон</label>
                                <input v-model="volunteerForm.phone" type="tel" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Электрондық пошта</label>
                                <input v-model="volunteerForm.email" type="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Қызығушылық саласы</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                <label v-for="interest in interests" :key="interest" class="flex items-center">
                                    <input v-model="volunteerForm.interests" :value="interest" type="checkbox"
                                           class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">{{ interest }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Қол жетімді уақыт</label>
                            <select v-model="volunteerForm.availability" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Таңдаңыз</option>
                                <option value="weekdays">Жұмыс күндері</option>
                                <option value="weekends">Демалыс күндері</option>
                                <option value="evenings">Кешкі уақыт</option>
                                <option value="flexible">Икемді уақыт</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Тәжірибе мен дағдылар</label>
                            <textarea v-model="volunteerForm.experience" rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                      placeholder="Сіздің алдыңғы тәжірибеңіз, дағдыларыңыз және мотивацияңыз туралы жазыңыз"></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input v-model="volunteerForm.agreement" type="checkbox" required
                                       class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">
                  Мен еріктілік қызмет шарттарымен келісемін және жеке деректерімді өңдеуге рұқсат беремін
                </span>
                            </label>
                        </div>

                        <button type="submit" :disabled="isSubmitting"
                                class="w-full bg-gradient-to-r from-green-600 to-teal-600 text-white py-4 rounded-xl text-lg font-semibold hover:from-green-700 hover:to-teal-700 transition disabled:opacity-50">
                            <span v-if="!isSubmitting">Өтінім жіберу</span>
                            <span v-else>Жіберілуде...</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Volunteer Testimonials -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Еріктілердің Пікірлері</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="testimonial in testimonials" :key="testimonial.id"
                         class="bg-white rounded-xl p-6 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                {{ testimonial.name.charAt(0) }}
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">{{ testimonial.name }}</h4>
                                <p class="text-sm text-gray-500">{{ testimonial.role }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 italic mb-4">"{{ testimonial.quote }}"</p>
                        <div class="flex text-yellow-400">
                            <span v-for="i in 5" :key="i">⭐</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How to Get Started -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Қалай бастау керек?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📝</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">1. Тіркелу</h3>
                        <p class="text-gray-600">Жоғарыдағы форманы толтырып, еріктілікке тіркеліңіз</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🤝</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">2. Сұхбат</h3>
                        <p class="text-gray-600">Біз сізбен байланысып, қысқа сұхбат өткіземіз</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">3. Қызмет бастау</h3>
                        <p class="text-gray-600">Сізге ұнайтын жобаны таңдап, еріктілік қызметін бастаңыз</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


import Navbar from './Navbar.vue';

export default {
    name: 'VolunteerService',
    components: {
        Navbar,
    },
    data() {
        return {
            isSubmitting: false,
            volunteerForm: {
                name: '',
                age: '',
                phone: '',
                email: '',
                interests: [],
                availability: '',
                experience: '',
                agreement: false
            },
            interests: [
                'Балалармен жұмыс',
                'Кәрілерге қамқорлық',
                'Білім беру',
                'Медициналық көмек',
                'Экология',
                'Спорт',
                'Мәдениет',
                'Технология',
                'Аудару қызметі'
            ],
            opportunities: [
                {
                    id: 1,
                    title: 'Балаларға оқыту',
                    description: 'Қиын жағдайдағы балаларға сабақ беру және үй жұмыстарына көмек көрсету',
                    category: 'Білім беру',
                    categoryColor: 'bg-blue-100 text-blue-800',
                    schedule: 'Аптасына 2-3 рет',
                    location: 'Алматы қаласы',
                    spots: 5,
                    icon: '📚',
                    bgColor: 'bg-blue-100'
                },
                {
                    id: 2,
                    title: 'Кәрілерге көмек',
                    description: 'Жалғыз кәрілерге азық-түлік сатып алу және үй жұмыстарына көмек',
                    category: 'Қамқорлық',
                    categoryColor: 'bg-purple-100 text-purple-800',
                    schedule: 'Дүйсенбі-жұма',
                    location: 'Нұр-Сұлтан қаласы',
                    spots: 8,
                    icon: '👵',
                    bgColor: 'bg-purple-100'
                },
                {
                    id: 3,
                    title: 'Экологиялық тазалау',
                    description: 'Саябақтар мен көшелерді тазалау, ағаш отырғызу жобаларына қатысу',
                    category: 'Экология',
                    categoryColor: 'bg-green-100 text-green-800',
                    schedule: 'Сенбі таңертең',
                    location: 'Шымкент қаласы',
                    spots: 12,
                    icon: '🌱',
                    bgColor: 'bg-green-100'
                },
                {
                    id: 4,
                    title: 'Ас үй көмекшісі',
                    description: 'Қайырымдылық ас үйінде ас дайындау және таратуға көмек көрсету',
                    category: 'Тамақ беру',
                    categoryColor: 'bg-orange-100 text-orange-800',
                    schedule: 'Күн сайын кеш',
                    location: 'Алматы қаласы',
                    spots: 6,
                    icon: '🍲',
                    bgColor: 'bg-orange-100'
                },
                {
                    id: 5,
                    title: 'Медициналық көмек',
                    description: 'Дәрігерлерге ауруханада немесе емханада көмек көрсету',
                    category: 'Медицина',
                    categoryColor: 'bg-red-100 text-red-800',
                    schedule: 'Икемді уақыт',
                    location: 'Қарағанды қаласы',
                    spots: 3,
                    icon: '🏥',
                    bgColor: 'bg-red-100'
                },
                {
                    id: 6,
                    title: 'Аудару қызметі',
                    description: 'Шетелдік қонақтар мен мұқтаж адамдарға аудармашы ретінде көмек',
                    category: 'Тіл білім',
                    categoryColor: 'bg-indigo-100 text-indigo-800',
                    schedule: 'Қажеттілік бойынша',
                    location: 'Онлайн/Офлайн',
                    spots: 4,
                    icon: '🗣️',
                    bgColor: 'bg-indigo-100'
                }
            ],
            testimonials: [
                {
                    id: 1,
                    name: 'Асем Нұрғалиева',
                    role: 'Еріктілік тәжірибесі: 2 жыл',
                    quote: 'Еріктілік қызмет арқылы көптеген адамдарға көмек көрсетіп, өз-өзімді де дамыттым. Бұл тамаша тәжірибе!'
                },
                {
                    id: 2,
                    name: 'Данияр Әбдіқадыров',
                    role: 'Еріктілік тәжірибесі: 1.5 жыл',
                    quote: 'Балаларға сабақ беру арқылы олардың өсуіне үлес қосу өте қуантады. Ұсынамын!'
                },
                {
                    id: 3,
                    name: 'Гүлнар Сейітова',
                    role: 'Еріктілік тәжірибесі: 3 жыл',
                    quote: 'Кәрілерге көмек көрсету менің жүрегімді жылытады. Олардың алғыс сөздері - ең үлкен сыйақы.'
                }
            ]
        }
    },
    methods: {
        async submitVolunteerApplication() {
            this.isSubmitting = true;
            try {
                // Validate form
                if (!this.volunteerForm.name || !this.volunteerForm.email || !this.volunteerForm.phone) {
                    throw new Error('Барлық міндетті өрістерді толтырыңыз');
                }

                if (this.volunteerForm.interests.length === 0) {
                    throw new Error('Кем дегенде бір қызығушылық саласын таңдаңыз');
                }

                // Simulate API call
                await new Promise(resolve => setTimeout(resolve, 2000));

                // Show success message
                alert(`Рақмет, ${this.volunteerForm.name}! Сіздің өтінімді қабылдадық. Біз жақын арада сізбен байланысамыз.`);

                // Reset form
                this.volunteerForm = {
                    name: '',
                    age: '',
                    phone: '',
                    email: '',
                    interests: [],
                    availability: '',
                    experience: '',
                    agreement: false
                };
            } catch (error) {
                alert(error.message || 'Қате пайда болды. Қайталап көріңіз.');
            } finally {
                this.isSubmitting = false;
            }
        },

        applyForOpportunity(opportunityId) {
            // Find the opportunity
            const opportunity = this.opportunities.find(op => op.id === opportunityId);
            if (opportunity) {
                // Pre-fill form with related interest
                const relatedInterests = {
                    1: 'Балалармен жұмыс',
                    2: 'Кәрілерге қамқорлық',
                    3: 'Экология',
                    4: 'Балалармен жұмыс',
                    5: 'Медициналық көмек',
                    6: 'Аудару қызметі'
                };

                if (relatedInterests[opportunityId] && !this.volunteerForm.interests.includes(relatedInterests[opportunityId])) {
                    this.volunteerForm.interests.push(relatedInterests[opportunityId]);
                }
            }

            // Scroll to registration form
            document.querySelector('form').scrollIntoView({ behavior: 'smooth' });
        }
    }
}
</script>

<style scoped>
/* Additional custom styles */
.volunteer-service {
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

/* Smooth hover transitions */
.bg-white:hover {
    transform: translateY(-2px);
    transition: transform 0.2s ease;
}

/* Custom checkbox styles */
input[type="checkbox"]:checked {
    background-color: #059669;
    border-color: #059669;
}

/* Form focus states */
input:focus, select:focus, textarea:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
}

/* Loading animation */
@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>
