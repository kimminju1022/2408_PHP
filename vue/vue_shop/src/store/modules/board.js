export default {
    namespaced: true, //모듈화 된 스토어의 네임 스페이스 활성화
    
    state: () => ({
        // 데이터가 저장되는 영역
        // count:0,
        products:[
            {productName: '바지', productPlice: 38000, productContent:'매우 아름다운 바지'},
            {productName: '셔츠', productPlice: 25000, productContent:'매우 고급진 셔츠'},
            {productName: '양말', productPlice: 5000, productContent:'매우 귀여운 양말'},
        ],
        detailProduct:{productName: '', productPlice: 0, productContent:''},
    }),
    mutations: {
        // // 데이터를 수정할 수 있는 함수들을 정의하는 영역
        addCount(state){
            state.count++;
        },
        setDetailProduct(state, item){
            state.detailProduct = item;
        }
    },
    actions: {
        // 비동기성 로직 함수를 정의하는 영역

    },
    getters: {
        // state에 있는 것을 가져오는 것으로 추가처리를 하여 state의 데이터를 획득하기 위한 함수들을 정의하는 영역
    },
}