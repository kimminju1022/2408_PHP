// // Q2-----------------
// function leftPadZero(target, length){
//     return String(target).padStart(length,'0');
// }
// // 시계작동
// function CLOCK(){
//     const NOW = new Date();
//     let hh = NOW.getHours();  //시간 획득(24시포맷)
//     let mm = NOW.getMinutes();  //분 획득
//     let ss = NOW.getSeconds();  //초 획득
//     // const ampm = hh >= 12 ? '오후' : '오전';
//     // const hour = hh %= 12;
//     // hh = hour || 12; --민주답
//     // prof답
//     let ampm = hh < 12 ? '오전' : '오후';
//     let hour12 = hh <13 ? hh : hh - 12; //시간 12시 포맷
    
//     let timeFormat = 
//         `${ampm} ${leftPadZero(hour12,2)}:${leftPadZero(mm,2)}:${leftPadZero(ss,2)}`;
    
//     document.querySelector('#TIME').textContent=timeFormat;
// }
//     // const TIME1 = `${ampm} ${hour}:${mm}:${ss}`; --민주답
//     //     console.log(TIME1);
//     //     const TIME =  document.querySelector('.TIME');
//     //     TIME.textContent = '현재시간  |  '+TIME1;
//     // }
// (() =>{
//     CLOCK();
//     let intervalId = null;
//     intervalId = setInterval(CLOCK,500);

//     //멈추기
//     document.querySelector('#stop').addEventListener('click', () => {
//         clearInterval(intervalId);
//         intervalId = null;
//     });
//     //재시작
//     document.querySelector('#continue').addEventListener('click', () => {
//         if(intervalId === null){
//             intervalId = setInterval(CLOCK, 500);
//         }
//     });

//     //기록
//     document.querySelector('#record').addEventListener('click',() => {
//         console.log();
//     })
// })();

// // 중간과정 필요(위에서 시간을 정의한 것을 처리하여 id값주고 밑에서 선언)

// // const STOP = document.querySelector('.stop');
// // STOP.addEventListener('click', function STOP_btn(){
// //     clearInterval(CLOCK);
// // });



// // }
// // NOW1.toLocaleTimeString();

// //     // const APT =(
// //     // function (NOW1){
// //     //     if(NOW1.getHours() >= 12) {
// //     //         return '오후';
// //     //     }else{
// //     //         return '오전';    
// //     //     }
// //     //     console.log(APT(NOW1)); 
// //     // })(NOW1);

// //     const hh = NOW1.getHours()
// //         if(NOW1.getHours()>=12){
// //             return (hh-12);
// //         }



// // let toggle = true;
// // document.onclick = function(e){
    
//     //     if(toggle){
//     //         // 반복 중단
//     //         clearInterval(interval);
//     //         toggle = false;
//     //     }else{
//     //         // 반복 재개(재시작)
//     //         interval = setInterval(text, 500);
//     //         toggle = true;
//     //     }
//     // }
//     // stop 버튼 작동
//     // const STOP = document.querySelector('.stop');
//     // STOP.clearInterval('click',(e)=>{
//     //     e.target.value = 'STOP';
//     // });



// // const STOP = ()=>{
// //     clearInterval(CLOCK);
// // }

// // document.querySelector('.stop');

// // $('.play').click(function(){
// // 	$('.visual').slick('slickPlay');
// // });
 
// // $('.stop').click(function(){
// // 	$('.visual').slick('slickPause');
// // });

    
//     // // cont 버튼 작동
//     // const CONT = document.querySelector('.continue');






// // (()=>{
// //     const TIME1 = document.querySelector('h1');
// //     TIME1.textContent = NOW1;
// //     TIME1.style.fontSize='3rem';
// // })();

// // const STOP = document.querySelector('stop');
// // STOP.addEventListener('click',()=>{
// //     TIME1.removeEventListener()
// // })

// // const BTN_CONT = document.querySelector('continue');
// // BTN_CONT.addEventListener('click'
// //     ,() => {
// //         STOP.removeEventListener('click',)
// //     }
// // );

// // // removeEventListener()
// // BTN_LISTENER.removeEventListener('click', callAlert);

// Q2-----------------
function leftPadZero(target, length){
    return String(target).padStart(length,'0');
}
// 시계작동
function CLOCK(){
    const NOW = new Date();
    let hh = NOW.getHours();  //시간 획득(24시포맷)
    let mm = NOW.getMinutes();  //분 획득
    let ss = NOW.getSeconds();  //초 획득

    let ampm = hh < 12 ? '오전' : '오후';
    let hour12 = hh <13 ? hh : hh - 12; //시간 12시 포맷
    
    let timeFormat = 
    `${ampm} ${leftPadZero(hour12,2)}:${leftPadZero(mm,2)}:${leftPadZero(ss,2)}`;

    return timeFormat;
}

(() =>{
    document.querySelector('#TIME').textContent = CLOCK();

    let intervalId = null;
    intervalId = setInterval(() =>{
        document.querySelector('#TIME').textContent = CLOCK();
    },500);
    
    //멈추기
    document.querySelector('#stop').addEventListener('click', () => {
        clearInterval(intervalId);
        intervalId = null;
    });
    //재시작
    document.querySelector('#continue').addEventListener('click', () => {
        if(intervalId === null){
            intervalId = setInterval(
                () => document.querySelector('#TIME').textContent = CLOCK()
                , 500);
        }
    });

    //기록
    document.querySelector('#record').addEventListener('click',() => {
        // document.querySelector('#TIME').textContent = CLOCK();
        function addRecord(){
            let add
        }
        console.log(CLOCK);

// 
document.getElementById('record').addEventListener('click', function() {
    const currentTime = CLOCK(); // 현재 시간 가져오기
    const timeLogDiv = document.getElementById('record_board');
    })
})()
});