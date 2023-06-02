<template>
    <div class="mt-8 relative z-10">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold mb-4 text-white">📝 Transactions</h2>
            <div class="datepicker">
                <DateFilter />
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <Loading />
            <ul>
                <li class="flex justify-between items-center py-2 border-b"
                    v-for="transaction in transactions" :key="transaction.id">
                    <span class="text-gray-700">{{ transaction.category.name }}</span>
                    <span class="font-semibold text-green-500" v-if="transaction.type === 'income'">+{{ formatCurrency(transaction.amount) }}</span>
                    <span class="font-semibold text-red-500" v-if="transaction.type === 'expense'">-{{ formatCurrency(transaction.amount) }}</span>
                </li>

                <li class="flex justify-between items-center">
                    <span v-if="!is_loading && transactions.length === 0">
                        No transactions yet.
                    </span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';
import DateFilter from './forms/datefilter.vue';
import Loading from './loading.vue';

export default {
    components: {
        DateFilter,
        Loading,
    },
    computed: mapState('transaction', [
        'transactions',
        'is_loading'
    ]),
    methods: {
        ...mapActions('transaction', ['fetchTransactions']),
        formatCurrency(amount) {
            return new Intl.NumberFormat('en-us', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 2
            }).format(amount);
        }
    },
    created() {
        this.fetchTransactions();
    }
}
</script>
