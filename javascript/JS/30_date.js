/**Date 객체
 * 현재 날짜 및 시간 획득
 */

const dayToKorean = day => {
//     switch(day){
//         case 0:
//             return '일요일';        
//         case 1:
//             return '월요일';        
//         case 2:
//             return '화요일';    
//         case 3:
//             return '수요일';
//         case 4:
//             return '목요일';
//         case 5:
//             return '금요일';
//         default:
//             return '토요일';
//     }
// }
const ARR_DAY = ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'];
return ARR_DAY[day];
}
const NOW = new Date();

const addLpadZero = (num, length) =>{
    return String(num).padStart(length, '0');
}


//getFullYear() : 연도만 가져오는 메소드(yyyy)
const YEAR = NOW.getFullYear();

//getMonth() : 월을 가져오는 메소드, 0~11 반환
// const MONTH = String(NOW.getMonth() + 1).padStart(2,'0');
const MONTH = addLpadZero(NOW.getMonth() +1,2);

//getDate() :
const DATE = addLpadZero(NOW.getDate(),2);

//getHours() :
const HOUR =  addLpadZero(NOW.getHours(),2);
//getMinutes() :
const MINUTES = addLpadZero(NOW.getMinutes(),2);

//getSeconds() :
const SECOND = addLpadZero(NOW.getSeconds(),2);

//getMilliseconds() :
const MILLISECONDS = addLpadZero(NOW.getMilliseconds(),3);


//getDay() :
const DAY = NOW.getDay();

const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOUR}:${MINUTES}:${SECOND}.${MILLISECONDS},${dayToKorean(DAY)}`;

//getTime() : UNIX Timectamp를 반환(미리초 단위)
console.log(NOW.getTime());


/**두 날짜의 차를 구하는 방법
 */
const TAGET_DATE = new Date('2025-03-13 18:10:00');
// const DIFF_DATE = Math.abs(NOW - TAGET_DATE);
//1000*60*60*24 = 86400000
const DIFF_DATE = Math.floor(Math.abs(NOW - TAGET_DATE) /86400000);


const TAGET_DATE1 = new Date('2024-01-01 13:00:00');
const TAGET_DATE2 = new Date('2025-05-30 00:00:00');
// const DIFF_DATE = Math.abs(NOW - TAGET_DATE);
//1000*60*60*24 = 86400000
const DIFF_DATE3 = Math.floor((Math.abs(TAGET_DATE1 - TAGET_DATE2) /86400000)/30);
