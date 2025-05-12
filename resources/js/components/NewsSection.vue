<template>
    <section class="py-16 px-4 md:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-bold">{{ $t('news') }}</h2>
                <div class="flex gap-2 items-center">
                    <!-- Кнопка добавления новостей -->
                    <button
                        @click="openModal"
                        class="bg-green-500 hover:bg-green-600 text-white font-medium rounded-md px-4 py-2 flex items-center gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        {{ $t('add_news') }}
                    </button>
                    <button @click="back()" class="bg-green-50 hover:bg-green-100 rounded-full p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="front()" class="bg-green-50 hover:bg-green-100 rounded-full p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- News Items -->
                <div
                    v-for="newsItem in news"
                    :key="newsItem.id"
                    class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100 transition-transform duration-300 transform hover:-translate-y-2 hover:shadow-lg news-card"
                >
                    <div class="h-56 bg-gray-200 relative">
                        <img
                            v-if="newsItem.image_url"
                            :src="newsItem.image_url"
                            :alt="newsItem.title"
                            class="w-full h-full object-cover"
                        />
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-8 text-gray-500 text-sm mb-3">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zm-4 7a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ newsItem.author }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ formatDate(newsItem.created_at) }}</span>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold mb-3">{{ newsItem.title }}</h3>
                        <p class="text-gray-600 mb-4">
                            {{ truncateText(newsItem.content, 120) }}
                        </p>

                        <div class="flex justify-items-end gap-4 mt-4">
                            <!-- Read More button -->
                            <button
                                @click="readMore(newsItem)"
                                class="border border-green-500 text-green-500 bg-white hover:bg-green-500 hover:text-white px-6 py-2 rounded transition-colors duration-200"
                            >
                                {{ $t('read_more') }}
                            </button>

                            <!-- Delete button -->
                            <button
                                @click="deleteNews(newsItem.id)"
                                class="border border-red-500 text-red-500 bg-white hover:bg-red-500 hover:text-white p-2 rounded-full transition-colors duration-200"
                                title="Удалить"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- Модальное окно добавления новости -->
        <div v-if="showModal"
             class="fixed inset-0 backdrop-blur-sm bg-transparent flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-screen overflow-y-auto">
                <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                    <h3 class="text-xl font-bold">{{ $t('add_news') }}</h3>
                    <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <form @submit.prevent="submitNews" class="p-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            {{ $t('title') }}
                        </label>
                        <input
                            v-model="form.title"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="title"
                            type="text"
                            required
                        >
                        <p v-if="errors.title" class="text-red-500 text-xs mt-1">{{ errors.title[0] }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="author">
                            {{ $t('author') }}
                        </label>
                        <input
                            v-model="form.author"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="author"
                            type="text"
                            required
                        >
                        <p v-if="errors.author" class="text-red-500 text-xs mt-1">{{ errors.author[0] }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                            {{ $t('content') }}
                        </label>
                        <textarea
                            v-model="form.content"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="content"
                            rows="6"
                            required
                        ></textarea>
                        <p v-if="errors.content" class="text-red-500 text-xs mt-1">{{ errors.content[0] }}</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                            {{ $t('image') }}
                        </label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                            <input
                                @change="handleImageUpload"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                type="file"
                                id="image"
                                accept="image/*"
                            >
                            <div v-if="!form.image" class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-sm text-gray-600">{{ $t('drag_and_drop') }}</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF до 5MB</p>
                            </div>
                            <div v-else class="text-center">
                                <img
                                    :src="previewImage"
                                    class="mx-auto h-32 object-cover rounded"
                                    :alt="form.title"
                                >
                                <p class="mt-2 text-sm text-gray-600">{{ form.image.name }}</p>
                            </div>
                        </div>
                        <p v-if="errors.image" class="text-red-500 text-xs mt-1">{{ errors.image[0] }}</p>
                    </div>

                    <div class="flex items-center justify-end space-x-4">
                        <button
                            type="button"
                            @click="closeModal"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded"
                        >
                            {{ $t('cancel') }}
                        </button>
                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded"
                            :disabled="loading"
                        >
              <span v-if="loading" class="flex items-center">
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                {{ $t('saving') }}
              </span>
                            <span v-else>{{ $t('save') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div v-if="selectedNews"  class="fixed inset-0 backdrop-blur-sm bg-transparent flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg max-w-2xl w-full p-6 relative">
                <button @click="selectedNews = null" class="absolute top-2 right-2 text-gray-600 hover:text-red-500">
                    &times;
                </button>

                <h2 class="text-2xl font-bold mb-4">{{ selectedNews.title }}</h2>
                <p class="text-sm text-gray-500 mb-2">{{ formatDate(selectedNews.created_at) }} | {{ selectedNews.author }}</p>

                <img v-if="selectedNews.image_url" :src="selectedNews.image_url" alt="" class="w-full h-64 object-cover rounded mb-4">

                <p class="text-gray-700 leading-relaxed">{{ selectedNews.content }}</p>
            </div>
        </div>

    </section>
</template>

<script>
import axios from 'axios';

export default {
    name: 'NewsSection',
    data() {
        return {
            news: [],
            showModal: false,
            loading: false,
            previewImage: null,
            selectedNews: null,
            currentPage: 1,
            lastPage: 1,
            form: {
                title: '',
                author: '',
                content: '',
                image: null
            },
            errors: {}
        };
    },
    created() {
        this.fetchNews();
    },
    methods: {
        readMore(newsItem) {
            this.selectedNews = newsItem;
        },
        deleteNews(id) {
            if (confirm('Вы уверены, что хотите удалить эту новость?')) {
                axios.delete(`/api/news/${id}`)
                    .then(response => {
                        this.news = this.news.filter(n => n.id !== id);
                        alert(response.data.message); // Можно заменить на красивый toast
                    })
                    .catch(error => {
                        console.error('Ошибка при удалении новости:', error);
                        alert('Произошла ошибка при удалении новости.');
                    });
            }
        },
        fetchNews(page = 1) {
            axios.get(`/api/news?page=${page}`)
                .then(response => {
                    this.news = response.data.data;
                    this.currentPage = page;
                    // Доступ к meta, если вернули с помощью ResourceCollection
                    if (response.data.meta) {
                        this.lastPage = response.data.meta.last_page;
                    }
                })
                .catch(error => {
                    console.error('Error fetching news:', error);
                });
        },
        openModal() {
            this.showModal = true;
            this.resetForm();
        },
        closeModal() {
            this.showModal = false;
            this.resetForm();
        },
        resetForm() {
            this.form = {
                title: '',
                author: '',
                content: '',
                image: null
            };
            this.previewImage = null;
            this.errors = {};
        },
        back() {
            if (this.currentPage > 1) {
                this.fetchNews(this.currentPage - 1);
            }
        },
        front() {
            if (this.currentPage < this.lastPage) {
                this.fetchNews(this.currentPage + 1);
            }
        },
        handleImageUpload(event) {
            const file = event.target.files[0];
            if (!file) return;

            // Проверка типа файла
            if (!file.type.match('image.*')) {
                alert(this.$t('image_format_error'));
                return;
            }

            // Проверка размера файла (5MB)
            if (file.size > 25 * 1024 * 1024) {
                alert(this.$t('image_size_error'));
                return;
            }

            this.form.image = file;

            // Создаем превью
            const reader = new FileReader();
            reader.onload = e => {
                this.previewImage = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        submitNews() {
            this.loading = true;
            this.errors = {};

            const formData = new FormData();
            formData.append('title', this.form.title);
            formData.append('author', this.form.author);
            formData.append('content', this.form.content);

            if (this.form.image) {
                formData.append('image', this.form.image);
            }

            axios.post('/api/news', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.loading = false;
                    this.closeModal();
                    this.fetchNews(); // Обновляем список новостей

                    // Показываем уведомление об успехе
                    // Здесь можно добавить ваш код для отображения уведомлений
                    alert(this.$t('news_added_success'));
                })
                .catch(error => {
                    this.loading = false;
                    if (error.response && error.response.data && error.response.data.errors) {
                        this.errors = error.response.data.errors;
                    } else {
                        console.error('Error adding news:', error);
                        alert(this.$t('news_added_error'));
                    }
                });
        },
        truncateText(text, length) {
            if (!text) return '';
            return text.length > length ? text.substring(0, length) + '...' : text;
        },
        formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toLocaleDateString(this.$i18n.locale, {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });
        }
    }
};
</script>
