<template>
 <navbar/>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Section Title -->
        <div class="mb-8">
            <h2 class="text-gray-500 text-sm font-medium mb-2">Get In Touch</h2>
            <h1 class="text-3xl font-bold text-gray-800">Send Me A Message</h1>
        </div>

        <!-- Form -->
        <form @submit.prevent="submitForm" class="w-full">
            <div class="flex flex-wrap -mx-3 mb-6">
                <!-- First Name -->
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="first_name">
                        First name
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="first_name"
                        type="text"
                        v-model="form.first_name"
                        placeholder="Your"
                    >
                    <p v-if="errors.first_name" class="text-red-500 text-xs italic">{{ errors.first_name[0] }}</p>
                </div>

                <!-- Last Name -->
                <div class="w-full md:w-1/2 px-3">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="last_name">
                        Last name
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                        id="last_name"
                        type="text"
                        v-model="form.last_name"
                        placeholder="Name"
                    >
                    <p v-if="errors.last_name" class="text-red-500 text-xs italic">{{ errors.last_name[0] }}</p>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <!-- Email -->
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="email">
                        Mail
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="email"
                        type="email"
                        v-model="form.email"
                        placeholder="Your Email"
                    >
                    <p v-if="errors.email" class="text-red-500 text-xs italic">{{ errors.email[0] }}</p>
                </div>

                <!-- Phone -->
                <div class="w-full md:w-1/2 px-3">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="phone">
                        Phone
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                        id="phone"
                        type="text"
                        v-model="form.phone"
                        placeholder="+880"
                    >
                    <p v-if="errors.phone" class="text-red-500 text-xs italic">{{ errors.phone[0] }}</p>
                </div>
            </div>

            <!-- Message -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="message">
                        Message
                    </label>
                    <textarea
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48"
                        id="message"
                        v-model="form.message"
                        placeholder="Type Your Message Here..."
                    ></textarea>
                    <p v-if="errors.message" class="text-red-500 text-xs italic">{{ errors.message[0] }}</p>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                    <button
                        class="bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-6 rounded focus:outline-none focus:shadow-outline transition duration-300"
                        type="submit"
                        :disabled="loading"
                    >
                        <span v-if="loading">Sending...</span>
                        <span v-else>Send Message</span>
                    </button>
                </div>
                <div class="md:w-2/3">
                    <p v-if="success" class="text-green-500 font-medium mt-4 md:mt-0">Message sent successfully!</p>
                </div>
            </div>
        </form>

        <!-- Address Section -->
        <div class="mt-16 bg-gray-50 p-6 rounded-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Address</h2>
            <p class="text-gray-600 mb-4">
                Quam Elementum Pulvinar Etiam Non Quam Lacus Suspendisse A Scelerisque Purus Semper Eget Duis At Lobortisselerisque Fermentum Dui Faucibus In Ornare
            </p>

            <div class="mt-6">
                <div class="flex items-start mb-3">
                    <span class="font-medium text-gray-700 mr-2">Location :</span>
                    <span class="text-gray-600">4517 Washington Ave. Manchester, Kentucky 39495</span>
                </div>

                <div class="flex items-start mb-3">
                    <span class="font-medium text-gray-700 mr-2">Phone :</span>
                    <a href="tel:+8854476456" class="text-gray-600 hover:text-teal-500">+8854476456</a>
                </div>

                <div class="flex items-start">
                    <span class="font-medium text-gray-700 mr-2">Email :</span>
                    <a href="mailto:Givelifecharity@Gmail.Com" class="text-gray-600 hover:text-teal-500">Givelifecharity@Gmail.Com</a>
                </div>
            </div>
        </div>

        <!-- Logo Section -->
        <div class="mt-16 flex flex-wrap justify-between items-center py-8 border-t border-gray-200">
            <div class="w-full sm:w-1/2 md:w-1/4 mb-8 md:mb-0 flex justify-center">
                <img src="/storage/app/public/images/1.png" alt="Logotype" class="h-12 opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300">
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4 mb-8 md:mb-0 flex justify-center">
                <img src="/storage/app/public/images/2.png" alt="Renew Toxicology" class="h-12 opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300">
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4 mb-8 md:mb-0 flex justify-center">
                <img src="/storage/app/public/images/3.png" alt="Globe International" class="h-12 opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300">
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4 flex justify-center">
                <img src="/storage/app/public/images/4.png" alt="Action for Charity" class="h-12 opacity-70 grayscale hover:grayscale-0 hover:opacity-100 transition duration-300">
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from './Navbar.vue';


export default {
    name: 'ContactForm',
    components: {
        Navbar,
    },

    data() {
        return {
            form: {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                message: ''
            },
            errors: {},
            loading: false,
            success: false
        }
    },
    methods: {
        async submitForm() {
            this.loading = true;
            this.errors = {};
            this.success = false;

            try {
                const params = this.form;
                 axios.post('/contact',params).then(response => {
                     if (response.data.success) {
                         setTimeout(() => {
                             this.success = true;
                         }, 2000);
                     }
                     this.resetForm();
                 });

            } catch (error) {
                if (error.response && error.response.data && error.response.data.errors) {
                    this.errors = error.response.data.errors;
                } else {
                    console.error('Error submitting form:', error);
                }
            } finally {
                this.loading = false;
            }
        },
        resetForm() {
            this.form = {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                message: ''
            };
        }
    }
}
</script>

<style scoped>

</style>
