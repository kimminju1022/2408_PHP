-- 내장함수 : 데이터를 처리하고 분석하는데 사용하는 프로그램

-- 데이터 타입 변환 함수
-- cast(값 as, 데이터 타입)←변환하고자 하는 값이 들어감.
-- convert(값, 데이터 타입)←

SELECT 1234
	, CAST(1234 AS CHAR(4))
	, CONVERT(1234, CHAR(4))
;

-- 제어 흐름 함수  p285보기
-- if (수식, 참일 때, 거짓일  때)
-- 수식의 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT 
	emp_id
	,gender
,	if(gender = 'm', '남자', '여자') AS ko_gender
FROM employees
;

-- ifnull(tntlr1, tntlr2)
-- 수식 1이 null이면 수식 2를 반환
-- 수식 1이 null이 아니면 수식 1을 반환

select 
	emp_id
	,fire_at
	,IFNULL(fire_at,'9999-01-01')fire_at_not_null
FROM employees
;


-- nullif(수식1, 수식2)
-- 수식1, 수식2 가 서로 일치하는지 체크하고
-- 참이면 null을 반환, 거짓이면 수식1을 반환
SELECT 
	emp_id
	,gender
	,NULLIF(gender,'f')
FROM employees
;

-- 제어함수 case문 (다중분기 만들때 사용)
-- case 체크하려는 수식
-- when 분기수식1 then 결과 1
-- when 분기수식2 then 결과 2
-- else  결과 4
-- end

SELECT
	emp_id
	,case gender
		when 'm' then '남자'
		when 'f' then '여자'
		ELSE '모름'
	END AS ko_gender
FROM employees
;

-- 급여
SELECT
	emp_id
	,salary
	,case
		when salary <=30000000
			then '평범'
		ELSE '많다'
	END AS '조사'
FROM salaries
;
-- ------------------------------------------------
-- 문자열 함수
-- comcat (문자열1, 문자열2.....)
-- 문자열을 연결하는 함수

SELECT CONCAT('안녕하세요','','DB입니다');

-- concat_ws (구분자, 문자열1, 문자열2.......)
-- 문자열 사이에 구분자를 넣어 연결하는 함수
SELECT CONCAT_WS('우유','딸기','바나나','수박','자두');


-- format(숫자, 소수점 자릿수←매개변수기때문에 반드시 적어야 한다 생략 불가) 
SELECT FORMAT(50000,0);
SELECT FORMAT(50000,2);

-- left (문자열, 숫자)
-- 문자열을 왼쪽 부터 숫자길이 만큼 잘라 반환
SELECT LEFT('abcde',2);
SELECT right('abcde',2);

-- upper(문자열)
-- 소문자를 대문자로 변경한다
SELECT UPPER('abcdE');

-- lower(문자열)
-- 대문자를 소문자로 변경하는 문자
SELECT LOWER('ABcdE');

-- Lpad 와 Rpad
-- lpad(문자열, 길이, 채울 문자열)
-- 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 삽입해 반환
SELECT LPAD('321', 5, '0');

-- rpad(문자열, 길이, 채울 문자열)
-- 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 삽입해 반환
SELECT RPAD('321', 5, '0');

-- ex
SELECT LPAD(emp_id,10,'0')FROM employees;

-- trim(문자열)
-- 좌우공백을 제거
-- ex)사람이름을 저장, 호출 시 blank있으면 안되기 때문에

SELECT TRIM('     sdsd   ');

-- rtrim(문자열) 우 공백 제거
-- ltrim(문자열) 좌 공백 제거
SELECT rTRIM('     sdsd   ');
SELECT lTRIM('     sdsd   ');

-- trim(방향 문자열 1 from 문자열2)
-- 방향을 지정해서 문자열 2에서 문자열 1을 제거하여 반환
-- 방햫은 leading(좌), both(좌우), trailing(우)지정가능
SELECT
	TRIM(leading 'ab' FROM 'abcdeab')
	,TRIM(both 'ab' FROM 'abcdeab')
	,TRIM(trailing 'ab' FROM 'abcdeab')
;


-- substring(문자열, 시작위치, 길이)
-- 문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT
SUBSTRING('abcdef',3,2)
;

-- substring_index(문자열,구분자,횟수)
-- 왼쪽부터 구분자가 횟수번째가 나오면 그 이후부터 버림
-- 횟수를 음수로 설정 시 오른쪽 부터 적용된다
SELECT SUBSTRING_INDEX('미어캣_그린_테스트','_',-1);
SELECT SUBSTRING_INDEX('미어캣_그린_테스트','_',2);



-- ------------------
-- 수학함수
-- ------------------
-- ceiling(값):올림
-- flor(값):버림
-- round(값):반올림
SELECT CEILING(1.2), FLOOR(1.9), ROUND(1.5);

-- truncate(값, 정수)
-- 소수점 기준으로 정수위치까지 구하고 나머지는 버림
SELECT TRUNCATE(1.2345,2);


-- ------------------
-- 날짜 및 시간함수
-- ------------------
-- NOW():현재 날짜 및 시간을 반환(yyyy-mm-dd hh:mi:ss)
SELECT NOW();

-- date(데이트 형식의 값
-- 해당 값을 yyyy-mm-dd 형식으로 변화
SELECT DATE(NOW());

-- adddate(날짜1, interval 날짜2)
SELECT ADDDATE('2024-01-01', INTERVAL 1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL -1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL 1 month);
SELECT ADDDATE('2024-01-01', INTERVAL -1 month);
SELECT ADDDATE('2024-01-01', INTERVAL 1 day);
SELECT ADDDATE('2024-01-01', INTERVAL -1 day);
SELECT ADDDATE('2024-01-01', INTERVAL 1 week);
SELECT ADDDATE('2024-01-01', INTERVAL -1 week);


-- -----------------
-- 집계함수
-- -----------------
-- + sum(컬럼):해당칼럼의 합계 출력
-- MAX(컬럼):해당컬럼의 최대 출력
-- MIN(컬럼):해당컬럼의 최소 출력
-- AVG(컬럼):해당컬럼의 평균  출력
-- count(컬럼):해당컬럼의 총수 출력

SELECT
	COUNT(fire_at)
	,COUNT(*)
	FROM employees;


-- -----------------
-- 순위함수
-- -----------------

SELECT
	emp_id
	,salary
	,RANK() OVER(ORDER BY salary DESC) AS sal_rnk
FROM salaries
LIMIT 5;


-- rownumber() over(order by 속성명 desc/asc)
-- 레코드에 순위를 매겨 변환
-- 동일한 값이 있는 경우에도 각 행에 고유한 번호를 부여
SELECT
	emp_id
	,salary
	,ROW_NUMBER() OVER(ORDER BY salary DESC) AS sal_rank
	FROM salaries
	LIMIT 5;














