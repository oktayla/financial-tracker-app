<template>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">💰 Income</h2>
        <form @submit.prevent="addIncome">
            <div class="mb-4">
                <label for="income-category" class="text-gray-700">Category</label>
                <select v-model="category" id="income-category" class="w-full border-2 border-gray-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select a category</option>
                    <option :value="category.id" v-for="category in incomeTransactionCategories" :key="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>
            <div class="mb-4">
                <label for="income-amount" class="text-gray-700">Amount</label>
                <input id="income-amount" v-model="amount" type="text" class="w-full border-2 border-gray-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-md shadow-md px-4 py-2 text-white font-semibold">Add Income</button>
        </form>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';

export default {
    data() {
        return {
            category: '',
            amount: '',
        }
    },
    computed: {
        ...mapGetters('transactionCategory', [
            'incomeTransactionCategories',
        ])
    },
    methods: {
        ...mapActions('transactionCategory', ['getTransactionCategories']),
        ...mapActions('transaction', ['createTransaction']),
        addIncome() {
            this.createTransaction({
                category_id: this.category,
                amount: this.amount,
                type: 'income',
            });
        }
    },
    created() {
        this.getTransactionCategories()
    }
}
</script>
