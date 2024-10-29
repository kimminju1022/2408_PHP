/**tree구조화
 * 요소 선택 
 * - 고유한 ID로 요소를 선택하는 방법 */
const TITLE = document.getElementById('title');
TITLE.style.color = 'blue';

//태그명 요소를 선택하는 방법
const H1 = document.getElementsByTagName('h1');
H1[1].style.color = 'green';

//클래스명으로 요소를 선택
const CLASS_NONE_LI = document.getElementsByClassName('none-li');

//css 선택자를 이용해서 요소를 선택
const SICK = document.querySelector('#sick');
const NONE_LI = document.querySelector('.none-li'); //해당요소의 가장 첫번째 요소만 가져오는 것을 확인할 수 있다
const ALL_NONE_LI = document.querySelectorAll('.none-li');

const LI = document.querySelectorAll('li');
LI.forEach((Element, idx) => {
    if(idx % 3 === 0) {
        Element.style.color = 'red';
    } else if (idx % 2 === 0) {
        Element.style.color = 'blue';
    }else {
        Element.style.color = 'green';
    }
    // -----------------------------
    // if(idx % 2 === 0 && idx % (2*num*3) !==0) {
    //     Element.style.color = 'red';
    // } else {
    //     Element.style.color = 'green';
    // }
});


const ARR1 = [1,2,3,4];
const ARR2 = [
    {id : 1, name:'홍길동'}
    ,{id : 1, name:'홍길동'}
    ,{id : 2, name:'홍길순'}
];

/**요소조작 
 * textContent : 컨텐츠를 획득 또는 변경으로 순수한 텍스트
*/
TITLE.textContent ='<a>링크</a>';


//innerHTML : 컨텐츠 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a>링크크크크</a>';

//setAttrribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const A_LINK = document.querySelector('#title > a'); //핀포인트 즉, 선택자를 잘 설정해야만 한다
A_LINK.setAttribute('href','https://www.naver.com');

const INPUT_PH = document.querySelector('#input-1');
INPUT_PH.setAttribute('placeholder','하하하하하하');

//removeAttrribute(속성명, 값) : 해당 속성과 값을 요소에서 제거
A_LINK.removeAttribute('href');

//요소의 스타일링 적용방법
TITLE.style.color = 'black';

//classList : 클래스로 스타일 추가 및 삭제
//classList.add() : 해당 클래스 추가
TITLE.classList.add('class-1');
TITLE.classList.add('class-2','class-3', 'class-4');

//classList.remove() : 해당 클래스 제거
TITLE.classList.remove('class-3');

// classList.toggle() : 해당 클래스를 on/off
// TITLE.classList.toggle('toggle');

/**-----------------------
 * 새로운 요소 생성
 * createELement(태그명) : 새로운 요소 생성
 */
const NEW_LI = document.createElement('li');
NEW_LI.textContent = '떡볶이'; //innerHTML보다 textContent를 사용해 순수하게 적용하는게 좋다

const FOODS = document.querySelector('#foods');

//appendChild(노드) : 해당 부모 노드의 마지막 자식으로 노드를 추가한다
FOODS.appendChild(NEW_LI);

//removeChild(노드) : 해당 부모 노드의 마지막 자식으로 노드를 제거
// FOODS. removeChild(NEW_LI);

//insertBefore(새로운노드, 기준노드) : 해당 부모 노드의 자식인 기준노드의 앞에 새로운 노드를 추가(기준이 되는 부모 반드시 필요)
FOODS.insertBefore(NEW_LI,SICK);
FOODS.insertBefore(NEW_LI,A);

// --------------------연습
const NEW_LI1 = document.createElement('li');
NEW_LI1.textContent = '응떡';

const FOODS1 = document.querySelector('#foods');

FOODS1.appendChild(NEW_LI1);

// FOODS. removeChild(NEW_LI);

FOODS.insertBefore(NEW_LI1,SICK);
FOODS.insertBefore(NEW_LI,A);

// ----
const A_LINK1 = document.querySelector('#title1 > a'); //#title1 안에 a태그인 자식요소가 있어야 적용된는 것이다
A_LINK1.setAttribute('href','https://www.naver.com');

const INPUT_PH1 = document.querySelector('#input-2'); //덧방 가능해~
INPUT_PH1.setAttribute('placeholder','여기적어봐');


const DATE1 = new Date()
new Date('2020/07/24').getMonth('#date1');
