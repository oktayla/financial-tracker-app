<template>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">💸 Expense</h2>
        <form @submit.prevent="addExpense">
            <div class="mb-4">
                <label for="expense-category" class="text-gray-700">Category</label>
                <select v-model="category" id="expense-category" class="w-full border-2 border-gray-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select a category</option>
                    <option :value="category.id" v-for="category in expenseTransactionCategories" :key="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>
            <div class="mb-4">
                <label for="expense-amount" class="text-gray-700">Amount</label>
                <input id="expense-amount" v-model="amount" type="text" class="w-full border-2 border-gray-400 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button class="bg-gradient-to-r from-pink-500 to-red-500 rounded-md shadow-md px-4 py-2 text-white font-semibold">Add Expense</button>
        </form>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
    data() {
        return {
            category: '',
            amount: ''
        }
    },
    computed: {
        ...mapGetters('transactionCategory', [
            'expenseTransactionCategories'
        ])
    },
    methods: {
        ...mapActions('transactionCategory', ['getTransactionCategories']),
        ...mapActions('transaction', ['createTransaction']),
        addExpense() {
            this.createTransaction({
                category_id: this.category,
                amount: this.amount,
                type: 'expense',
            });
        }
    },
    created() {
        this.getTransactionCategories()
    }
};
</script>
