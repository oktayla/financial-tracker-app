export default {
    namespaced: true,
    state () {
        return {
            transactionCategories: [],
        }
    },
    mutations: {
        setTransactionCategories (state, transactionCategories) {
            state.transactionCategories = transactionCategories
        }
    },
    actions: {
        async getTransactionCategories ({ commit }) {
            const response = await axios.get('/api/transaction-categories')
            commit('setTransactionCategories', response.data)
        }
    },
    getters: {
        incomeTransactionCategories (state) {
            return state.transactionCategories.filter(transactionCategory => transactionCategory.type === 'income')
        },
        expenseTransactionCategories (state) {
            return state.transactionCategories.filter(transactionCategory => transactionCategory.type === 'expense')
        }
    }
}
