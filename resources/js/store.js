import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from './store/auth'
import currency from './store/currency'
import transaction from './store/transaction'
import transactionCategory from './store/transactionCategory'

export default createStore({
    plugins: [
        createPersistedState({
            paths: ['auth.user', 'currency', 'transaction']
        })
    ],
    modules: {
        auth,
        currency,
        transaction,
        transactionCategory,
    }
})
