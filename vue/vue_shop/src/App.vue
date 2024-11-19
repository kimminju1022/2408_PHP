<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- <h1>{{ count }}</h1> -->
<!-- <button @click="store.commit('board/addCount')">증가</button> -->
<!-- <h1>{{ products }}</h1>
<div v-for="item in products" :key="item">
<h2>{{ item.productName }}</h2>
<p>{{ item.productContent }}</p>
<p>{{ item.productPlice }}</p>
</div> -->
<BoardListComponent />


</template>
<script setup>
// import { computed } from 'vue';
// import { useStore } from 'vuex';
import BoardListComponent from './components/BoardListComponent'
// const store = useStore();
// 반응형 데이터로 다루기 위해 computed이용
// const count = computed(()=> store.state.board.count);
// const products = computed(()=> store.state.board.products);
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
