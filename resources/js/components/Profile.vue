<template>
    <navbar/>
    <!-- Container -->
    <div class="bg-gray-100 py-10 min-h-screen flex justify-center items-start px-4 sm:px-6">

        <div class="w-full max-w-5xl bg-white rounded-xl shadow-lg flex flex-col md:flex-row overflow-hidden">


            <button
                class="md:hidden fixed top-4 left-4 z-50 bg-green-800 text-white p-2 rounded focus:outline-none"
                @click="showMenu = !showMenu"
            >
                <!-- Иконка: бургер -->
                <svg v-if="!showMenu" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <!-- Иконка: крестик -->
                <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Sidebar -->
            <aside
                :class="[
        'bg-green-900 text-white p-6 fixed md:static top-0 left-0 h-full z-40 transform transition-transform duration-300 ease-in-out mt-16',
        showMenu ? 'translate-x-0 w-3/4 sm:w-2/4' : '-translate-x-full',
        'md:translate-x-0 md:w-1/4 md:block mt-0'
    ]"
            >
                <h2 class="text-2xl ml-8 font-bold mb-6">Мәзір</h2>
                <ul class="space-y-4">
                    <li>
                        <button
                            @click="showSection = 'profile'"
                            :class="{ 'text-green-300 font-semibold': showSection === 'profile' }"
                            class="w-full text-left hover:text-green-300 transition-all"
                        >
                            Менің профилім
                        </button>
                    </li>
                    <li>
                        <button
                            @click="showSection = 'achievements'"
                            :class="{ 'text-green-300 font-semibold': showSection === 'achievements' }"
                            class="w-full text-left hover:text-green-300 transition-all"
                        >
                            Менің жетістіктерім
                        </button>
                    </li>
                    <li>
                        <button
                            @click="showSection = 'donations'"
                            :class="{ 'text-green-300 font-semibold': showSection === 'donations' }"
                            class="w-full text-left hover:text-green-300 transition-all"
                        >
                            Қайырымдылық тарихы
                        </button>
                    </li>
                    <li>
                        <button
                            @click="showSection = 'subscriptions'"
                            :class="{ 'text-green-300 font-semibold': showSection === 'subscriptions' }"
                            class="w-full text-left hover:text-green-300 transition-all"
                        >
                            Менің жазылмаларым
                        </button>
                    </li>
                    <li>
                        <button
                            @click="showSection = 'cards'"
                            :class="{ 'text-green-300 font-semibold': showSection === 'cards' }"
                            class="w-full text-left hover:text-green-300 transition-all"
                        >
                            Менің карталарым
                        </button>
                    </li>
                    <li>
                        <button
                            @click="showSection = 'createGroup'"
                            class="w-full text-left hover:text-green-300 transition-all"
                        >
                            Көмек керек топты құру
                        </button>
                    </li>
                    <li>
                        <button
                            @click="listGroupHelp"
                            :class="{ 'text-green-300 font-semibold': showSection === 'groups' }"
                            class="w-full text-left hover:text-green-300 transition-all"
                        >
                            Көмек керек топ
                        </button>
                    </li>
                    <li>
                        <button
                            @click="logout"
                            class="w-full text-left hover:text-red-400 transition-all"
                        >
                            Аккаунттан шығу
                        </button>
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="w-full md:w-3/4 p-6 sm:p-10 bg-gray-50">
                <!-- Profile Section -->
                <section
                    v-show="showSection === 'profile'"
                    class="transition-opacity duration-300"
                    :class="{ 'opacity-100': showSection === 'profile', 'opacity-0 absolute': showSection !== 'profile' }"
                >
                    <!-- Profile photo -->
                    <div class="flex items-center mb-8">
                        <!-- Avatar -->
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gray-300 flex items-center justify-center relative overflow-hidden cursor-pointer" @click="triggerFileInput">

                            <img :src="user.photo_url || photoPreview " />



                            <div class="absolute bottom-0 right-0 bg-orange-400 p-1 rounded-full text-white">📷</div>
                            <input type="file" @change="onPhotoChange" accept="image/*" class="hidden" ref="photoInput">
                        </div>

                        <!-- Name -->
                        <div class="ml-6">
                            <h2 class="text-3xl font-bold">{{ user.name || 'Атыңыз' }}</h2>
                            <p class="text-gray-600 mt-1"></p>
                        </div>
                    </div>

                    <!-- Email info -->
                    <div class="mb-6">
                        <div class="flex items-center bg-gray-100 p-2 rounded-md">
                            <input type="checkbox" class="mr-2" />
                            <span>Жаңалықтарға жазылыңыз</span>
                        </div>
                    </div>

                    <!-- Donation info -->
                    <div class="bg-green-800 text-white py-4 px-6 rounded-md text-lg font-semibold mb-6">
                        Сіздің үлесіңіз: <span class="ml-2 font-bold">{{ totalDonated }} ₸</span>
                    </div>

                    <!-- Success message -->
                    <div
                        v-if="successMessage"
                        class="bg-green-100 text-green-700 p-4 rounded-lg mb-4"
                    >
                        {{ successMessage }}
                    </div>

                    <!-- Profile form -->
                    <form @submit.prevent="submitProfile" class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700"
                            >Есіміңіз</label
                            >
                            <input
                                type="text"
                                v-model="form.name"
                                class="mt-2 w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                                placeholder="Атыңызды енгізіңіз"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700"
                            >Тегіңіз</label
                            >
                            <input
                                type="text"
                                v-model="form.surname"
                                class="mt-2 w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                                placeholder="Тегіңізді енгізіңіз"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700"
                            >Жынысыңыз</label
                            >
                            <select
                                v-model="form.gender"
                                class="mt-2 w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                            >
                                <option value="female">Әйел адам</option>
                                <option value="male">Ер адам</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700"
                            >Телефон нөміріңіз</label
                            >
                            <input
                                type="text"
                                v-model="form.phone_number"
                                class="mt-2 w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                                placeholder="+7 777 777 77 77"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700"
                            >Қалаңыз</label
                            >
                            <select
                                v-model="form.city"
                                class="mt-2 w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                            >
                                <option value="almaty">Алматы</option>
                                <option value="astana">Астана</option>
                                <option value="shymkent">Шымкент</option>
                            </select>
                        </div>
                        <button
                            type="submit"
                            class="w-full bg-green-800 text-white py-3 rounded-lg hover:bg-green-700 transition"
                        >
                            Сақтау
                        </button>
                    </form>
                </section>

                <!-- Achievements Section -->
                <section
                    v-show="showSection === 'achievements'"
                    class="transition-opacity duration-300"
                    :class="{ 'opacity-100': showSection === 'achievements', 'opacity-0 absolute': showSection !== 'achievements' }"
                >
                    <h2 class="text-3xl font-bold mb-6">Менің жетістіктерім</h2>

                    <!-- Achievement Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-green-600 text-white p-6 rounded-lg text-center">
                            <h3 class="text-2xl font-bold">{{ achievements.totalDonations }}</h3>
                            <p class="text-green-200">Барлық ауыстырулар</p>
                        </div>
                        <div class="bg-blue-600 text-white p-6 rounded-lg text-center">
                            <h3 class="text-2xl font-bold">{{ achievements.helpedProjects }}</h3>
                            <p class="text-blue-200">Көмектескен жобалар</p>
                        </div>
                        <div class="bg-purple-600 text-white p-6 rounded-lg text-center">
                            <h3 class="text-2xl font-bold">{{ achievements.volunteeredHours }}</h3>
                            <p class="text-purple-200">Волонтерлік сағаттар</p>
                        </div>
                    </div>

                    <!-- Badges -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold mb-4">Алған белгілеріңіз</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div v-for="badge in achievements.badges" :key="badge.id"
                                 class="text-center p-4 border rounded-lg hover:shadow-md transition-shadow">
                                <div class="text-4xl mb-2">{{ badge.icon }}</div>
                                <h4 class="font-semibold">{{ badge.name }}</h4>
                                <p class="text-sm text-gray-600">{{ badge.description }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Donations History Section -->
                <section
                    v-show="showSection === 'donations'"
                    class="transition-opacity duration-300"
                    :class="{ 'opacity-100': showSection === 'donations', 'opacity-0 absolute': showSection !== 'donations' }"
                >
                    <h2 class="text-3xl font-bold mb-6">Қайырымдылық тарихы</h2>

                    <!-- Filter Options -->
                    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                        <div class="flex flex-wrap gap-4">
                            <select v-model="donationFilter.period" class="border border-gray-300 rounded-lg p-2">
                                <option value="all">Барлық уақыт</option>
                                <option value="month">Осы ай</option>
                                <option value="year">Осы жыл</option>
                            </select>
                            <select v-model="donationFilter.type" class="border border-gray-300 rounded-lg p-2">
                                <option value="all">Барлық түрлері</option>
                                <option value="money">Ақшалай</option>
                                <option value="goods">Тауарлар</option>
                                <option value="time">Уақыт</option>
                            </select>
                        </div>
                    </div>

                    <!-- Donations Table -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left">Күні</th>
                                <th class="py-3 px-4 text-left">Жоба</th>
                                <th class="py-3 px-4 text-left">Түрі</th>
                                <th class="py-3 px-4 text-left">Сомасы</th>
                                <th class="py-3 px-4 text-left">Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="donation in filteredDonations" :key="donation.id" class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ formatDate(donation.date) }}</td>
                                <td class="py-3 px-4">{{ donation.project }}</td>
                                <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded-full text-xs"
                                              :class="getDonationTypeClass(donation.type)">
                                            {{ getDonationTypeName(donation.type) }}
                                        </span>
                                </td>
                                <td class="py-3 px-4 font-semibold">{{ donation.amount }} {{ donation.currency }}</td>
                                <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded-full text-xs"
                                              :class="getStatusClass(donation.status)">
                                            {{ getStatusName(donation.status) }}
                                        </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div v-if="!filteredDonations.length" class="p-8 text-center text-gray-500">
                            Қайырымдылық тарихы табылмады
                        </div>
                    </div>
                </section>

                <!-- Subscriptions Section -->
                <section
                    v-show="showSection === 'subscriptions'"
                    class="transition-opacity duration-300"
                    :class="{ 'opacity-100': showSection === 'subscriptions', 'opacity-0 absolute': showSection !== 'subscriptions' }"
                >
                    <h2 class="text-3xl font-bold mb-6">Менің жазылмаларым</h2>

                    <!-- Active Subscriptions -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4">Белсенді жазылмалар</h3>
                        <div class="space-y-4">
                            <div v-for="subscription in activeSubscriptions" :key="subscription.id"
                                 class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
                                <div>
                                    <h4 class="font-semibold text-lg">{{ subscription.project }}</h4>
                                    <p class="text-gray-600">{{ subscription.description }}</p>
                                    <p class="text-sm text-gray-500 mt-2">
                                        Келесі төлем: {{ formatDate(subscription.nextPayment) }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-green-600">{{ subscription.amount }} ₸/ай</p>
                                    <button @click="cancelSubscription(subscription.id)"
                                            class="mt-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                        Тоқтату
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-if="!activeSubscriptions.length" class="text-gray-500 text-center py-8">
                            Белсенді жазылмалар жоқ
                        </div>
                    </div>

                    <!-- Newsletter Subscriptions -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Жаңалықтар мен хабарландырулар</h3>
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="checkbox" v-model="newsletterSettings.weeklyNews" class="mr-3">
                                <span>Апталық жаңалықтар</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" v-model="newsletterSettings.projectUpdates" class="mr-3">
                                <span>Жоба жаңартулары</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" v-model="newsletterSettings.donationReceipts" class="mr-3">
                                <span>Қайырымдылық түбіртектері</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" v-model="newsletterSettings.emergencyAlerts" class="mr-3">
                                <span>Шұғыл жағдай хабарландырулары</span>
                            </label>
                        </div>
                        <button @click="saveNewsletterSettings"
                                class="mt-4 px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Сақтау
                        </button>
                    </div>
                </section>

                <!-- Cards Section -->
                <section
                    v-show="showSection === 'cards'"
                    class="transition-opacity duration-300"
                    :class="{ 'opacity-100': showSection === 'cards', 'opacity-0 absolute': showSection !== 'cards' }"
                >
                    <h2 class="text-3xl font-bold mb-6">Менің карталарым</h2>

                    <!-- Add New Card Button -->
                    <button @click="showAddCardForm = !showAddCardForm"
                            class="mb-6 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        + Жаңа карта қосу
                    </button>

                    <!-- Add Card Form -->
                    <div v-if="showAddCardForm" class="bg-white p-6 rounded-lg shadow-md mb-6">
                        <h3 class="text-xl font-semibold mb-4">Жаңа карта қосу</h3>
                        <form @submit.prevent="addCard" class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Карта нөмірі</label>
                                <input type="text" v-model="newCard.number"
                                       placeholder="1234 5678 9012 3456"
                                       class="mt-2 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700">Жарамдылық мерзімі</label>
                                    <input type="text" v-model="newCard.expiry"
                                           placeholder="MM/YY"
                                           class="mt-2 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700">CVV</label>
                                    <input type="text" v-model="newCard.cvv"
                                           placeholder="123"
                                           class="mt-2 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700">Карта иесінің аты</label>
                                <input type="text" v-model="newCard.holderName"
                                       placeholder="JOHN DOE"
                                       class="mt-2 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                            </div>
                            <div class="flex gap-4">
                                <button type="submit"
                                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                    Қосу
                                </button>
                                <button type="button" @click="showAddCardForm = false"
                                        class="px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                                    Болдырмау
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Saved Cards -->
                    <div class="space-y-4">
                        <div v-for="card in savedCards" :key="card.id"
                             class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="w-12 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded mr-4 flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">{{ getCardType(card.number) }}</span>
                                </div>
                                <div>
                                    <p class="font-semibold">**** **** **** {{ card.number.slice(-4) }}</p>
                                    <p class="text-gray-600 text-sm">{{ card.holderName }}</p>
                                    <p class="text-gray-500 text-xs">Жарамдылық: {{ card.expiry }}</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button @click="setDefaultCard(card.id)"
                                        :class="card.isDefault ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-600'"
                                        class="px-3 py-1 rounded text-sm">
                                    {{ card.isDefault ? 'Негізгі' : 'Негізгі ету' }}
                                </button>
                                <button @click="removeCard(card.id)"
                                        class="px-3 py-1 bg-red-100 text-red-600 rounded text-sm hover:bg-red-200 transition">
                                    Жою
                                </button>
                            </div>
                        </div>
                        <div v-if="!savedCards.length" class="text-gray-500 text-center py-8">
                            Сақталған карталар жоқ
                        </div>
                    </div>
                </section>

                <!-- Create Groups Section -->
                <section
                    v-show="showSection === 'createGroup'"
                    class="transition-opacity duration-300"
                    :class="{ 'opacity-100': showSection === 'createGroup', 'opacity-0 absolute': showSection !== 'createGroup' }"
                >
                    <charity-group/>
                </section>

                <!-- Helps Section -->
                <section
                    v-show="showSection === 'groups'"
                    class="mt-4 transition-opacity duration-300 overflow-x-auto"
                    :class="{ 'opacity-100': showSection === 'groups', 'opacity-0 absolute': showSection !== 'groups' }"
                >
                    <h2 class="text-3xl font-bold mb-6">Көмек керек топ</h2>
                    <!-- Helps Section Table -->
                    <table
                        v-if="helps.length"
                        class="w-full min-w-[600px] bg-white border border-gray-300 rounded-lg overflow-x-auto text-sm md:text-base"
                    >

                        <thead>
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 border-b">Имя группы</th>
                            <th class="py-3 px-4 border-b">Тема</th>
                            <th class="py-3 px-4 border-b">Описание</th>
                            <th class="py-3 px-4 border-b">Документы, файлы, изображение</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="help in helps" :key="help.id" class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ help.name }}</td>
                            <td class="py-3 px-4 border-b">{{ help.title  }}</td>
                            <td class="py-3 px-4 border-b">{{ help.description  }}</td>
                            <td class="py-3 px-4 border-b">
                                <a
                                    :href="`/${help.image}`"
                                    target="_blank"
                                    class="text-blue-500 underline"
                                >
                                    {{ help.image.split('/').pop() }}
                                </a>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                    <p v-else class="text-gray-600">Тізім бос</p>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Navbar from './design/Navbar.vue';
import CharityGroup from './CharityGroup.vue';
export default {
    components: {
        CharityGroup,Navbar
    },
    data() {
        return {
            showMenu: false,
            showSection: 'profile',
            photoPreview: null,
            form: {
                name: '',
                surname: '',
                gender: 'male',
                phone_number: '',
                city: 'almaty',
            },
            successMessage: '',
            helps: [],
            user: {},
            totalDonated: 0,

            // Achievements data
            achievements: {
                totalDonations: 0,
                helpedProjects: 0,
                volunteeredHours: 0,
                badges: [
                    { id: 1, name: 'Алғашқы көмек', description: 'Алғашқы қайырымдылық', icon: '🌟' },
                    { id: 2, name: 'Мейірімді жүрек', description: '10+ қайырымдылық', icon: '❤️' },
                    { id: 3, name: 'Қоғам серіктесі', description: 'Үнемі көмек беруші', icon: '🤝' },
                    { id: 4, name: 'Волонтер', description: '50+ сағат еңбек', icon: '🙌' }
                ]
            },

            // Donations data
            donations: [
                { id: 1, date: '2024-12-01', project: 'Балаларға көмек', type: 'money', amount: 5000, currency: '₸', status: 'completed' },
                { id: 2, date: '2024-11-15', project: 'Мектеп құрылысы', type: 'money', amount: 10000, currency: '₸', status: 'completed' },
                { id: 3, date: '2024-11-01', project: 'Мүгедектерге қолдау', type: 'goods', amount: 3000, currency: '₸', status: 'pending' },
                { id: 4, date: '2024-10-20', project: 'Қарттар үйі', type: 'time', amount: 8, currency: 'сағат', status: 'completed' }
            ],
            donationFilter: {
                period: 'all',
                type: 'all'
            },

            // Subscriptions data
            activeSubscriptions: [
                {
                    id: 1,
                    project: 'Балаларға ай сайынғы көмек',
                    description: 'Жетім балаларға тұрақты қолдау көрсету',
                    amount: 2000,
                    nextPayment: '2025-01-01'
                },
                {
                    id: 2,
                    project: 'Экология жобасы',
                    description: 'Табиғатты қорғау жобаларына қолдау',
                    amount: 1500,
                    nextPayment: '2025-01-05'
                }
            ],
            newsletterSettings: {
                weeklyNews: true,
                projectUpdates: true,
                donationReceipts: false,
                emergencyAlerts: true
            },

            // Cards data
            savedCards: [
                {
                    id: 1,
                    number: '4111111111111234',
                    expiry: '12/26',
                    holderName: 'JOHN DOE',
                    isDefault: true
                },
                {
                    id: 2,
                    number: '5555555555554444',
                    expiry: '10/25',
                    holderName: 'JOHN DOE',
                    isDefault: false
                }
            ],
            showAddCardForm: false,
            newCard: {
                number: '',
                expiry: '',
                cvv: '',
                holderName: ''
            }
        };
    },

    computed: {
        filteredDonations() {
            let filtered = this.donations;

            if (this.donationFilter.type !== 'all') {
                filtered = filtered.filter(d => d.type === this.donationFilter.type);
            }

            if (this.donationFilter.period !== 'all') {
                const now = new Date();
                const filterDate = new Date();

                if (this.donationFilter.period === 'month') {
                    filterDate.setMonth(now.getMonth() - 1);
                } else if (this.donationFilter.period === 'year') {
                    filterDate.setFullYear(now.getFullYear() - 1);
                }

                filtered = filtered.filter(d => new Date(d.date) >= filterDate);
            }

            return filtered.sort((a, b) => new Date(b.date) - new Date(a.date));
        }
    },

    async created(){
        try{
            const response = await axios.get('/user');
            this.user = response.data;
            this.form = response.data;
            this.calculateTotalDonated();
            this.loadAchievements();
        } catch (er) {
            console.log("Қолданушының данныйын алу кезінде қателік туды.", er);
        }
    },

    methods: {
        async submitProfile() {
            try {
                const formData = new FormData();

                // Форм өрістерін қосу
                formData.append('name', this.form.name);
                formData.append('surname', this.form.surname);
                formData.append('gender', this.form.gender);
                formData.append('phone_number', this.form.phone_number);
                formData.append('city', this.form.city);

                // Фото бар болса, оны да қосу
                if (this.form.photo) {
                    formData.append('photo', this.form.photo);
                }

                // POST сұраныс multipart/form-data ретінде
                const response = await axios.post('/profile', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                this.successMessage = response.data.message;

            } catch (e) {
                console.error('Профильді сақтау қатесі:', e);
            }
        },

        onPhotoChange(e) {
            const file = e.target.files[0];
            if (file) {
                this.form.photo = file;

                // preview жасау үшін қажет болса
                const reader = new FileReader();
                reader.onload = event => {
                    this.photoPreview = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },

        triggerFileInput() {
            this.$refs.photoInput.click();
        },

        createGroup() {
            this.$router.push('/create/group');
        },

        logout() {
            alert('Сәтті шықтыңыз!');
            this.$router.push('/');
        },

        async listGroupHelp() {
            this.showSection = 'groups';
            try {
                const response = await axios.get('/group');
                this.helps = response.data;
            } catch (error) {
                console.error("Деректерді алу кезінде қате:", error);
            }
        },

        // Achievement methods
        calculateTotalDonated() {
            this.totalDonated = this.donations
                .filter(d => d.type === 'money' && d.status === 'completed')
                .reduce((sum, d) => sum + d.amount, 0);
        },

        loadAchievements() {
            this.achievements.totalDonations = this.donations.length;
            this.achievements.helpedProjects = new Set(this.donations.map(d => d.project)).size;
            this.achievements.volunteeredHours = this.donations
                .filter(d => d.type === 'time')
                .reduce((sum, d) => sum + d.amount, 0);
        },

        // Donation methods
        formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('kk-KZ');
        },

        getDonationTypeClass(type) {
            const classes = {
                'money': 'bg-green-100 text-green-800',
                'goods': 'bg-blue-100 text-blue-800',
                'time': 'bg-purple-100 text-purple-800'
            };
            return classes[type] || 'bg-gray-100 text-gray-800';
        },

        getDonationTypeName(type) {
            const names = {
                'money': 'Ақшалай',
                'goods': 'Тауарлар',
                'time': 'Уақыт'
            };
            return names[type] || type;
        },

        getStatusClass(status) {
            const classes = {
                'completed': 'bg-green-100 text-green-800',
                'pending': 'bg-yellow-100 text-yellow-800',
                'failed': 'bg-red-100 text-red-800'
            };
            return classes[status] || 'bg-gray-100 text-gray-800';
        },

        getStatusName(status) {
            const names = {
                'completed': 'Аяқталды',
                'pending': 'Күтілуде',
                'failed': 'Сәтсіз'
            };
            return names[status] || status;
        },

        // Subscription methods
        async cancelSubscription(id) {
            if (confirm('Жазылманы тоқтатуға сенімдісіз бе?')) {
                try {
                    await axios.delete(`/subscriptions/${id}`);
                    this.activeSubscriptions = this.activeSubscriptions.filter(s => s.id !== id);
                    this.successMessage = 'Жазылма сәтті тоқтатылды';
                } catch (error) {
                    console.error('Жазылманы тоқтату қатесі:', error);
                }
            }
        },

        async saveNewsletterSettings() {
            try {
                await axios.post('/newsletter-settings', this.newsletterSettings);
                this.successMessage = 'Жаңалықтар параметрлері сақталды';
            } catch (error) {
                console.error('Параметрлерді сақтау қатесі:', error);
            }
        },

        // Card methods
        async addCard() {
            if (!this.newCard.number || !this.newCard.expiry || !this.newCard.cvv || !this.newCard.holderName) {
                alert('Барлық өрістерді толтырыңыз');
                return;
            }

            try {
                const response = await axios.post('/cards', this.newCard);
                this.savedCards.push({
                    id: Date.now(),
                    ...this.newCard,
                    isDefault: this.savedCards.length === 0
                });

                this.newCard = { number: '', expiry: '', cvv: '', holderName: '' };
                this.showAddCardForm = false;
                this.successMessage = 'Карта сәтті қосылды';
            } catch (error) {
                console.error('Карта қосу қатесі:', error);
            }
        },

        async removeCard(id) {
            if (confirm('Картаны жоюға сенімдісіз бе?')) {
                try {
                    await axios.delete(`/cards/${id}`);
                    this.savedCards = this.savedCards.filter(c => c.id !== id);
                    this.successMessage = 'Карта сәтті жойылды';
                } catch (error) {
                    console.error('Картаны жою қатесі:', error);
                }
            }
        },

        async setDefaultCard(id) {
            try {
                await axios.post(`/cards/${id}/set-default`);
                this.savedCards.forEach(card => {
                    card.isDefault = card.id === id;
                });
                this.successMessage = 'Негізгі карта өзгертілді';
            } catch (error) {
                console.error('Негізгі картаны орнату қатесі:', error);
            }
        },

        getCardType(number) {
            const firstDigit = number.charAt(0);
            if (firstDigit === '4') return 'VISA';
            if (firstDigit === '5') return 'MC';
            return 'CARD';
        }
    }
};
</script>
