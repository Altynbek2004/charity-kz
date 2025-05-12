<template>
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Create Group</h2>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input v-model="form.name" type="text" id="name" placeholder="Enter name" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <span v-if="errors.name" class="text-red-500 text-sm">{{ errors.name }}</span>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input v-model="form.title" type="text" id="title" placeholder="Enter title" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <span v-if="errors.title" class="text-red-500 text-sm">{{ errors.title }}</span>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea v-model="form.description" id="description" placeholder="Enter description" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <span v-if="errors.description" class="text-red-500 text-sm">{{ errors.description }}</span>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input @change="handleFileChange" type="file" id="image" accept="image/*" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <span v-if="errors.image" class="text-red-500 text-sm">{{ errors.image }}</span>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Group</button>
            <p v-if="status" class="mt-4 text-green-500">{{ status }}</p>
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
