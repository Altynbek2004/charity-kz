<template>
    <div class="bg-gray-100 py-10">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md flex">
            <!-- Sidebar -->
            <aside class="w-1/4 bg-green-900 text-white p-6 rounded-l-lg">
                <h2 class="text-xl font-bold mb-4">Мәзір</h2>
                <ul class="space-y-4">
                    <li><button class="w-full text-left hover:text-green-300">Менің профилім</button></li>
                    <li><button class="w-full text-left hover:text-green-300">Менің жетістіктерім</button></li>
                    <li><button class="w-full text-left hover:text-green-300">Қайырымдылық тарихы</button></li>
                    <li><button class="w-full text-left hover:text-green-300">Менің жазылмаларым</button></li>
                    <li><button class="w-full text-left hover:text-green-300">Менің карталарым</button></li>
                    <li><button @click="logout" class="w-full text-left hover:text-red-400">Аккаунттан шығу</button></li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="w-3/4 p-8">
                <!-- Profile photo -->
                <div class="flex items-center mb-6">
                    <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7.5 7.5 0 0112 15.75a7.5 7.5 0 016.879 2.054M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                        </svg>
                        <div class="absolute bottom-0 right-0 bg-orange-400 p-1 rounded-full">
                            📷
                        </div>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-2xl font-bold">User Name</h2>
                        <p class="text-gray-600 mt-1">+7 705 777 77 77</p>
                    </div>
                </div>

                <!-- Email info -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Сіз өз email поштаңызды көрсетпегенсіз</label>
                    <div class="flex items-center bg-gray-100 p-2 rounded-md">
                        <input type="checkbox" class="mr-2" />
                        <span>Жаңалықтарға жазылыңыз</span>
                    </div>
                </div>

                <!-- Donation info -->
                <div class="bg-green-800 text-white py-4 px-6 rounded-md text-lg font-semibold mb-6">
                    Сіздің үлесіңіз: <span class="ml-2 font-bold text-white">0 ₸</span>
                </div>

                <div v-if="successMessage" class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                    {{ successMessage }}
                </div>

                <!-- Profile form -->
                <form @submit.prevent="submitProfile" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Есіміңіз</label>
                        <input type="text" v-model="form.name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Тегіңіз</label>
                        <input type="text" v-model="form.surname" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Жынысыңыз</label>
                        <select v-model="form.gender" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                            <option value="female">Әйел адам</option>
                            <option value="male">Ер адам</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Телефон нөміріңіз</label>
                        <input type="text" v-model="form.phone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Қалаңыз</label>
                        <select v-model="form.city" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                            <option value="almaty">Алматы</option>
                            <option value="astana">Астана</option>
                            <option value="shymkent">Шымкент</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-green-800 text-white px-6 py-2 rounded-md hover:bg-green-700">Сақтау</button>
                </form>

                <p class="text-xs text-gray-500 mt-4">
                    «Сақтау» батырмасын басу арқылы сіз көрсетілген ақпаратты платформада және жеке деректеріңізді өңдеуге келісім бересіз.
                </p>
            </main>
        </div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    data()
    {
        return {
            form: {
                name: '',
                surname: '',
                gender: 'male',
                phone: '',
                city: 'almaty',
            },
            successMessage: '',
        };
    },

    methods: {

        async submitProfile(){
          try{
              const response = await axios.post('/profile', this.form);
              this.successMessage = response.data.message;
              this.form = {... this.form};
              this.form = {
                  name: '',
                  surname: '',
                  gender: 'male',
                  phone: '',
                  city: 'almaty'
              };
          }  catch (e){
                console.log(e);
          }
        },

        logout()
        {
            localStorage.removeItem('isLoggedIn');
            this.isLoggedIn = false;

            this.$router.push('/');
            alert('Сәтті шықтыңыз!');
        }
    },

};

</script>
