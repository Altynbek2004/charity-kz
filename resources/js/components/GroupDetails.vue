<template>
    <div>
        <!-- Топ туралы ақпарат -->
        <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
            <img :src="'/' + group.image" class="w-full rounded-lg mb-4" alt="Group Image">
            <span class="text-green-500 text-sm font-medium">{{ group.name }}</span>
            <h2 class="text-3xl font-bold mb-4">{{ group.title }}</h2>
            <p class="text-gray-700 mb-6">{{ group.description }}</p>

            <div class="flex justify-end">
                <!-- Көмек көрсету батырмасы -->
                <button @click="showModal = true" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-green-600 transition-colors">
                    Көмек көрсету
                </button>
            </div>
        </div>

        <!-- Модальды терезе, QR кодты көрсету -->
        <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-8 rounded-lg shadow-lg w-96">
                <!-- QR код -->
                <qrcode-vue :value="qrCodeValue" size="200" class="mx-auto mb-6"></qrcode-vue>

                <!-- Модальды терезені жабу -->
                <div class="mt-6 text-right">
                    <button @click="showModal = false" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Жабу</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// QR код компонентін импорттау
import QRCodeVue from 'qrcode.vue';

export default {
    components: {
        QRCodeVue
    },
    data() {
        return {
            group: {},
            showModal: false,
            qrCodeValue: '',
        };
    },
    created() {
        this.OneGroup();
    },
    methods: {
        async OneGroup() {
            try {
                const id = this.$route.params.id;
                const response = await axios.get(`/groups/${id}`);

                this.group = response.data;
                this.qrCodeValue = `https://yourwebsite.com/group/${this.group.id}`;
            } catch (error) {
                console.error('Error fetching group:', error);
            }
        },
        donate(groupId) {
            alert(`Көмек көрсету үшін ${groupId} ID бар топ таңдалды.`);
        }
    }
};
</script>

<style>
img {
    max-height: 400px;
    object-fit: cover;
}

/* Модальды терезенің стилі */
.modal-background {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
}

</style>
