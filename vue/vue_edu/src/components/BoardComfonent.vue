<template>
    <div class="gameBox">
        <div @mouseover="Text" class="randomBox" style="visibility: hidden;">pikaboo</div>

    </div>
    <!-- <h1>{{ cnt }}</h1>
    <button @click="addCnt">add</button>
    <button @click="disCnt">dis</button> -->
    <hr>
    <h1 @mouseenter="addCnt">{{ cnt }}</h1>
    <hr>
    <input type="text" v-model="tell">
    <span :style="color">{{ msg }}</span>


    </template>
    
<script setup>
import { ref, watch } from 'vue';

// Watchers
const tell = ref('');
const msg = ref('X');
const color = ref('color: red;');

watch(tell,(val)=>{
    // console.log(val);
    // 숫자인지 확인[허용숫자]{자릿수}
    const regex = /^[0-9]{10,11}$/;
    if(!regex.test(val)){
        msg.value = 'X';
        color.value = 'color: red;';
    }else{
        msg.value = '0';
        color.value = 'color: green;';
    }
});

const cnt = ref(0);

// function addCnt(){
//     cnt.value++;
// }
// function disCnt(){
//     cnt.value--;
// }

const addCnt = () =>{
    cnt.value++;
}

</script>
<style>
.gameBox{
    width: 1000px;
    height: 700px;
}
.randomBox{
    width: 100px;
    height: 100px;
}
</style>