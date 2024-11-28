import axios from "../../axios";
import router from "../../router";

export default {
    namespaced: true,
    state: () => ({
        // 저장영역
        boardList: [],
        page: 0,
        boardDetail: null,
        controllFlg: true,
        lastPageFlg: false,
    }),
    mutations: {
        // 넘어온 파라미터를 기존 데이터에 연결
        setBoardList(state, boardList) {
            state.boardList = state.boardList.concat(boardList);
        },
        setPage(state, page) {
            state.page = page;
        },
        setBoardDetail(state, board) {
            state.boardDetail = board;
        },
        setBoardListUnshift(state, board) {
            state.boardList.unshift(board);
        },
        setControllFlg(state, flg) {
            state.controllFlg = flg;
        },
        setLastPageFlg(state, flg) {
            state.lastPageFlg = flg;
        },
    },
    actions: {
        /** 게시글 획득
        * @param{*} context
        * get getter  / bpardlist pagination
        *      */
        boardListPagenation(context) {
            context.dispatch('user/chkTokenAndContinueProcess'
                , () => {
                    //디바운싱 처리 시작
                    if (context.state.controllFlg && !context.state.lastPageFlg) {
                        context.commit('setControllFlg', false);
                        // const url = '/api/boards?page='+ context.state.page;
                        const url = '/api/boards?page=' + context.getters['getNextPage'];
                        const config = {
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                            }
                        }
                        axios.get(url, config)
                            .then(response => {
                                // console.log('보드리스트획득', response.data.boardList);
                                context.commit('setBoardList', response.data.boardList.data);
                                context.commit('setPage', response.data.boardList.current_page);
                                // 더 이상 불러올 데이터 없을 시,  불필요한 요청 안보내기 위한 처리
                                if (response.data.boardList.current_page >= response.data.boardList.last_page) {
                                    // 마지막 페이지일 경우 플래그 true
                                    context.commit('setLastPageFlg', true);
                                }
                            })
                            .catch(error => {
                                console.log(error);
                            })
                            .finally(() => {
                                context.commit('setControllFlg', true);
                            });
                    }
                }
                , { root: true });

        },
        /**게시글 상세 정보 획득
         * @param {*}    context
         * @param {int} id       */
        showBoard(context, id) {
            // 다른 모듈에 있는 액션 매서드를 불러오기
            context.dispatch('user/chkTokenAndContinueProcess'
                , () => {
                    // 실행할 함수처리 방법
                    const url = '/api/boards/' + id;
                    const config = {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                        }
                    }
                    axios.get(url, config)
                        .then(response => {
                            context.commit('board/setBoardDetail', response.data.board, { root: true });
                            // context.commit('setPage', response.data.boardList.current_page);

                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
                , { root: true });


        },
        /**게시글 작성
         * 
         */
        storeBoard(context, data) {
            context.dispatch('user/chkTokenAndContinueProcess'
                , () => {
                    if (context.state.controllFlg) {
                        context.commit('setControllFlg', false)
                        const url = '/api/boards';
                        const config = {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                            }
                        };
                        const formData = new FormData();
                        formData.append('content', data.content);
                        formData.append('file', data.file);

                        axios.post(url, formData, config)
                            .then(response => {
                                context.commit('setBoardListUnshift', response.data.board);
                                context.commit('user/setUserInfoBoardsCount', null, { root: true });


                                router.replace('/boards');
                            })
                            .catch(error => {
                                console.error(error);
                            })
                            .finally(() => {
                                context.commit('setControllFlg', true);
                            });
                    }
                },
                { root: true });
        },
    },

    getters: {
        getNextPage(state) {
            return state.page + 1;
        },
    }
}
