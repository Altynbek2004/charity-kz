<template>
    <div class="bg-gray-100 py-10 min-h-screen flex justify-center items-start">
        <div class="w-full max-w-5xl bg-white rounded-xl shadow-lg flex overflow-hidden">
            <!-- Sidebar -->
            <aside class="w-1/4 bg-green-900 text-white p-6">
                <h2 class="text-2xl font-bold mb-6">Мәзір</h2>
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
                            @click="createGroup"
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
            <main class="w-3/4 p-10 bg-gray-50">
                <!-- Profile Section -->
                <section
                    v-show="showSection === 'profile'"
                    class="transition-opacity duration-300"
                    :class="{ 'opacity-100': showSection === 'profile', 'opacity-0 absolute': showSection !== 'profile' }"
                >
                    <!-- Profile photo -->
                    <div class="flex items-center mb-8">
                        <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center relative overflow-hidden">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-12 w-12 text-gray-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5.121 17.804A7.5 7.5 0 0112 15.75a7.5 7.5 0 016.879 2.054M15 11a3 3 0 10-6 0 3 3 0 006 0z"
                                />
                            </svg>
                            <div class="absolute bottom-0 right-0 bg-orange-400 p-1 rounded-full text-white">📷</div>
                        </div>
                        <div class="ml-6">
                            <h2 class="text-3xl font-bold">{{ user.email || 'Атыңыз' }}</h2>
                            <p class="text-gray-600 mt-1"></p>
                        </div>
                    </div>

                    <!-- Email info -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Сіз өз email поштаңызды көрсетпегенсіз
                        </label>
                        <div class="flex items-center bg-gray-100 p-2 rounded-md">
                            <input type="checkbox" class="mr-2" />
                            <span>Жаңалықтарға жазылыңыз</span>
                        </div>
                    </div>

                    <!-- Donation info -->
                    <div class="bg-green-800 text-white py-4 px-6 rounded-md text-lg font-semibold mb-6">
                        Сіздің үлесіңіз: <span class="ml-2 font-bold">0 ₸</span>
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
                                v-model="form.phone"
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

                <!-- Helps Section -->
                <section
                    v-show="showSection === 'groups'"
                    class="mt-4 transition-opacity duration-300 overflow-x-auto"
                    :class="{ 'opacity-100': showSection === 'groups', 'opacity-0 absolute': showSection !== 'groups' }"
                >
                    <h2 class="text-3xl font-bold mb-6">Көмек керек топ</h2>
                    <table
                        v-if="helps.length"
                        class="w-full bg-white border border-gray-300 rounded-lg overflow-hidden"
                    >
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 border-b">Имя</th>
                            <th class="py-3 px-4 border-b">Фамилия</th>
                            <th class="py-3 px-4 border-b">Номер телефона</th>
                            <th class="py-3 px-4 border-b">Электронная почта</th>
                            <th class="py-3 px-4 border-b">Информация</th>
                            <th class="py-3 px-4 border-b">Документы, файлы, изображение</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="help in helps" :key="help.id" class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ help.name }}</td>
                            <td class="py-3 px-4 border-b">{{ help.surname }}</td>
                            <td class="py-3 px-4 border-b">{{ help.number }}</td>
                            <td class="py-3 px-4 border-b">{{ help.email }}</td>
                            <td class="py-3 px-4 border-b">{{ help.info }}</td>
                            <td class="py-3 px-4 border-b">
                                <a
                                    :href="`/${help.file}`"
                                    target="_blank"
                                    class="text-blue-500 underline"
                                >
                                    {{ help.file.split('/').pop() }}
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
export default {
    data() {
        return {
            showSection: 'profile',
            form: {
                name: '',
                surname: '',
                gender: 'male',
                phone: '',
                city: 'almaty',
            },
            successMessage: '',
            helps: [],
            user:{},
        };
    },

    async created(){
      try{
          const response = await axios.get('/user');
          this.user = response.data;
      }  catch (er) {
        console.log("Қолданушының данныйын алу кезінде қателік туды.",er);
      }
    },

    methods: {
        async submitProfile() {
            try {
                const response = await axios.post('/profile', this.form);
                this.successMessage = response.data.message;
                // Сброс полей формы
                this.form = {
                    name: '',
                    surname: '',
                    gender: 'male',
                    phone: '',
                    city: 'almaty'
                };
            } catch (e) {
                console.error(e);
            }
        },
        createGroup() {
            this.$router.push('/create/group');
        },
        logout() {
            localStorage.removeItem('isLoggedIn');
            this.$router.push('/');
            alert('Сәтті шықтыңыз!');
        },
        async listGroupHelp() {
            this.showSection = 'groups';
            try {
                const response = await axios.get('/get-helps');
                this.helps = response.data;
            } catch (error) {
                console.error("Деректерді алу кезінде қате:", error);
            }
        },

    }
};
</script>
