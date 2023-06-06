export default {
    namespaced: true,
    state () {
        return {
            currencies: [],
            selectedCurrency: null,
        }
    },
    mutations: {
        setCurrencies (state, currencies) {
            state.currencies = currencies
        },
        setSelectedCurrency (state, currency) {
            state.selectedCurrency = currency
        },
        setDefaultCurrency (state) {
            state.selectedCurrency = state.currencies.find(currency => currency.code === 'USD')
        }
    },
    actions: {
        async getCurrencies ({ commit }) {
            await axios.get('/api/currencies')
                .then(response => {
                    commit('setCurrencies', response.data.result)
                    commit('setDefaultCurrency')
                })
                .catch(error => {
                    console.log(error)
                })
        },
        updateCurrency ({ commit }, currency) {
            commit('setSelectedCurrency', currency)
        }
    },
    getters: {
        currencies (state) {
            return state.currencies
        }
    }
}
