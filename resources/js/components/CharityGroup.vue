<template>
    <div class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-green-800 mb-6 text-center">Топты Құру</h2>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Аты</label>
                <input v-model="form.name" type="text" id="name" placeholder="Топтың атын енгізіңіз"
                       class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                <span v-if="errors.name" class="text-red-500 text-sm">{{ errors.name }}</span>
            </div>
            <div class="mb-5">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Тақырып</label>
                <input v-model="form.title" type="text" id="title" placeholder="Тақырыпты енгізіңіз"
                       class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                <span v-if="errors.title" class="text-red-500 text-sm">{{ errors.title }}</span>
            </div>
            <div class="mb-5">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Сипаттама</label>
                <textarea v-model="form.description" id="description" placeholder="Топ сипаттамасы"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
                <span v-if="errors.description" class="text-red-500 text-sm">{{ errors.description }}</span>
            </div>
            <div class="mb-5">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Сурет</label>
                <input @change="handleFileChange" type="file" id="image" accept="image/*"
                       class="w-full p-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 bg-white" />
                <span v-if="errors.image" class="text-red-500 text-sm">{{ errors.image }}</span>
            </div>
            <button type="submit"
                    class="w-full bg-green-800 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition-colors duration-300">
                Топты Құру
            </button>
            <p v-if="status" class="mt-4 text-center text-green-600 font-medium">{{ status }}</p>
        </form>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    name: "CharityGroup",

    data() {
        return {
            form: {
                name: '',
                title: '',
                description: '',
                image: null,
            },
            errors: {},
            status: '',
        };
    },
    methods: {
        handleFileChange(e) {
            this.form.image = e.target.files[0];
        },
        async submitForm() {
            try {
                const formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('title', this.form.title);
                formData.append('description', this.form.description);
                formData.append('image', this.form.image);

                const response = await axios.post('/create/group', formData);
                this.status = 'Group created successfully!';
                this.form = { name: '', title: '', description: '', image: null };
                this.errors = {};
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    this.errors = error.response.data.errors;
                } else {
                    this.status = 'An error occurred while creating the group.';
                }
            }
        }
    }
}
</script>
<style>

</style>
