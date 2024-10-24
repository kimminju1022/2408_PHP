// if문
let num = 1;
if (num === 1) {
    console.log('1등');
} else if (num === 2) {
    console.log('2등');
} else if (num === '3등') {
    console.log('3등');
} else {
    console.log('등수 외');
}


// switch문
switch (num) {
    case 1:
        console.log('1등');
        break;
    case 2:
        console.log('2등');
    default:
        console.log('순위 외');
        break;
}


// for문 구구단 2-9단
// for(let i = 0; i <3; i++) {
//     console.log('구구단');
// }
// for (let x = 2; x < 10; x++) {
//     console.log(x+'단')
//     for (let i = 1; i < 10; i++) {
//         console.log(x + ' x ' + i + ' = ' + x * i);
//     }
// }
for(let dan = 2; dan <=9; dan++){
    console.log(dan + '단');
    for(let gu = 1; gu<=9; gu++){
        console.log(dan + ' x '+ gu +' = '+(dan*gu));
    }
}


// // 다이아 찍기
let a = '';
for (let x = 0; x < 8; x++) {
    for(let y = 8; y > 0; y--) {
        if(y-x >1){
        }else{
            a += '*';
        }
    }
    a += '\n';
}
console.log(a);


// for....in : 모든 객체를 반복하는 문법, 키를 가져와서 사용(key에 접근)
const OBJ2 = {
    key1: 'val1'
    ,key2: 'val2'
    ,key3: 'val2'
    ,key4: 'val4'
}

for(let key in OBJ2){
    console.log(OBJ2[key]);
}


// for...of : 이터러블(iterable) 객체를 반복하는 문법
const STR1 = '안녕하세요';
for(let val of STR1){
    console.log(val);
}
console.log(STR1);
