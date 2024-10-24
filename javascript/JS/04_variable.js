console.log('외부파일');

// --------변수----------
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
var num1 = 1;  //  최초 선언
var num1 = 2;  // 중복선언

//  let : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
let num2 = 2;  // 최초선언
// let num2 = 3;  // 중복선언 불가능

// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프, 상수
const num3 = 3;
// num3 = 4; //재할당, 불가능



// --------스코프----------
// 변수나 함수가 유효한 범위로 전역, 지역, 블록 총 3가지의 스코프가 존재

// 전역레벨 스코프 : 어디서든 접근할 수 있는 영역
let globalScope = '전역이다';

function myPrint() {
    console.log(globalScope);
}

// 지역레벨 스코프 : 지역을 나누는 단위는 함수, 객체 영역 총 2개도 나뉜다
function myLocalPrint() {
    let localScope = '마이로컬프린트 지역';
    console.log(localScope);
}

// 블록 레벨 스코프 : {}사용하여 블록을 나눔. 
function myBlock(){
    if(true) {
        var test1 = 'var';
        let test2 = 'let';
        const TEST3 = 'const';
    }
    console.log(test1); //if 블록 밖에서 사용할 수 있음
    console.log(test2); //if 블록 밖에서는 사용할 수 없음
    console.log(TEST3); //if 블록 밖에서는 사용할 수 없음
}

/** ------------ 호이스팅 ------------ 
 * 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당하는 것
 * 인터프리터란?  선언전에 미리 공간을 할당하여 정보는 없지만 자리를 만들어 둔것이라 볼 수 있다
 * 
 */
// console.log(test);
// test = 'aaa';
// console.log(test);
// let test;


/** 데이터타입
 * number : 숫자
 */
let num =1;

/** string : 문자열
 */
let str = 'test';

/** boolean : 논리 */
let bool = true;

/** NULL : 존재하지 않는 값 */
let letNull = null;

/**undefined : 값이 할당되지 않은 상태
 * 선언만 하고 정의하지 않은 상태
 */
let letUndefined;

/**symbol : 고유하고 변경이 불가능한 값
 * let str1 = 'aaa';
 * let str2 = 'aaa';   둘은 같은것이라고 생각;;;
 */
let symbol1 = Symbol('aaa');
let symbol2 = Symbol('aaa');

/**  object : 객체, 키-값이 쌍으로 이루어진 복합 데이터 타입
 * key & value는 한 쌍이다
 * */
    let obj = {
        'key1':'val1'
        // ,'key2':'val2' 더 넣을게 있을 경우
    }

    