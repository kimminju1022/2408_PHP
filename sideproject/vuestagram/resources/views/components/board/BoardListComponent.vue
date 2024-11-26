<template >
<!-- list -->
    <div class="board-list-box">
        <div v-for="item in boardList" :key="item" @click="openModal" class="item">
            <img :src="item.img">
        </div>
    </div>
    <!-- 상세모달 -->
     <div v-show="modalFlg" class="board-detail-box">
        <div class="item">
            <img src="/img/참잘했어요.gif">
            <hr>
            <p>내용</p>
            <hr>
            <div class="et-box">
                <span>작성자</span>
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

function test(){
    
}

// 보드리스트
const boardList = computed(() => store.state.board.boardList);

// before Mount처리
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1){
        store.dispatch('board/getBoardListPagenation');

    }
});

// modal관련
const modalFlg = ref(false);
const openModal = ()=>{
    modalFlg.value = true;
}
const closeModal = ()=>{
    modalFlg.value=false;
}

</script>
<style >
@import url('../../../css/boardList.css');
</style>