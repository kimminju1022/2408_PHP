<template>
<h1>자식컴퍼넌트</h1>
<!-- <p>{{ data[0].name }}</p> -->
 <div v-for="item in props.data" :key="item"> 
    <span>{{ item.name }}</span>
 </div>
 <p>{{ props.count }}</p>

 <slot></slot>

</template>
    
<script setup>
import {defineProps} from 'vue';

const props = defineProps({
    'data': Array
    ,'count': Number
});

</script>
<style>

</style>