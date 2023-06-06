<template>
    <div class="simple-stats border-b py-4 grid grid-cols-3 gap-4">
        <div class="balance h-24 rounded-lg border-b-2 border-sky-600 p-3 bg-sky-100">
            <p class="text-gray-600 text-sm">Total Balance</p>
            <p class="text-2xl font-semibold">{{ formatCurrency(user.overview.total_balance, selectedCurrency.code) }}</p>
        </div>
        <div class="total_income h-24 rounded-lg border-b-2 border-green-500 p-3 bg-green-100">
            <p class="text-gray-600 text-sm">Total Income</p>
            <p class="text-2xl font-semibold">{{ formatCurrency(user.overview.total_income, selectedCurrency.code) }}</p>
        </div>
        <div class="total_expense h-24 rounded-lg border-b-2 border-red-500 p-3 bg-red-100">
            <p class="text-gray-600 text-sm">Total Expense</p>
            <p class="text-2xl font-semibold">{{ formatCurrency(user.overview.total_expense, selectedCurrency.code) }}</p>
        </div>
    </div>
</template>

<script>
import {mapState} from 'vuex';

export default {
name: 'DailyStats',
    computed: {
        ...mapState('auth', ['user']),
        ...mapState('currency', ['selectedCurrency']),
    },
    methods: {
        formatCurrency(amount, currency = 'USD') {
            return new Intl.NumberFormat('en-us', {
                style: 'currency',
                currency: currency,
                minimumFractionDigits: 2
            }).format(amount);
        }
    },
}
</script>
