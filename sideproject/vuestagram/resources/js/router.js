import { createWebHistory, createRouter } from "vue-router";
import LoginComponent from "../views/components/auth/LoginComponent.vue";
import BoardListComponent from "../views/components/board/BoardListComponent.vue";
import BoardCreateComponent from "../views/components/board/BoardCreateComponent.vue";
import UserRegistrationComponent from "../views/components/user/UserRegistrationComponent.vue";
import { useStore }from 'vuex';
import NotFoundComponent from "../views/components/NotFoundComponent.vue"; 

// 라우터를 로그인 페이지로 보드 이동할 경우 본 라우터가 실행 및 이동이 될텐데 이걸 실행하기 전에 저장되고 생성될건데 to 이동할 경로의 정보를 생성 / from 내가 오기전에 정보가 담김 / next 라우트에 도달한 후의 객체의 정보를 후속처리

const chkAuth = (to,from,next) => {
// 스토어가져오기
const store = useStore();
const authflg = store.state.user.authFlg; //로그인 여부 플래그
const noAuthPassflg = (to.path === '/' || to.path === '/login' || to.path ==='/registration');//비로그인 시 접근 가능 페이지 플래그

    if(authflg && noAuthPassflg) {
        // 둘 다 사실이면 보드로 이동[인증된 유저가비인증으로 이동할 수 있는 페이지에 접근할 경우 board로 이동]
        next('/boards');
    } else if(!authflg && !noAuthPassflg){
        // 인증이 안된 유저가 비인증으로 접근할 수 없는 페이지에 접근할 경우 로그인으로 이동
        next('/login');
    }else{
        // 그 외 접근 허용
        next(); 
    }
}

const routes = [
    {
        path: '/',
        redirect: '/login',
        beforeEnter: chkAuth,
            
    },
    {
        path: '/login',
        component: LoginComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards',
        component: BoardListComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards/create',
        component: BoardCreateComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/registration',
        component: UserRegistrationComponent,
        beforeEnter: chkAuth,
    },
    {
        path:'/:catchAll(.*)',
        component: NotFoundComponent,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;