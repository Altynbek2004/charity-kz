<template>
    <div class="flex h-screen bg-gray-100">
        <!-- Сол жақ панель -->
        <aside class="w-1/4 bg-white border-r border-gray-200 p-4 overflow-y-auto">
            <h2 class="text-lg font-semibold mb-4">Users</h2>
            <ul>
                <li
                    v-for="user in usersAll"
                    :key="user.id"
                    @click="selectUser(user)"
                    class="cursor-pointer mb-2 p-2 rounded hover:bg-gray-100"
                    :class="selectedUser?.id === user.id ? 'bg-gray-200 font-medium' : ''"
                >
                    <div>{{ user.name }}</div>
                    <div class="text-sm text-gray-500">{{ user.email }}</div>
                </li>
            </ul>
        </aside>

        <!-- Чат -->
        <main class="flex-1 flex flex-col">
            <div class="bg-white border-b border-gray-200 p-4">
                <div class="text-lg font-semibold">{{ selectedUser?.name || 'Select a user' }}</div>
                <div class="text-sm text-gray-500">{{ selectedUser?.email }}</div>
            </div>

            <div class="flex-1 p-4 overflow-y-auto bg-gray-50">
                <div v-for="(msg, index) in messages" :key="index" class="mb-2">
                    <div
                        :class="[
              'inline-block px-4 py-2 rounded-full text-white text-sm',
              msg.sender === 'me' ? 'bg-blue-500 self-end ml-auto' : 'bg-gray-400'
            ]"
                    >
                        {{ msg.message }}
                    </div>
                </div>
            </div>

            <div class="bg-white border-t border-gray-200 p-4 flex items-center">
                <input
                    v-model="newMessage"
                    @keyup.enter="sendMessage"
                    type="text"
                    placeholder="Type your message..."
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 mr-2 outline-none focus:ring-2 focus:ring-blue-300"
                />
                <button
                    @click="sendMessage"
                    class="bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-600"
                >
                    Send
                </button>
            </div>
        </main>
    </div>
</template>

<script>

import axios from "axios";

export default {
    props: {
        users: {
            type: Array,
            required: true
        },
    },
    data() {
        return {
            selectedUserCopy: this.selectedUser,
            messages: [],
            newMessage: '',
            usersAll :'',
            selectedUser :'',

        }
    },
    watch: {
        selectedUser(newVal) {
            this.selectedUserCopy = newVal
            this.messagesAll();
        }
    },
    created() {
        this.usersAl();
    },
    methods: {
        selectUser(user) {
            this.selectedUserCopy = user
            this.selectedUser = user
        },

        sendMessage() {
            if (!this.newMessage.trim()) return
            this.messages.push({ text: this.newMessage, sender: 'me' })
            this.newMessage = ''
        },

        messagesAll()
        {
            let friendID =this.selectedUser?.id;
            console.log(friendID)
            axios.get(`/message/${friendID}`).then((response)=>{
                this.messages=response.data;
            });
        },

        usersAl()
        {
            axios.get(`/users-all`)
                .then(response => {
                    this.usersAll = response.data;
                })
                .catch(error => {
                    console.error('Error fetching news:', error);
                });

        }
    },
    computed: {
        selectedUserDisplay() {
            return this.selectedUserCopy
        }
    },


}
</script>
