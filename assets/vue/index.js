import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store/vuexStore.js'

new Vue({
    template: '<App/>',
    components: { App },
    store: store,
    router,
}).$mount('#app')
