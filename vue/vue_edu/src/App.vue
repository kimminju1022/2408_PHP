<template>

<!-- 자식 컴포넌트 호출 _ Board.vue관련-->
 <BoardComfonent />


 <hr>

<!-- 리스트 랜더링 -->
 <!-- 반복문과 관련한 문법으로 v-for derective 사용 -->
<!-- 단순반복 : key는 뷰가 내부적으로 문법상에서 반복문을 사용할 수 있게 하는 값을 준다-->
<div v-for="val in 5" :key="val">
  <p>{{ val }}</p>
</div>
<!-- 구구단 -->
  <!-- <div v-for="dan in 8" :key="dan++">  
    <h3>✨---{{ dan }}단---✨</h3>
      <div v-for="num in 9" :key="num" >
        <p>{{ dan }}*{{ num }}={{ dan * num }}</p>
      </div>
  </div> -->

  <div v-for="(item,key) in data" :key="item">
    <p>{{ `${key}번째 ${item.name} - ${item.age} - ${item.gender}` }}</p>
  </div>
  <button @click="data.pop">삭제</button>

<!-- 조건부 랜더링 -->
<h1 v-if="cnt === 7">럭키비키자나</h1>
<h1 v-else-if="cnt >=5">5이상입니다</h1>
<h1 v-else-if="cnt <0">{{cnt}}은(는) 음수입니다</h1>

<!-- v-show -->
<h1 v-show="flgShow">브이쇼</h1>
<button @click="flgShow = !flgShow">브이쇼 토글</button>

<h1>{{ cnt }}</h1>
<button @click="addCnt" style="margin-right: 30px;">증가</button>
<button @click="disCnt">감소</button>
<hr>
<h2>이름 : {{ userInfo.name }}</h2>
<h2 :class="ageColor">나이 : {{ userInfo.age }}</h2>
<h2>성별 : {{ userInfo.gender }}</h2>
<button @click="changeName">이름변경</button>
<button @click="chageAgeBlue">나이 파랑색으로</button>
<hr>
<!--input 값을 받기 때문에 input에서 데이터바인딩을 한다 -->
<input type="text" v-model="transgender">
<button @click="userInfo.gender = transgender">성별변경</button>
<p>{{ transgender }}</p>


</template>



<script setup>
import BoardComfonent from './components/BoardComfonent.vue';
import { reactive, ref } from 'vue';

const data = reactive([
  {name:'홍길동', age: 20, gender: '남자' }
  ,{name:'김영희', age: 12, gender: '여자' }
  ,{name:'둘리', age: 41, gender: '수컷' }
]);


// ------------SHOW------------
const flgShow = ref(true);


//  ------------input적용------------
const transgender = ref('');


// ------------색변경------------
const ageColor = ref('');

// (() => {
//   setInterval.value = !flgShow.value;
// }, (500)
// )();

function chageAgeBlue(){
  ageColor.value = 'blue';
  // ageBlue는 ref니까 .value를 붙여준다->위에서 ageColor로 변경했기에 이름 변경 필!!!
}

// ------------reactive------------
function changeName(){
  userInfo.name = '갑순이';
}

const cnt = ref(0);
// const name = ref('홍길동');
const userInfo = reactive({
  name: '홍길동'
  ,age: 20
  ,gender:'undefind'
});

// const cnt = ref(0);
// console.log(cnt);
function addCnt(){
// const addCnt = () => {
  cnt.value++;
}
function disCnt(){
// const disCnt = () => {
  cnt.value--;
}
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

.blue{
  color: blue;
}
</style>
