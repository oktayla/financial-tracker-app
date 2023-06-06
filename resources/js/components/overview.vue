<template>
    <div class="p-3 mb-3 bg-white rounded-lg z-20 relative">
        <div class="flex justify-between items-center pb-3 border-b" v-if="authenticated">
            <UserProfile />

            <div class="options">
                <SelectCurrency />
            </div>
        </div>

        <SimpleStats />
        <DailyStats />
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import SelectCurrency from './forms/select-currency.vue';
import UserProfile from "./overview/user-profile.vue";
import DailyStats from './overview/daily-stats.vue';
import SimpleStats from './overview/simple-stats.vue';

export default {
    name: 'Overview',
    components: {
        DailyStats,
        UserProfile,
        SimpleStats,
        SelectCurrency,
    },
    computed: mapGetters('auth', ['authenticated']),
}
</script>
