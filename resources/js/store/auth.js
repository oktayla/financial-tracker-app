import router from '../router';

export default {
    namespaced: true,
    state () {
        return {
            user: null,
            error: null,
        }
    },
    mutations: {
        setUser (state, user) {
            state.user = user
        },
        setError (state, error) {
            state.error = error
        }
    },
    actions: {
        async getMe({ commit }) {
            const currencyCode = this.state.currency.selectedCurrency?.code ?? 'USD'
            await axios.get('/api/me?currency=' + currencyCode)
                .then(response => {
                    commit('setUser', response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async login ({ commit }, credentials) {
            commit('setError', null)
            await axios.get('/sanctum/csrf-cookie')
            axios.post('/api/login', credentials)
                .then(response => {
                    commit('setUser', response.data.result)
                    router.push({ name: 'app' })
                })
                .catch(error => {
                    commit('setError', error.response.data.message)
                })
        },
        async logout ({ commit }) {
            await axios.post('/api/logout')
            commit('setUser', null)
            await router.push({name: 'login'})
        }
    },
    getters: {
        authenticated (state) {
            return state.user !== null
        },
        user (state) {
            return state.user
        },
        error (state) {
            return state.error
        }
    }
}
