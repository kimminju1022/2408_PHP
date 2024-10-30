// //추가문제 랜덤값 [안되었던 이유 : px가 아닌 vh,vw를 주어서 안됨]
// const GAME = document.querySelector('.hidden_box');
// GAME.style.left = Math.random()*1500+'px';
// GAME.style.Top = Math.random()*800+'px';

// /**1. 1.`버튼` 클릭시 아래 문구 알러트로 출력
// 안녕하세요. 숨어있는 div를 찾아주세요.*/

// const BTN_HELLO = document.querySelector('#start_btn');
// // BTN_HELLO.addEventListener('click',start);
// // function start(){
// // alert(' 안녕하세요 <br> 숨어있는 DIV를 찾아주세요');
// // }
// BTN_HELLO.addEventListener('click', () => {
//     alert('안녕하세요 \n 숨어있는 DIV를 찾아주세요');
// });


// /**2. 숨어있는 div에 마우스가 진입하면 아래 문구 알러트 출력
//     - 두근두근 */

// const BTN_FOUND = document.querySelector('#hidden_box');
// BTN_FOUND.addEventListener('mouseenter', callAlert);
// function callAlert() {
//     alert('두근두근');
//     // BTN_FOUND.style.overflow = hidden;
// }


// /**3. 숨어있는 div를 마우스로 클릭하면 아래 문구 알러트 출력 및 나타나기
//  - 들켰다 */
// const BTN_GET = document.querySelector('.inner_box');
// BTN_GET.addEventListener('click', callAlert1);
// function callAlert1() {
//     alert('들켰다');
//     BTN_GET.removeEventListener('click', callAlert1);
//     //4. 들키고 나면 두근두근이 출력되지 않는다
//     BTN_FOUND.removeEventListener('mouseenter', callAlert);

//     /**5. 나타난 div를 다시 클릭하면 아래 문구 알러트 출력 및 사라지기
//      - 숨는다 */
//     const BTN_HIDE = document.querySelector('.inner_box');
//     BTN_HIDE.addEventListener('click', callAlert2);
//     function callAlert2() {
//         alert('숨는다');
//     //     // BTN_HIDE.style.backgroundColor = 'rgb(0, 50, 214) rgb(21, 122, 255)'; 
//     // // 랜덤 위치 설정
//     // BTN_HIDE.style.left = Math.random() * 1500 + 'px';
//     // BTN_HIDE.style.top = Math.random() * 800 + 'px';
//     // `hidden_box`의 크기를 기준으로 랜덤 위치 설정   
//     // const parentWidth = BTN_HIDE.parentElement.clientWidth - BTN_HIDE.clientWidth;
//     // const parentHeight = BTN_HIDE.parentElement.clientHeight - BTN_HIDE.clientHeight;

//     // BTN_HIDE.style.left = Math.random() * parentWidth + 'px';
//     // BTN_HIDE.style.top = Math.random() * parentHeight + 'px';
//     BTN_HIDE.removeEventListener('click', callAlert2);
//         initGame(); // 새로운 위치로 이동
//         BTN_FOUND.addEventListener('mouseenter', callAlert); // 다시 두근두근 이벤트 리스너 추가
//     }
// }

// // 초기 게임 설정
// initGame();

// /**  6 다시 숨은 div에 마우스가 진입하면 아래 문구 알러트 출력 
//     -두근두근*/


// // BTN_FOUND.addEventListener('mouseenter', callAlert);
// // function callAlert() {
// //     alert('두근두근');
// // }


// // const BTN_FOUND = document.querySelector('#inner_box');
// // BTN_FOUND.addEventListener('mouseenter', () => {
// //     BTN_HIDE.removeEventListener('click', hide);
// //     function hide(){
// //         alert('숨는다');
// //     }
// // })

//함수별 
const GAME = document.querySelector('.hidden_box');
const BTN_HELLO = document.querySelector('#start_btn');
const BTN_FOUND = document.querySelector('#hidden_box');
const BTN_GET = document.querySelector('.inner_box');

// 초기화 함수 정의
function initGame() {
    GAME.style.left = Math.random() * 1500 + 'px';
    GAME.style.top = Math.random() * 800 + 'px';
    BTN_FOUND.addEventListener('mouseenter', callAlert);
}
// 두근두근 경고 출력 메세지 적용
function callAlert() {
    alert('두근두근');
}

// 시작 버튼 클릭 시 팝업 및 게임 초기화되게 함
BTN_HELLO.addEventListener('click', () => {
    alert('안녕하세요 \n 숨어있는 DIV를 찾아주세요');
    initGame(); // 게임 초기화
});

// 들켰을 때
BTN_FOUND.addEventListener('mouseenter', callAlert);
BTN_GET.addEventListener('click', callAlert1);

function callAlert1() {
    alert('들켰다');
    BTN_GET.removeEventListener('click', callAlert1);
    BTN_FOUND.removeEventListener('mouseenter', callAlert);

    // 숨는다
    const BTN_HIDE = document.querySelector('.inner_box');
    BTN_HIDE.addEventListener('click', callAlert2);

    function callAlert2() {
        alert('숨는다');

        BTN_HIDE.removeEventListener('click', callAlert2);
        initGame(); // 새로운 위치로 이동

        // 다시 두근두근 이벤트 리스너 추가한다 쉽게 말해 재시작
        BTN_FOUND.addEventListener('mouseenter', callAlert);
        BTN_GET.addEventListener('click', callAlert1);

        function callAlert1() {
            alert('들켰다');
            BTN_GET.removeEventListener('click', callAlert1);
            BTN_FOUND.removeEventListener('mouseenter', callAlert);

            // 숨는다
            const BTN_HIDE = document.querySelector('.inner_box');
            BTN_HIDE.addEventListener('click', callAlert2);

            function callAlert2() {
                alert('숨는다');

                BTN_HIDE.removeEventListener('click', callAlert2);
                initGame(); // 새로운 위치로 이동하는데 이 동작이 2번까지만 가능함 2번만 써서 그런듯
            }
        }
    }
}       
 // 그래서 버튼으로 초기 게임 설정 근데 스크립트를 1번만 써서 일회성임;;;;;
initGame();
BTN_FOUND.addEventListener('mouseenter', callAlert);
BTN_GET.addEventListener('click', callAlert1);

function callAlert1() {
    alert('들켰다');
    BTN_GET.removeEventListener('click', callAlert1);
    BTN_FOUND.removeEventListener('mouseenter', callAlert);

    // 숨는다
    const BTN_HIDE = document.querySelector('.inner_box');
    BTN_HIDE.addEventListener('click', callAlert2);

    function callAlert2() {
        alert('숨는다');

        BTN_HIDE.removeEventListener('click', callAlert2);
        initGame();
    }
}
