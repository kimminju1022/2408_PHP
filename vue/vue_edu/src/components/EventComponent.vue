<template >
    <p>자식쪽 cnt : {{ props.cnt }}</p>
    <button @click="$emit('eventAddCnt')">자식쪽 증가</button>
    <button @click="$emit('eventAddCntParam',5)">자식쪽 5씩 증가</button>
    <hr>
    <button @click="$emit('eventReset')">자식쪽 초기화</button>
    <hr>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    'cnt': Number
});

</script>
<style >
    
</style>