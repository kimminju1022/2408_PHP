function inlineEventBtn(){  //이게 함수 선언식이다
    alert('무한루프');
}
// function TilteEventBtn(){ 
//     const TITLE = document.querySelector('h1');
//     TITLE.style.color = 'red';
// }
function TilteEventBtn(){ 
        const TITLE = document.querySelector('h1');
        TITLE.classList.add('title-click')
    }
// function imgEventBtn(){ 
//     const TITLE = document.querySelector('h2');
//     TITLE.style.
// }
const BTN_LISTENER = document.querySelector('#btn1');
BTN_LISTENER.addEventListener('click',() => {
    alert('이벤트 리스너 실행');
});

function callAlert() {
    alert ('답내자');
}


BTN_LISTENER.addEventListener('click',() => {
    alert('이벤트 리스너 실행 되었습니다');
});

// function ToggleEventBtn(){ 
//         const TITLE = document.querySelector('h1');
//         TITLE.style.color = 'black';
// }

const BTN_TOGGLE = document.querySelector('#btn-toggle');
BTN_TOGGLE.addEventListener('click',() =>{
    const TITLE = document.querySelector('h1');
    TITLE.classList.toggle('title-click');
});

// removeEventListener()
BTN_LISTENER.removeEventListener('click', callAlert);

// ---------연습문제
// const BTN_LISTENER1 = document.querySelector('h2');
// BTN_LISTENER1.addEventListener('click',() => {
//     alert('이벤트 리스너 실행');
// });
// function callAlert1(){
//     alert('테스트용');
// }

// // removeEventListener()
// BTN_LISTENER1.removeEventListener('click', callAlert1);
const H2 = document.querySelector('h2');
H2.addEventListener('click', testyong);
function testyong(){
    alert('test용');
    // H2.removeEventListener('click', testyong);
}
//h1을 누르고 H2를 누르면 클릭이벤트 해제된 것을 알 수 있음
// const TITLE = document.querySelector('h1');
// TITLE.addEventListener('mouseenter', () => {
//     H2.removeEventListener('click', testyong);
// })

const TITLE = document.querySelector('h1');
TITLE.addEventListener(
    'mouseenter'
    , () => {
        H2.removeEventListener('click',testyong);
        console.log('tt');
    }
    ,{once: true}
);

//이벤트 객체
const H3 = document.querySelector('h3');
H3.addEventListener('mouseup',(e) =>{
    // console.log(e);
    e.target.style.color = 'red';
});
H3.addEventListener('mousedown', (e) => {
    e.target.style.color = 'green';
});
H3.addEventListener('mouseleave', (e) => {
    e.target.style.color = 'orange';
});

//모달
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('click',() =>{
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.remove('display-none');
});
//모달 닫기
const MODAL_CLOSE = document.querySelector('#modal_close');
MODAL_CLOSE.addEventListener('click',() => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.add('display-none');
})
//팝업
const NAVER = document.querySelector('#naver');
NAVER.addEventListener('click', () =>{
    open('https://www.naver.com','_blank');
});