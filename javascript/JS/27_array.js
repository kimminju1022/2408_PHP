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
console.log(Array.isArray(ARR1));
console.log(Array.isArray(1));