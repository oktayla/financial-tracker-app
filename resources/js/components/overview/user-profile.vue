<template>
    <div class="user-info">
        <p class="text-lg">
            <span class="font-semibold">Hello, {{ user.name }} 👋</span>
            <a @click.prevent="logout" href="#" class="block text-gray-600 text-sm">(Log out)</a>
        </p>
    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';

export default {
    name: 'UserProfile',
    computed: {
        ...mapState('auth', ['user']),
    },
    methods: mapActions('auth', ['logout']),
}
</script>
