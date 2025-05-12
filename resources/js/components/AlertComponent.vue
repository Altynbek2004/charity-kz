// Оповещающий компонент для показа сообщений пользователю
// resources/js/components/AlertComponent.vue

<template>
    <div v-if="show" :class="['alert', alertClass]" role="alert" ref="alert">
        <div class="flex items-center">
            <svg v-if="type === 'success'" class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <svg v-else-if="type === 'error'" class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>{{ message }}</div>
        </div>
        <button @click="closeAlert" class="ml-auto" aria-label="Close">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</template>

<script>
export default {
    name: 'AlertComponent',
    props: {
        message: {
            type: String,
            required: true
        },
        type: {
            type: String,
            default: 'success',
            validator: (value) => ['success', 'error', 'warning', 'info'].includes(value)
        },
        duration: {
            type: Number,
            default: 5000
        },
        autoClose: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            show: true,
            timeout: null
        };
    },
    computed: {
        alertClass() {
            return {
                'bg-green-100 text-green-800 border-green-300': this.type === 'success',
                'bg-red-100 text-red-800 border-red-300': this.type === 'error',
                'bg-yellow-100 text-yellow-800 border-yellow-300': this.type === 'warning',
                'bg-blue-100 text-blue-800 border-blue-300': this.type === 'info'
            };
        }
    },
    mounted() {
        if (this.autoClose && this.duration > 0) {
            this.timeout = setTimeout(() => {
                this.closeAlert();
            }, this.duration);
        }
    },
    beforeUnmount() {
        if (this.timeout) {
            clearTimeout(this.timeout);
        }
    },
    methods: {
        closeAlert() {
            this.show = false;
            this.$emit('close');
        }
    }
};
</script>

<style scoped>
.alert {
    @apply flex items-center justify-between px-4 py-3 rounded border mb-4;
}
</style>
