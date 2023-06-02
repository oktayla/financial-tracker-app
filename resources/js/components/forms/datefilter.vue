<template>
    <VueDatePicker v-model="date" range fixed-end auto-range="5" @update:model-value="handleDate" />
</template>

<script>
import { ref } from 'vue';
import moment from 'moment';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import {mapActions} from 'vuex';

export default {
    components: { VueDatePicker },
    methods: {
        ...mapActions('transaction', ['filterTransactions']),
        handleDate(date) {
            const startDate = moment(date[0]).format('YYYY-MM-DD');
            const endDate = moment(date[1]).format('YYYY-MM-DD');

            this.filterTransactions({
                start_date: startDate,
                end_date: endDate
            })
        }
    },
    setup() {
        const date = ref([]);

        const startDate = new Date();
        const endDate = new Date(new Date().setDate(startDate.getDate() - 5));
        date.value = [startDate, endDate];

        return {
            date,
        }
    }
};
</script>
