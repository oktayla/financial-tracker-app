<template>
    <div class="z-10 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Income section -->
            <IncomeForm />

            <!-- Expense section -->
            <ExpenseForm />
        </div>

        <!-- Transactions list -->
        <Transactions />
    </div>
</template>

<script>
import IncomeForm from '../components/forms/income.vue';
import ExpenseForm from '../components/forms/expense.vue';
import Transactions from '../components/transactions.vue';

export default {
    components: {
        IncomeForm,
        ExpenseForm,
        Transactions,
    }
}
</script>
