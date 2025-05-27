<template>
    <Navbar></Navbar>
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8 max-w-7xl">
            <h1 class="text-3xl font-bold mb-8 text-gray-800">Благотворительный фонд</h1>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <div class="w-full lg:w-2/3">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                        <div class="relative">
                            <img
                                src="https://readdy.ai/api/search-image?query=A%20heartwarming%20scene%20showing%20diverse%20people%20receiving%20medical%20aid%20in%20a%20clean%20modern%20facility%2C%20with%20medical%20professionals%20providing%20care%2C%20soft%20natural%20lighting%2C%20minimal%20background%20with%20soft%20green%20accents%2C%20professional%20photography%20style&width=800&height=400&seq=1&orientation=landscape"
                                alt="Благотворительность"
                                class="w-full h-64 object-cover object-top"
                            />
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                                <button class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2 rounded-md cursor-pointer !rounded-button whitespace-nowrap">Пожертвовать</button>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="mb-6">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-700 font-medium">Собрано</span>
                                    <span class="text-gray-700 font-medium">60%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-emerald-500 h-2.5 rounded-full" style="width: 60%"></div>
                                </div>
                            </div>

                            <div class="mb-6 flex justify-between items-center">
                                <span class="text-sm text-gray-600">Целевая сумма</span>
                                <span class="font-bold text-gray-800">42,000 ₽</span>
                            </div>

                            <h2 class="text-2xl font-bold mb-4 text-gray-800">Пожертвования на лечение и медицинскую помощь</h2>

                            <p class="text-gray-700 mb-4">
                                Ваши пожертвования помогают обеспечить доступ к качественной медицинской помощи для тех, кто в ней нуждается больше всего. Мы работаем с больницами и медицинскими центрами по всей стране, чтобы предоставить необходимое лечение.
                            </p>

                            <p class="text-gray-700 mb-4">
                                Каждый рубль, который вы жертвуете, идет на спасение жизней. Наша команда обеспечивает прозрачность всех расходов и регулярно публикует отчеты о проделанной работе. Вместе мы можем сделать медицинскую помощь доступной для всех.
                            </p>

                            <div class="border-t border-gray-200 pt-4 mt-6">
                                <h3 class="text-lg font-semibold mb-3 text-gray-800">Как мы помогаем:</h3>
                                <ul class="list-disc pl-5 text-gray-700 space-y-2">
                                    <li>Оплата дорогостоящих операций и лечения</li>
                                    <li>Приобретение медицинского оборудования</li>
                                    <li>Поддержка семей в трудной ситуации</li>
                                    <li>Реабилитация после тяжелых заболеваний</li>
                                    <li>Обеспечение доступа к лекарствам</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">Наши достижения</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-user-md text-emerald-500 text-xl mr-3"></i>
                                    <h3 class="font-semibold text-gray-800">Медицинская помощь</h3>
                                </div>
                                <p class="text-gray-700 text-sm">Более 500 человек получили необходимое лечение благодаря вашей поддержке.</p>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-hospital text-emerald-500 text-xl mr-3"></i>
                                    <h3 class="font-semibold text-gray-800">Оборудование</h3>
                                </div>
                                <p class="text-gray-700 text-sm">Закуплено современное оборудование для 12 больниц в разных регионах.</p>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-pills text-emerald-500 text-xl mr-3"></i>
                                    <h3 class="font-semibold text-gray-800">Лекарства</h3>
                                </div>
                                <p class="text-gray-700 text-sm">Обеспечили постоянный доступ к лекарствам для 300+ пациентов с хроническими заболеваниями.</p>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-hand-holding-heart text-emerald-500 text-xl mr-3"></i>
                                    <h3 class="font-semibold text-gray-800">Поддержка</h3>
                                </div>
                                <p class="text-gray-700 text-sm">Оказали психологическую и финансовую поддержку 150 семьям в трудной ситуации.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">Наши задачи</h2>

                        <p class="text-gray-700 mb-4">
                            Мы стремимся создать систему, в которой каждый человек, независимо от своего социального статуса и финансовых возможностей, может получить необходимую медицинскую помощь. Наша цель — сделать качественное здравоохранение доступным для всех.
                        </p>

                        <p class="text-gray-700 mb-4">
                            В ближайшие годы мы планируем расширить географию нашей деятельности и увеличить количество людей, которым мы сможем помочь. Для этого нам нужна ваша поддержка.
                        </p>

                        <div class="flex justify-center mt-6">
                            <button class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-3 rounded-md font-medium cursor-pointer !rounded-button whitespace-nowrap">Стать волонтером</button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="w-full lg:w-1/3">
                    <div class="bg-green-50 rounded-lg shadow-sm p-6 mb-8">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">Категории</h2>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Образование</span>
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-1 rounded">18</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Питание</span>
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-1 rounded">12</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Медицина</span>
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-1 rounded">24</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Жилье</span>
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-1 rounded">15</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Вода</span>
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-1 rounded">9</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">Последние новости</h2>

                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <img
                                    src="https://readdy.ai/api/search-image?query=A%20charity%20event%20with%20volunteers%20helping%20children%2C%20showing%20community%20support%2C%20warm%20atmosphere%2C%20professional%20photography%20with%20soft%20lighting%2C%20minimal%20background&width=100&height=100&seq=2&orientation=squarish"
                                    alt="Благотворительное мероприятие"
                                    class="w-20 h-20 object-cover object-top rounded"
                                />
                                <div>
                                    <h3 class="font-medium text-gray-800 mb-1">Благотворительный концерт собрал 2 миллиона рублей</h3>
                                    <p class="text-sm text-gray-600">15 мая 2025</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <img
                                    src="https://readdy.ai/api/search-image?query=Medical%20equipment%20in%20a%20modern%20hospital%20setting%2C%20clean%20environment%2C%20professional%20healthcare%20technology%2C%20soft%20lighting%20with%20minimal%20background%2C%20high%20quality%20medical%20photography&width=100&height=100&seq=3&orientation=squarish"
                                    alt="Медицинское оборудование"
                                    class="w-20 h-20 object-cover object-top rounded"
                                />
                                <div>
                                    <h3 class="font-medium text-gray-800 mb-1">Новое оборудование для детской больницы</h3>
                                    <p class="text-sm text-gray-600">10 мая 2025</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <img
                                    src="https://readdy.ai/api/search-image?query=Volunteers%20distributing%20food%20packages%20to%20people%20in%20need%2C%20community%20service%2C%20humanitarian%20aid%2C%20warm%20atmosphere%20with%20soft%20lighting%2C%20professional%20documentary%20style%20photography&width=100&height=100&seq=4&orientation=squarish"
                                    alt="Волонтеры"
                                    class="w-20 h-20 object-cover object-top rounded"
                                />
                                <div>
                                    <h3 class="font-medium text-gray-800 mb-1">Почему важно помогать другим: история волонтера</h3>
                                    <p class="text-sm text-gray-600">5 мая 2025</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="#" class="text-emerald-600 hover:text-emerald-700 font-medium cursor-pointer">Все новости →</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">Популярные теги</h2>

                        <div class="flex flex-wrap gap-2">
                            <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm cursor-pointer !rounded-button whitespace-nowrap">Здоровье</span>
                            <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm cursor-pointer !rounded-button whitespace-nowrap">Дети</span>
                            <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm cursor-pointer !rounded-button whitespace-nowrap">Помощь</span>
                            <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm cursor-pointer !rounded-button whitespace-nowrap">Образование</span>
                            <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm cursor-pointer !rounded-button whitespace-nowrap">Волонтеры</span>
                            <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm cursor-pointer !rounded-button whitespace-nowrap">Лечение</span>
                            <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm cursor-pointer !rounded-button whitespace-nowrap">Благотворительность</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import Navbar from "@/components/design/Navbar.vue";

// Данные для страницы
const donationProgress = ref(60);
const donationGoal = ref(42000);
</script>

<style scoped>
.container {
    min-height: 1024px;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
