console.log('외부파일');

// --------변수----------
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
var num1 = 1;  //  최초 선언
var num1 = 2;  // 중복선언

//  let : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
let num2 = 2;  // 최초선언
let num2 = 3;  // 중복선언 불가능

// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프, 상수
const num3 = 3;
num3 = 4; //재할당, 불가능