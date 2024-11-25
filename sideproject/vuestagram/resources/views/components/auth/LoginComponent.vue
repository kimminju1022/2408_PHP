<template >
    <div class="form-box">
        <p class="form-title">login</p>
        <input v-model="userInfo.account" type="text" name="account" placeholder="아이디">
        <input v-model="userInfo.password" type="password" name="password" placeholder="비밀번호">
        <button @click="$store.dispatch('user/login', userInfo)" class="btn btn-submit btn-bg-black">로그인</button>
        <!-- ↑앞서 공부한 내용과 다른점 : form tag가 아니다!!! -->
    </div>
</template>
<script setup>
import { reactive } from 'vue';
// 입력데이터 저장
const userInfo = reactive({
    account:'',
    password:'',
})
</script>
<style >
    
</style>