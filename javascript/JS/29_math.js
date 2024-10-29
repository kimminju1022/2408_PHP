/**math 객체
 * 올림 버림 반올림이 있다
 */
Math.ceil(0,1); //1
Math.round(0,5); //1
Math.floor(0,9); //0

//랜덤값
Math.random(); // 0~1사이의 랜덤한 닶을 획득
Math.floor(Math.random()*10)+1;

// console.log('start');
// for(let i = 0; i <1000000000; i++){
//     let test = Math.ceil(Math.random()*10)
//     if(test === 0){
//         console.log('0나옴');
//     }
// }
// console.log('end');

//최대값
Math.max(1, 2, 3, 4);
let arr = [1,2,3,4,5];
Math.max(...arr);

//최소값
Math.min(1, 2, 3, 4, 0); //0
Math.min(...arr); //1

//절대값
Math.abs(-1); //1
Math.abs(1); //1
