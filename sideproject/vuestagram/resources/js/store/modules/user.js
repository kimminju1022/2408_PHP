import axios from "../../axios";
import router from "../../router";

export default {
    namespaced: true,
    state: () => ({
        // accessToken: localStorage.getItem('accessToken') ? localStorage.getItem('accessToken') : '',
        authFlg: localStorage.getItem('accessToken') ? true : false,
        userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {},
    }),
    mutations: {
        // setAccessToken(state, accessToken){
        //     state.accessToken = accessToken;
        //     localStorage.setItem('accessToken',accessToken);
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        },
        setUserInfoBoardsCount(state) {
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', JSON.stringify(state.userInfo));
        },

    },
    actions: {
        /**인증관련
         * 로그인 처리
         * @param{*} context
         * @param{*} userInfo */
        login(context, userInfo) {
            const url = '/api/login';
            const data = JSON.stringify(userInfo);
            // const config = {
            //     headers: {
            //         'Content-Type':'application/json'
            //     }
            // }

            axios.post(url, data)
                .then(response => {
                    // console.log(response);
                    // 토큰 저장하기
                    // context.commit('setAccessToken',response.data.accessToken);
                    localStorage.setItem('accessToken', response.data.accessToken);
                    localStorage.setItem('refreshToken', response.data.refreshToken);
                    localStorage.setItem('userInfo', JSON.stringify(response.data.data));
                    context.commit('setAuthFlg', true);
                    context.commit('setUserInfo', response.data.data);

                    // 보드 리스트로 이동_로그인하고 나서 로그인 말고 보드로 가도록 경로설정
                    router.replace('/boards');
                }) //정상

                .catch(error => {
                    // console.log(error);
                    // 유효성 체크 에러
                    let errorMsgList = [];
                    const errorData = error.response.data;

                    if (error.response.status === 422) {
                        // error.response.data.ForEach((item,key)=> {
                        // 유효성 체크 에러
                        if (errorData.data.account) {
                            errorMsgList.push(errorData.data.account[0]);
                        }
                        if (errorData.data.password) {
                            errorMsgList.push(errorData.data.password[0]);
                        }
                        // errorMsgList +=error.response.data.account[0] + '\n';
                        // errorMsgList +=error.response.data.password[0];
                    } else if (error.response.status === 401) {
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
        logout(context) {
            // TODO : 백앤드 처리 추가
            const url = '/api/logout';
            const config = {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                }
            }
            axios.post(url, null, config)
                .then(response => {
                    alert('로그아웃 완료');
                    alert('게시글을 보고 싶다면 다시 로그인 해주세요');

                    console.log(response.data);
                })
                .catch(error => {
                    alert('문제가 발생하여 로그아웃 처리');
                })
                .finally(() => {
                    localStorage.clear(); //로컬 스토리지 비우기

                    //state초기화
                    context.commit('setAuthFlg', false);
                    context.commit('setUserInfo', {});

                    router.replace('/login');
                });
        },
        /**회원가입 처리
         * @param {*}   context
         * @param {*}   userInfo
         */
        registration(context, userInfo) {
            const config = {
                header: {
                    'Gontent-Type': 'multipart/form-data'
                }
            };
            const url = '/api/registration';

            // formdata setting
            const formData = new FormData();
            formData.append('account', userInfo.account);
            formData.append('password', userInfo.password);
            formData.append('password_chk', userInfo.password_chk);
            formData.append('name', userInfo.name);
            formData.append('gender', userInfo.gender);
            formData.append('profile', userInfo.profile);

            axios.post(url, formData, config)
                .then(response => {
                    alert('회원가입 성공\n가입하신 계정으로 로그인 해주세요');
                    router.replace('/login');
                })
                .catch(error => {
                    alert('회원가입 실패\n정보를 다시 확인해 주세요');
                })
        },
        /**토큰 만료 확인 후 처리 속행
         * @param {*}   context
         * @param {function} callbackProccess         */
        chkTokenAndContinueProcess(context, callbackProccess){
            // 액세스 토큰의 현재시간과 유효시간 검증 후 유저가 요청한 사항의 처리를 속행한다
            // payload획득 => payload는 1번방이고 base64로 인코딩 되어 있어 디코딩해야함
            const payload = localStorage.getItem('accessToken').split('.')[1];
            const base64 = payload.replace(/-/g,'+').replace(/_/g,'/');
            const objPayload = JSON.parse(window.atob(base64));

            const now = new Date();

            if((objPayload.exp*1000) > now.getTime()){
                console.log('토큰유효');
                callbackProccess();
            }else{
                console.log('토큰만료');
                context.dispatch('reissueAccessToken', callbackProccess);
            }
        },
        /**토큰재발급 처리
         * @param {*}           context
         * @param {callback}    callbackProccess
         */
        reissueAccessToken(context, callbackProccess){
            console.log('토큰 재발급 처리');
            // callbackProccess();
            const url = '/api/reissue';
            // 리프레시토큰 발행
            const config = {
                headers:  {
                    'Authorization': 'Bearer ' + localStorage.getItem('refreshToken')
                }
            };
            axios.post(url,null,config)
            .then(response => {
                // 토큰셋팅
                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                
                // 후속처리 진행

                callbackProccess();
            })
            .catch(error => {
                console.error(error);
            });
        },
    },
    getters: {

    }
}
