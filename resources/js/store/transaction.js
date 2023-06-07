import {useToast} from 'vue-toast-notification';

const toast = useToast();

export default {
    namespaced: true,
    state () {
        return {
            transactions: [],
            is_loading: false,
        }
    },
    mutations: {
        setTransactions (state, transactions) {
            state.transactions = transactions
        },
        addTransaction (state, transaction) {
            state.transactions.unshift(transaction)
        },
        setLoading (state, loading) {
            state.is_loading = loading
        }
    },
    actions: {
        async fetchTransactions ({ commit }) {
            commit('setTransactions', [])
            commit('setLoading', true)

            const currencyCode = this.state.currency.selectedCurrency?.code ?? 'USD'
            const response = await axios.get('/api/transactions?currency=' + currencyCode)
            const transactions = response.data

            commit('setTransactions', transactions)
            commit('setLoading', false)
        },
        async createTransaction ({ commit }, transaction) {
            const currencyCode = this.state.currency.selectedCurrency?.code ?? 'USD'
            const response = await axios.post('/api/transactions?currency=' + currencyCode, transaction)
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
        },
        async filterTransactions ({ commit }, data) {
            commit('setLoading', true)
            commit('setTransactions', [])

            data['currency'] = this.state.currency.selectedCurrency?.code ?? 'USD'
            const response = await axios.get('/api/filter-transactions', {params: data})
            const transactions = response.data.result

            commit('setTransactions', transactions)
            commit('setLoading', false)
        }
    },
}
