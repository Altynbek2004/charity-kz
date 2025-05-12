<template>
    <div class="flex justify-center min-h-screen bg-gradient-to-br from-indigo-50 to-blue-100 py-16">
        <div class="w-full max-w-lg p-10 bg-white rounded-2xl shadow-2xl transition hover:shadow-xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Форма для получение помощи</h2>

            <div v-if="status" class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ status }}
            </div>

            <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <div>
                    <label for="name" class="block text-gray-700 font-semibold">Имя</label>
                    <input type="text" id="name" v-model="form.name" placeholder="Введите ваше имя" required
                           class="w-full rounded-lg border-gray-300 p-4 text-gray-900 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition" />
                    <span v-if="errors.name" class="text-red-500 text-sm">{{ errors.name[0] }}</span>
                </div>

                <div>
                    <label for="surname" class="block text-gray-700 font-semibold">Фамилия</label>
                    <input type="text" id="surname" v-model="form.surname" placeholder="Введите вашу фамилию" required
                           class="w-full rounded-lg border-gray-300 p-4 text-gray-900 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition" />
                    <span v-if="errors.surname" class="text-red-500 text-sm">{{ errors.surname[0] }}</span>
                </div>

                <div>
                    <label for="number" class="block text-gray-700 font-semibold">Номер телефона</label>
                    <input type="tel" id="number" v-model="form.number" placeholder="+7 777 777 77 77" required
                           class="w-full rounded-lg border-gray-300 p-4 text-gray-900 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition" />
                    <span v-if="errors.number" class="text-red-500 text-sm">{{ errors.number[0] }}</span>
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-semibold">Электронная почта</label>
                    <input type="email" id="email" v-model="form.email" placeholder="example@mail.com" required
                           class="w-full rounded-lg border-gray-300 p-4 text-gray-900 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition" />
                    <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email[0] }}</span>
                </div>

                <div>
                    <label for="file" class="block text-gray-700 font-semibold">Документы</label>
                    <input type="file" id="file" @change="handleFileChange"
                           name="file"
                           class="w-full rounded-lg border-gray-300 p-4 text-gray-900 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition" />
                    <span v-if="errors.file" class="text-red-500 text-sm">{{ errors.file[0] }}</span>
                </div>

                <div>
                    <label for="info" class="block text-gray-700 font-semibold">Информация о себе</label>
                    <textarea id="info" v-model="form.info" rows="4" placeholder="Расскажите немного о себе"
                              class="w-full rounded-lg border-gray-300 p-4 text-gray-900 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition"></textarea>
                    <span v-if="errors.info" class="text-red-500 text-sm">{{ errors.info[0] }}</span>
                </div>

                <button type="submit"
                        class="w-full bg-indigo-600 text-white font-semibold py-4 rounded-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:scale-105">
                    Отправить
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                surname: '',
                number: '',
                email: '',
                file: null,
                info: ''
            },
            status: '',
            errors: {}
        };
    },
    methods: {
        handleFileChange(e) {
            this.form.file = e.target.files[0];
        },
        async submitForm() {
            try {
                const formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('surname', this.form.surname);
                formData.append('number', this.form.number);
                formData.append('email', this.form.email);
                formData.append('file', this.form.file);
                formData.append('info', this.form.info);

                const response = await axios.post('/gethelp', formData);

                this.status = 'Успешно сохранен!';

                this.form = {
                    name: '',
                    surname: '',
                    number: '',
                    email: '',
                    file: null,
                    info: ''
                };
                this.errors = {};

                setTimeout(() => this.status = '', 2000);

            } catch (error) {
                if (error.response && error.response.data.errors) {
                    this.errors = error.response.data.errors;
                } else {
                    this.status = 'Произошла ошибка при сохранении данных.';
                }
            }
        }
    }
};
</script>

<style scoped>
body {
    font-family: Arial, sans-serif;
}
</style>
