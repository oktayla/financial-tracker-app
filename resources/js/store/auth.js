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
