<template>
    <div class="container mx-auto py-8 blurry-bg">
        <Header />

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
    </div>
</template>

<script>
import Header from './components/header.vue';
import IncomeForm from "./components/forms/income.vue";
import ExpenseForm from "./components/forms/expense.vue";
import Transactions from "./components/transactions.vue";

export default {
    components: {
        Header,
        IncomeForm,
        ExpenseForm,
        Transactions,
    }
}
</script>
