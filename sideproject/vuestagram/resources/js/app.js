require('./bootstrap');

// 사용할 요소 작성
import { createApp } from 'vue';
import AppComponent from '../views/components/AppComponent.vue';
import router from './router';
import store from './store/store';

createApp({
    components: {
        AppComponent,
    }
})
.use(store)
.use(router)
.mount('#app');