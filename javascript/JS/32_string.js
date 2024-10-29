/**String 객체
 */
let str = '문자열입니다문자열입니다';
let str2 = new String('문자열입니다.');

//length (프로퍼티) : 문자열의 길이를 반환
console.log(str.length);

//charAt(idx) : 해당 인덱스의 문자를 반환
console.log(str.charAt(2));

//indexOf() : 문자열에서 해당 문자열을 찾아 최초의 인덱스를 반환
//해당 문자열이 없으면 -1리턴
console.log(str.indexOf('니다'));
console.log(str.indexOf('자열',5));

//includes() : 문자열에서 존재여부 체크
console.log(str.includes('문자'));
console.log(str.includes('php'));

let test  = 'i am ironman';
test.includes('ir'); //true
console.log(test.includes('ir'));

//replace() : 특정 문자열을 찾아서 첫번째 문자열만 지정한 문자열로 치환한 문자열을 반환
str = '문자열입니다 문자열입니다.';
console.log(str.replace('문자열', 'php')); //php입니다 문자열입니다.

//replaceAll() : 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환
console.log(str.replaceAll('문자열', 'php')); //php입니다 문자열입니다.

//substring(start, end) : 시작 인덱스부터 종료 인덱스 까지 자른 문자열을 반환
str = '문자열 입니다 문자열 입니다.';
console.log(str.substring(1,3));

str = 'bearer : The bonds promised to repay the bearer the full amount, plus 25% in 20 years';
console.log(str.substring(8));

//split(separator, limit) : 문자열을 saparator 기준으로 잘라서 배열을 만들어 반환
str = '짜장면, 탕수육, 라조기, 짬뽕, 볶은밥';
let arrSplit = str.split(',');
console.log(arrSplit);
let arrSplit2 = str.split(',',2);
console.log(arrSplit2);

//trim() : 좌우 공백 제거해서 반환
str = '         아아아아아아아아 배고프다아아아아아아앙  ';
console.log(str.trim());
console.log(str);

// toUpperCase(), toLowerCase() : 알파벳을 대소문자로 변환해서 반환
str = 'aBcdEfGHIj';
console.log(str.toUpperCase());
console.log(str.toLowerCase());