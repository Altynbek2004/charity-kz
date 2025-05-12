// resources/js/components/LoadingSpinner.vue

<template>
    <div class="loading-spinner">
        <svg class="animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" :width="size" :height="size">
            <circle class="opacity-25" cx="12" cy="12" r="10" :stroke="color" stroke-width="4"></circle>
            <path class="opacity-75" :fill="color" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span v-if="text" class="loading-text">{{ text }}</span>
    </div>
</template>

<script>
export default {
    name: 'LoadingSpinner',
    props: {
        color: {
            type: String,
            default: 'currentColor'
        },
        size: {
            type: String,
            default: '24'
        },
        text: {
            type: String,
            default: ''
        }
    }
};
</script>

<style scoped>
.loading-spinner {
    @apply flex flex-col items-center justify-center;
}

.loading-text {
    @apply mt-2 text-sm text-gray-600;
}
</style>
