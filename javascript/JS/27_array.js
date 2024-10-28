// 배열

const ARR1 = [1, 2, 3, 4, 5];

/** 배열에 새로운 요소 추가하는 방법
 * 주의 !!! php사용법과 다름
 * 원본 배열의 마지막 요소를 추가, 리턴은 변경된 length
 */
ARR1.push(10);

// 배열의 길이를 획득하는 방법
console.log(ARR1.length);

//배열형태 여부확인하는 방법(method)
console.log(Array.isArray(ARR1)); //true
console.log(Array.isArray(1)); //false

/** []랑 new Array(1,2,3,4,5);와 형태가 같다
 * 원래는 이렇게 쓰기도 했지만 길어서 위의 형태와 같이
 * 작성하게 됨 */

/** indexOf()
 * 배열에서 특정욧를 검색하고 해당 인덱스를 반환한다
 * 해당요소가 없으면 -1반환
*/
let i = ARR1.indexOf(20);
console.log(i);

/** includes()
 * 배열의 특정 요소의 존재여부를 체크, boolean 리턴
 */

let arr1 = ['홍길동', '갑순이', '갑돌이'];
let boo = arr1.includes('갑순이');
console.log(boo);

/**push()
 * 원본 배열의 마지막 요소를 추가, 리턴은 변경된 length,원본 변경
 */
ARR1.push(10);
ARR1.push(20, 30, 50);
// 성능이슈 발생 시 length를 이용해서 직접 요소를 추가할 것!!(다시 애해해보기!!보통 100개까지 추가하긴 함)
ARR1[arr1.length] = 100;

/** 배열복사
 * 보통 다음과 같이 생각한다 const COPY_ARR1 = ARR1;
 * 주소값을 가져와 읽어오는 것으로, 원본은 따로 있고 이를 참조해서 수정한 것이다
 * 객체는 기본적으로 이를 얕은 복사 즉 shallow copy라 한다
 * 이와 반대로 깊은 복사 deep copy를 하기 위해서는 spread Operator를  
 */
//얕은 복사
const COPY_ARR1 = ARR1;
COPY_ARR1.push(9999)
//깊은복사
const COPY_ARR2 = [...ARR1];
COPY_ARR2.push(9999)

/** pop()
 * 원본 배열의 마지막 요소를 제거한다
 * 제거된 요소를 반환하며 원본을 변경한다
 * 제거할 요소가 없으면 undefined를 반환
 */
const ARR_POP = [1, 2, 3, 4, 5];
let result_pop = ARR_POP.pop();
console.log(result_pop);

/**unshift()
 * 원본배열의 첫번째 요소를 추가, 변경된 length 반환, 원본 변경
 */
const ARR_UNSHIFT = [1, 2, 3];
let resultUnshift = ARR_UNSHIFT.unshift(100);
console.log(resultUnshift);

/** shift()
 * 원본 배열의 첫번째 요소를 제거, 제거된 요소를 반환, 원본 변경
 * 제거할 요소가 없으면 undefined를 반환한다
 */
const ARR_SHIFT = [1, 2, 3, 4];
let resultShift = ARR_SHIFT.shift();
console.log(resultShift);

/** splice()
 * 요소를 잘라서 자른 배열을 반환, 원본 변경
 * 동작되는 방식이 많음. (어디서 잘라내고 몇개를 잘라내느냐)
*/
let arrSplice = [1, 2, 3, 4, 5];
let resultSplice = arrSplice.splice(2);

console.log(resultSplice);
console.log(arrSplice);

//시작을 음수로 할 경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(-2);
console.log(resultSplice);
console.log(arrSplice);

//start, const를 모두 셋팅할 경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 3);
console.log(resultSplice);
console.log(arrSplice);
//배열의 특정 위치에 새로운 요소를 추가
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 0, 999);
console.log(resultSplice);
console.log(arrSplice);

//배열의 특정 위치에 새로운 요소로 변경
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 1, 999);
console.log(resultSplice);
console.log(arrSplice);

/**join()
 * 배열의 요소들을 특정 구분자로 연결한 문자열을 반환
 */
let arrjoin = [1, 2, 3, 4, 5];
let resultJoin = arrjoin.join(', ');
console.log(resultJoin);
console.log(arrjoin);
/**sort()
 * 배열의 요소를 오름차순 정렬, 원본 변경
 * 파라미터를 전달하지 않을 경우에 문자열로 변환 후에 정렬
 */
let arrSort = [5, 6, 7, 3, 2, 20];
// let resultSort = arrSort.sort();
// console.log(resultSort);
// console.log(arrSort);
let resultSort = arrSort.sort((a, b) => a - b);
console.log(resultSort);
console.log(arrSort);

/**map()
 * 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후 그 결과를 새로운 배열로 반환
 */
let arrMap = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let resultMap = arrMap.map(num => {
    if (num % 3 === 0) {
        return '짝';
    } else {
        return num;
    }
});
console.log(resultMap);
console.log(arrMap);

//콜백로직  [map의 로직을 모르면 이거 다 써야함]
const TEST = {
    entity: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    , length: 10
    , map: function (callback) {
        let resultArr = [];   //빈배열 만듬
        for (let i = 0; i < this.entity.length; i++) {  //배열 내부의 것을 활용할거라서this사용
            resultArr[resultArr.length] = callback(this.entity[i]);
        }
        return resultArr;
    }
}
let resultTEST = TEST.map(testCallback);
function testCallback(num) {
    if (num % 3 === 0) {
        return '짝';
    } else {
        return num;
    }
}

// let resultTEST = TEST.map(num => {
//     if(num % 3 === 0){
//         return '짝';
//     } else {
//         return num;
//     }
// });


// ----------------------
// function myCallBack(a,b) {
//     return a+b;
// }

// function myCallBack() {
//         return 'myCallBack';
// }
// function myCallBack2() {
//     return 'myCallBack2';
// }

// function test(callback, flg){
//     if(flg){
//         callback();
//     }else{
//         console.log('콜백 실행 안됨');
//     }
// }
// ----------------------

/** filter()
 * 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고 조건에 만족한 요소만 배열로 반환
 */
let arrFilter = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let resultFilter = arrFilter.filter(num => num % 3 ===0);
console.log(resultFilter);
//3과 4의 배수를 동시에 반환하는 방법
let resultFilter2 = arrFilter.filter(num => {
    if( num % 3 === 0 || num % 4 === 0){
        return true;
    } else {
        return false;
    }
});



/**some()
 * 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고,
 * 조건에 만족하는 결과가 하나라도 있으면 true
 * 만족하는 결과가 하나도 없으면 false를 리턴한다 */
let arrSome = [1, 2, 3, 4, 5];
let resultSome = arrSome.some(num => num ===6);
console.log(resultSome);

//밖에 미리 만듬
// function someTest(num){
//     return num === 0
// }

/**every()
 * 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고,
 * 조건에 모든 결과가 만족하면 true,
 * 하나라도 만족하지 않으면 false를 반환
 * 즉, 하나라도 거짓이면 거짓이다!  */
// let arrEvery = [1, 2, 3, 4, 5];
// let resultEvery = arrEvery.every(num => num ===5);
// console.log(resultEvery);
let arrEvery = [1, 2, 3, 4, 5];
let resultEvery = arrEvery.every(num => num <=5);
console.log(resultEvery);

/**foreach()
 * 배열의 모든 요소에 대해 콜백 함수를 반복 실행 */
let arrForeach = [1, 2, 3, 4, 5];
arrForeach.forEach((val,idx) => {
    // console.log(idx + ' : ' + val);
    console.log('${idx} : ${val}');
});
