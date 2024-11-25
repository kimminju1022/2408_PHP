import axios from "axios";
import router from "../../router";

export default {
    namespaced: true,
    state: () => ({
        // accessToken: localStorage.getItem('accessToken') ? localStorage.getItem('accessToken') : '',
        authFlg: localStorage.getItem('accessToken') ? true : false,
        userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {},
    }),
    mutations :{
        // setAccessToken(state, accessToken){
        //     state.accessToken = accessToken;
        //     localStorage.setItem('accessToken',accessToken);
        setAuthFlg(state, flg){
            state.authFlg = flg;
        },
        setUserInfo(state, userInfo){
            state.userInfo = userInfo;
        },
    },
    actions:{
        /**인증관련
         * 로그인 처리
         * @param{*} context
         * @param{*} userInfo */
        login(context, userInfo) {
            const url = '/api/login';
            const data = JSON.stringify(userInfo);
            const config = {
                headers: {
                    'Content-Type':'application/json'
                }
            }

            axios.post(url, data,config)
            .then(response =>{
                // console.log(response);
                // 토큰 저장하기
                // context.commit('setAccessToken',response.data.accessToken);
                localStorage.setItem('accessToken',response.data.accessToken);
                localStorage.setItem('refreshToken',response.data.refreshToken);
                localStorage.setItem('userInfo',JSON.stringify(response.data.data));
                context.commit('setAuthFlg',true);
                context.commit('setuserInfo',response.data.data);
                
                // 보드 리스트로 이동_로그인하고 나서 로그인 말고 보드로 가도록 경로설정
                router.replace('/board');
            }) //정상

            .catch(error =>{
                // console.log(error);
                // 유효성 체크 에러
                let errorMsgList = [];
                const errorData =  error.response.data;

                if(error.response.status === 422){
                    // error.response.data.ForEach((item,key)=> {
                        // 유효성 체크 에러
                        if(errorData.data.account){
                            errorMsgList.push(errorData.data.account[0]);
                        }
                        if(errorData.data.password){
                            errorMsgList.push(errorData.data.password[0]);
                        }
                        // errorMsgList +=error.response.data.account[0] + '\n';
                        // errorMsgList +=error.response.data.password[0];
                    } else if(error.response.status === 401){
                        errorMsgList.push(errorData.msg);
                    } else {
                        errorMsgList.push('예기치 못한 오류 발생')
                    }
                alert(errorMsgList.join('\n'));
                
            }); //에러
        },
        /**로그아웃 처리
         * @param  {*}context
         */
        logout(context){
            // TODO : 백앤드 처리 추가
            localStorage.clear(); //로컬 스토리지 비우기

            //state초기화
            context.commit('setAuthFlg', false);
            context.commit('se션ㄷ갸ㅜ래',{});
            
            router.replace('/login');
        },

    },
    getters:{

    }
}
