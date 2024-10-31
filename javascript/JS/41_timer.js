/**타이머 함수
 * setTimeout(callback,ms) : 일정 시간 흐른 후 콜백 함수 실행(비동기처리)
 * 1회성이며, 파포의 애니매이션기능처럼 생각해도 됨
 * 조심해서 써야하는 이유 : js는 동기처리와 비동기 처리가 있는데
 * 동시 시작하기 때문에 다음 사항은 3초 걸린다
 * setTimeout(()=> console.log('A'),1000);
 * setTimeout(()=> console.log('B'),2000);
 * setTimeout(()=> console.log('C'),3000);
 * 이유는 똑같이 시작해서 1초 2초 3초 걸린거라 1초마다 순차적으로 찍히는걸 볼 수 있다
 * 비동기 처리는 잘 못 제어하면 버그가 와르르다 
 */
// setTimeout(() => {
//     console.log('시간 초과');
// }, 5000);

/**  C>B>A순으로 출력
setTimeout(()=> console.log('A'),1000);
setTimeout(()=> console.log('B'),2000);
setTimeout(()=> console.log('C'),3000);
*/
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

//clearTimeout(타이머 ID) : 해당 타이머 아이디 처리를 제거하는 방법
const TIMER_ID = setTimeout(() => console.log('타이머'), 2000);
console.log(TIMER_ID)
clearTimeout(TIMER_ID);

//setInterval(callback, ms) : 일정 시간 마다 콜백함수를 실행하는 함수
const INTERVAL_ID = setInterval(() => {
    console.log('인터벌');
}, 1000);
//clearInterval(id) : 해당 id의 인터벌을 제거
// clearInterval(INTERVAL_ID);
setTimeout(()=>clearInterval(INTERVAL_ID,1000));



/**Q1 
 * html건드리지 않고 두둥등장이라는 말이 나오게 하라 
 * 빨강 파랑 알록달록하게 나타내라*/
// let str = '두둥 \(@^0^@)/ 등장'
//           STR.style.

// str = '두둥 \(@^0^@)/ 등장'
// const STR = document.createElement('p');
// STR.textContent = '두둥 \(@^0^@)/ 등장';

// const TEXT = document.querySelector('body');
// TEXT.appendChild(STR);
// STR.style.color = 'red';

// const BLING = setInterval(() => {
// }, 1000)

// prof Answer

(()=>{
    const H1= document.createElement('h1');
    H1.textContent = '두둥 （＾∀＾●）ﾉｼ 등장';
    document.body.appendChild(H1)
    H1.style.color='red';
    H1.style.fontSize='3rem';

})();

setInterval(()=>{
    const H1 = document.querySelector('h1');
    H1.classList.toggle('text_color_B');
    H1.classList.toggle('text_color_R');
},200);

const KAMOKI1 = '(o ゜▽゜)o';
const KAMOKI2 = '(o゜▽ ゜o)<span style="color:pink;">☆</span>';

(()=>{
    const P = document.createElement('P');
    P.innerHTML = KAMOKI1;
    P.style.fontSize = '3rem';
    document.body.appendChild(P);
})();
setInterval(()=>{
const P = document.querySelector('p');
if(P.innerHTML === KAMOKI1){
    P.innerHTML = KAMOKI2;
} else{
    P.innerHTML=KAMOKI1;
}
},500);

