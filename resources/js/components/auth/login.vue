<template>
    <div class="flex items-center justify-center relative z-10">
        <div class="bg-white rounded-lg shadow-lg p-8 w-10/12 md:w-2/5">
            <h1 class="text-2xl font-semibold text-center mb-6">Login to Your Account 🔐</h1>
            <form @submit.prevent="doLogin">
                <p class="py-2 px-3 bg-red-100 text-red-500 rounded-md mb-3" v-if="error">{{ error }}</p>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input id="email" type="email"
                           v-model="email"
                           class="w-full border border-gray-300 shadow text-lg rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Enter your email address"
                           autocomplete="off"
                           required
                    >
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input id="password" type="password"
                           v-model="password"
                           class="w-full border border-gray-300 shadow text-lg rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Enter your password"
                           required>
                </div>
                <button type="submit" class="bg-teal-500 text-white text-lg px-4 py-2 rounded-md w-full hover:bg-teal-600">Login</button>
            </form>
            <p class="text-gray-600 text-sm mt-4 text-center">Don't have an account? <a href="#" class="text-blue-500">Sign up</a></p>
        </div>
    </div>
</template>


<script>
import { mapActions, mapGetters } from 'vuex'
export default {
    name: 'Login',
    data() {
        return {
            email: '',
            password: '',
        }
    },
    computed: {
        ...mapGetters('auth', ['error']),
    },
    methods: {
        ...mapActions('auth', ['login']),
        doLogin() {
            this.login({
                email: this.email,
                password: this.password,
            })
        }
    },
}
</script>
