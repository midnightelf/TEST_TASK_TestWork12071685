import {createApp} from 'vue'
import App from './App.vue'

import router from './router'
import store from './store'

import axios from 'axios'
import './index.css'

axios.defaults.baseURL = 'http://test120backend.localhost/api/'
axios.defaults.headers.common = {
    'Accept': 'application/json'
}

createApp(App).use(store).use(router).mount('#app')
