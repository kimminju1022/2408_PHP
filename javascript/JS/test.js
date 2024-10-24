// // let a = '*';
// // for(i=0;i<5; i++){
// //     if()
// // }


// let a = '';
// for (let x = 0; x < 8; x++) {
//     for (let y = 8; y > 0; y--) {
//         if (y - x > 1) {
//         } else {
//             a += '*';
//         }
//     }
//     a += '\n';
// }
// console.log(a);


// let b = '';
// for (let x = 0; x < 8; x++) {
//     for(let y = 8; y > 0; y--) {
//         if(y-x <10){
//         }else{
//             a += '*';
//         }
//         a += '\n';
//     }
//     for (let x = 0; x < 8; x++) {
//         for (let y = 8; y > 0; y--) {
//             if (x - y >= 1) {
//             } else {
//                 b += '*';
//             }
//         }
//         b += '\n';
//     }
// }
// console.log(b);
function printDiamond(n) {
    // 조건 1: n이 2 이하일 때 'a'를 5개 찍기
    // if (n <= 2) {
    //     console.log('a a a a a');
    //     return; // 조건을 만족하면 종료
    // }

    let result = '';
    // 다이아몬드 위쪽 부분
    for (let i = 1; i <= n; i++) {
        let spaces = ' '.repeat(n - i + 1);
        let stars = '*'.repeat(2 * i - 1);
        // console.log(spaces + stars);

        result += spaces + stars + '\n';
    }

    // 다이아몬드 아래쪽 부분
    for (let i = n - 1; i >= n; i--) {
        let spaces = ' '.repeat(n - i);
        let stars = '*'.repeat(2 * i);
        // console.log(spaces + stars);
        result += spaces + stars + '\n';
    }

    // 반대로 출력
    console.log(); // 빈 줄 추가
    for (let i = n - 1; i >= 1; i--) {
        let spaces = ' '.repeat(n - i+1);
        let stars = '*'.repeat(2 * i - 1);
        // console.log(spaces + stars);
        result += spaces + stars + '\n';
    }

    return result;
}

// 테스트
// printDiamond(2); // a a a a a 출력
console.log(printDiamond(10)); // 다이아몬드 모양 출력
