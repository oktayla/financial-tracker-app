import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from './store/auth'
import transaction from './store/transaction'
import transactionCategory from './store/transactionCategory'

export default createStore({
    plugins: [
        createPersistedState({
            paths: ['auth.user', 'transaction']
        })
    ],
    modules: {
        auth,
        transaction,
        transactionCategory,
    }
})
