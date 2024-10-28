//원본은 보존하면서 오름차순 정렬하기
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
const COPY_ARR1 = [...ARR1];

let resultARR1 = COPY_ARR1.sort((a, b) => a - b);
console.log(ARR1);
console.log(resultARR1);


//짝수와 홀수를 분리해서 각각 새로운 배열 만들기
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

let resultARR2 = ARR2.filter(num => num % 2 === 0);
let result_ARR2 = resultARR2.sort((a, b) => a - b);
console.log(result_ARR2);
let filterARR2 = ARR2.filter(num => num % 2 !== 0);
let filter_ARR2 = filterARR2.sort((a, b) => a - b);
let filter_Arr2 = Array.from(new Set(filter_ARR2));
console.log(filter_Arr2);

// 선생님 답안
// Q.1
copyArr1 = [...ARR1];  //deep copy한다
copyArr1.sort((a, b) => a - b);
/**중복 제거
 * 1. foreach, includes
 * 2. filter, indexOf
 * 3. set객체
*/
//1
let duplicationArr = [];
copyArr1.forEach(val => {
    if (!duplicationArr.includes(val)) {
        duplicationArr.push(val);
    }
});
console.log(duplicationArr);

//2
let duplicationArr2 = copyArr1.filter((val, idx) => {
    return copyArr1.indexOf(val) === idx;
});
console.log(duplicationArr2);

//3
let duplicationArr3 = Array.from(new Set(copyArr1)); //Array.from을 써서 다시 배열로 값을 변환시킴
console.log(duplicationArr3);

// Q.2
const ODD = ARR2.filter(num => num % 2 !== 0);
const EVEN = ARR2.filter(num => num % 2 === 0);
console.log(ODD);
console.log(EVEN);
//foreach로 하면 if로 정렬까지 한문장안에 가능하다
const ODD2 = [];
const EVEN2 = [];

ARR2.forEach(val => {
    if (val % 2 === 0) {
        if (!EVEN2.includes(val)) {
            EVEN2.push(val);
        }
    } else {
        if (!ODD2.includes(val)) {
            ODD2.push(val);
        }
    }
});

console.log(ODD2);
console.log(EVEN2);

const ODD3 = [];
const EVEN3 = [];

ARR2.forEach(val => {
    let shallowCopy = null;
    if(val %2 === 0){
        shallowCopy = EVEN3;
    } else {
        shallowCopy = ODD3;
    }
    if(!shallowCopy.includes(val)){
        shallowCopy.push(val);
    }
});
console.log(ODD3);
console.log(EVEN3);