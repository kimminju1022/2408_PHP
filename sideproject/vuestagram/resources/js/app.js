require('./bootstrap');

// 사용할 요소 작성
import { createApp } from 'vue';
import AppComponent from '../views/components/AppComponent.vue';
import router from './router';

createApp({
    components: {
        AppComponent,
    }
})
.use(router)
.mount('#app');