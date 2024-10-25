/**------------ 함수 선언식(사용하는 이유 : 유지보수를 쉽게하기 위함)
 * function 이란? 특정한 기능이나 알고리즘을 갖춘 코드 블록으로, 이를 독립된 부품처럼 만들어 재사용할 수 있게 해주는 문법
* 호이스팅에 영향을 받는다 재할당이 가능함으로 함수명 중복 안되게 조심해야함 
*/
function mySum(a,b){
    return a+b;
}

/** --------------------함수표현식
 * 호이스팅의 영향을 받지 않는다, 재할당을 방지함!!! * 
 * 4:38 수업 내용 다시 들어보기!! 
*/
const myPlus = function(a,b){
    return a+b;
}

/** --------------------화살표 함수
 * 짧게 적기위해 나온 문법이다
 * function mySum(a,b){
    return a+b;
}
*이걸 짧게 만드는 법
 */
// const arrowFnc = (a,b) => a+b;
// const OBJ1 = {
//     key1: 1
//     ,mySum: function(){
//         return a + b;
//     }
// }
// OBJ1.mySum(1,2);

// 파라미터가 2개 이상일 경우
const arrowFnc = (a,b) => a+b;
function test1(a,b) {
    return a+b;
}

// 파라미터가 1개일 경우 ()소괄호 생략 가능_1개일 때만!!!!
const arrowFnc2 = a => a;
function test2(a) {
    return a;
}

// 파라미터가 없는 경우 ()소괄호 생략 불가
const arrowFnc3 = () => 'test';
function test3(a,b) {
    return 'test';
}

const arrowFnc5 = () => 'test';
function test3() {
    return 'test';
}

//처리가 여러줄일 경우
const arrowFnc4 = (a,b) => {
    if(a<b) {
        return 'b가 더 큼';
    }else{
        return 'a가 더 큼';    
    }
}
function test4(a,b){
    if(a<b) {
        return 'b가 더 큼';
    }else{
        return 'a가 더 큼';    
    }
}

// 즉시 실행 함수
const execFnc = (function(a,b){
    return a+b;
})(5,6);

/**콜백 함수
 * 자주쓰이는 함수로 
 */
function myCallBack(){
    console.log('myCallBack');
}

function myChkPrint(callBack,flg){
    if(flg){
        callBack();
    }
}
myChkPrint(myCallBack,true);