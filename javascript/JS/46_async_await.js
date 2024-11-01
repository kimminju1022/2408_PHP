/** promise 객체
1. promise객체를 먼저 만들어 준다
2. 함수 선언/표현 식으로 만든다
3.
 */
function iAmSleepy(flg){
    return new Promise((resolve, reject) => {
        if(flg){
            resolve('성공');
        } else {
            reject('실패');
        }
    });
}
iAmSleepy(true)
// .tnen(data => console.log(data))
.then(data =>console.log(data))
.catch(error => console.error(error))
.finally(console.log('파이널리'))
;
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('c');
//         }, 1000);
//     }, 2000);
// }, 3000);

// 프로미스 객체 생성
function iAmSleepy(str, ms) {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

iAmSleepy('A', 3000)
    .then(() => iAmSleepy('B', 2000))
    .then(() => iAmSleepy('C', 1000))
    .catch(() => console.log('error'))
    .finally(() => console.log('finally'));

    async function test() {
        try{
            await iAmSleepy('A', 3000);
            await iAmSleepy('B', 2000);
            await iAmSleepy('C', 1000);
        }catch (error){
            console.log('erroe');
        }finally{
            console.log('finally')
        }        
    }
