<template >
<!-- list -->
    <div class="board-list-box">
        <div v-for="item in boardList" :key="item" @click="openModal(item.board_id)" class="item">
            <img :src="item.img">
        </div>
    </div>
    <!-- 상세모달 -->
     <div v-show="modalFlg" class="board-detail-box">
        <div v-if="boardDetail" class="item">
            <img :src="boardDetail.img">
            <hr>
            <p>{{boardDetail.content}}</p>
            <hr>
            <div class="et-box">
                <span>작성자 : {{ boardDetail.user.name }}</span>
                <button @click="closeModal">닫기</button>
            </div>
        </div>
     </div>     
</template>
<script setup>

import { computed,onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';
// boards의 정보를 가져와 쓰는 방법
const store = useStore();

// 보드상세
const boardDetail = computed(() => store.state.board.boardDetail);

// 보드리스트
const boardList = computed(() => store.state.board.boardList);

// before Mount처리
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1){
        store.dispatch('board/boardListPagenation');

    }
});

/**-------------스크롤 이벤트 관련처리-------------
 */
const boardScrollEvent = () => {
    if(store.state.board.controllFlg){
        const docHeight = document.documentElement.scrollHeight;  //문서 기준 y축 총길이
        const winHeight = window.innerHeight;   //화면 기준 y축 총길이
        const nowHeight = window.scrollY;   // 현재 위치
        const viewHeight = docHeight-winHeight;   //끝까지 스크롤할 경우 y축 위치
        
        console.log(viewHeight, nowHeight);
        if(viewHeight <= nowHeight){
            store.dispatch('board/boardListPagenation');
            // store.dispatch('board/addBoardList');
            // store.commit('board/setControllFlg', true);
            // 여기 내용수정해야함
            // console.log('스크롤');
        }
       
    }
}
window.addEventListener('scroll',boardScrollEvent);

/**-------------modal관련-------------
 * */
const modalFlg = ref(false);
const openModal = (id)=>{
    // console.log(id);
    store.dispatch('board/showBoard', id);
    modalFlg.value = true;
}
const closeModal = ()=>{
    modalFlg.value=false;
}

</script>
<style >
@import url('../../../css/boardList.css');
</style>