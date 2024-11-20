<template >
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <a href=""><h1>VueStagram</h1></a>
                </div>
                <img src="/welcome.png" class="img-logo">
                <div class="btn-group">
                    <router-link to="/login"><button class="btn btn-header btn-bg-black">login</button></router-link>
                    <router-link to="/registration"><button class="btn btn-header btn-bg-white">members</button></router-link>
                </div>
            </div>
        </div>

    </header>
    <!-- main -->
     <main>
        <UserInfoComponent></UserInfoComponent>

        <div class="container">
            <router-view></router-view>
        </div>
        
     </main>

    <!-- Footer -->
     <footer>
        <p>ⓜ 2024. make by Meaning __ ✨Thank you✨</p>
     </footer>
</template>
<script setup>
import router from '../../js/router';
import UserInfoComponent from './user/UserInfoComponent.vue';
</script>
<style>
    @import url('../../css/common.css');
</style>