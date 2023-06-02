import { createWebHistory, createRouter } from 'vue-router'
import store from '../store'

const routes = [
    {
        name: 'login',
        path: '/',
        component: () => import('../components/auth/login.vue'),
        meta: {
            middleware: 'guest',
            title: `Login`
        }
    },
    {
        name: 'app',
        path: '/app',
        component: () => import('../components/tracker.vue'),
        meta: {
            middleware: 'auth',
            title: `Tracker`
        },
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    const isAuthenticated = store.getters['auth/authenticated']
    if (to.meta.middleware === 'guest') {
        isAuthenticated ? next({ name: 'app' }) : next()
    } else {
        isAuthenticated ? next() : next({name: 'login'})
    }
})

export default router
