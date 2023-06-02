import {useToast} from 'vue-toast-notification';

const toast = useToast();

export default {
    namespaced: true,
    state () {
        return {
            transactions: [],
        }
    },
    mutations: {
        setTransactions (state, transactions) {
            state.transactions = transactions
        },
        addTransaction (state, transaction) {
            state.transactions.unshift(transaction)
        }
    },
    actions: {
        async fetchTransactions ({ commit }) {
            const response = await axios.get('/api/transactions')
            const transactions = response.data
            commit('setTransactions', transactions)
        },
        async createTransaction ({ commit }, transaction) {
            const response = await axios.post('/api/transactions', transaction)
            commit('addTransaction', response.data)

            let successMessage;
            if (transaction.type === 'income') {
                successMessage = 'Income created successfully';
            } else {
                successMessage = 'Expense created successfully';
            }

            toast.success(successMessage, {
                position: 'top'
            });
        }
    },
}
