<template>
    <div class="p-3 mb-3 bg-gray-100 rounded-lg z-20 relative">
        <div class="flex justify-between items-center" v-if="user">
            <div class="user-info">
                <p class="text-lg">
                    <span class="font-semibold">Hello, {{ user.name }} 👋</span>
                    <a @click.prevent="logout" href="#" class="text-gray-600 text-sm ml-2">(Log out)</a>
                </p>
            </div>

            <div class="options">
                <SelectCurrency />
            </div>
        </div>
    </div>
</template>

<script>
import {mapState, mapActions} from 'vuex';
import SelectCurrency from './forms/select-currency.vue';

export default {
    name: 'Overview',
    components: {
        SelectCurrency,
    },
    computed: {
        ...mapState('auth', ['user']),
    },
    methods: mapActions('auth', ['logout']),
}
</script>
