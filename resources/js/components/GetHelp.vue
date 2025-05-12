<template>
    <div class="flex justify-center min-h-screen bg-gray-100">
        <div class="w-72 mt-10">
            <label for="price" class="block text-sm font-medium text-gray-900">Имя</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text" name="name" id="name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" placeholder="Имя">
                </div>
            </div>
            <label for="price" class="block text-sm font-medium text-gray-900">Фамилия</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text" name="surname" id="surname" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" placeholder="Фамилия">
                </div>
            </div>
            <label for="price" class="block text-sm font-medium text-gray-900">Номер телефона</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="number" name="number" id="number" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" placeholder="+7 ">
                </div>
            </div>
            <label for="price" class="block text-sm font-medium text-gray-900">Электронные почта</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="email" name="email" id="email" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" placeholder="email">
                </div>
            </div>
            <label for="price" class="block text-sm font-medium text-gray-900">Инфомация по документом</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="file" name="file" id="file" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" placeholder="Информация действительно вам нужен помощь">
                </div>
            </div>
            <label for="price" class="block text-sm font-medium text-gray-900">Информация о себе</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <textarea name="info" id="info" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" placeholder="Информация о себе">

                    </textarea>
                </div>
            </div>
            <button disabled></button>
        </div>
    </div>
</template>

<script>
export default {
    name: "GetHelp"
}
</script>
<style>

</style>
