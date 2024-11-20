<template >
<!-- list -->
    <div class="board-list-box">
        <div @click="openModal" class="item">
            <img src="/img/참잘했어요.gif">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/라스무스.jpg">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/미안.gif">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/lala.gif">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/티끌.png">
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

import { ref } from 'vue';
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