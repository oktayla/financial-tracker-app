import './bootstrap'

import 'vue-toast-notification/dist/theme-sugar.css';

import { createApp } from 'vue'
import store from './store'
import router from './router';

import App from './app.vue'

const app = createApp(App)

app.use(store)
app.use(router)

app.mount('#app')
