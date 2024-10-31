// Q2-----------------

// 시계작동
function CLOCK(){
    const NOW1 = new Date();
    let hh = NOW1.getHours();
    let mm = NOW1.getMinutes();
    let ss = NOW1.getSeconds();
    const ampm = hh >= 12 ? '오후' : '오전';
    const hour = hh %= 12;
    hh = hour || 12;
    const TIME1 = `${ampm} ${hour}:${mm}:${ss}`;
            
    console.log(TIME1);
    const TIME =  document.querySelector('.TIME');
    TIME.textContent = TIME1;
}
    setInterval(CLOCK,1000)  
    // function으로 


// 중간과정 필요(위에서 시간을 정의한 것을 처리하여 id값주고 밑에서 선언)

const STOP = document.querySelector('.stop');
STOP.addEventListener('click', function STOP_btn(){
    clearInterval(CLOCK);
});



// }
// NOW1.toLocaleTimeString();

//     // const APT =(
//     // function (NOW1){
//     //     if(NOW1.getHours() >= 12) {
//     //         return '오후';
//     //     }else{
//     //         return '오전';    
//     //     }
//     //     console.log(APT(NOW1)); 
//     // })(NOW1);

//     const hh = NOW1.getHours()
//         if(NOW1.getHours()>=12){
//             return (hh-12);
//         }



// let toggle = true;
// document.onclick = function(e){
    
    //     if(toggle){
    //         // 반복 중단
    //         clearInterval(interval);
    //         toggle = false;
    //     }else{
    //         // 반복 재개(재시작)
    //         interval = setInterval(text, 500);
    //         toggle = true;
    //     }
    // }
    // stop 버튼 작동
    // const STOP = document.querySelector('.stop');
    // STOP.clearInterval('click',(e)=>{
    //     e.target.value = 'STOP';
    // });



// const STOP = ()=>{
//     clearInterval(CLOCK);
// }

// document.querySelector('.stop');

// $('.play').click(function(){
// 	$('.visual').slick('slickPlay');
// });
 
// $('.stop').click(function(){
// 	$('.visual').slick('slickPause');
// });

    
    // // cont 버튼 작동
    // const CONT = document.querySelector('.continue');






// (()=>{
//     const TIME1 = document.querySelector('h1');
//     TIME1.textContent = NOW1;
//     TIME1.style.fontSize='3rem';
// })();

// const STOP = document.querySelector('stop');
// STOP.addEventListener('click',()=>{
//     TIME1.removeEventListener()
// })

// const BTN_CONT = document.querySelector('continue');
// BTN_CONT.addEventListener('click'
//     ,() => {
//         STOP.removeEventListener('click',)
//     }
// );

// // removeEventListener()
// BTN_LISTENER.removeEventListener('click', callAlert);
