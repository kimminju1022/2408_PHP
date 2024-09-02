/*
select문
데이터를 조회하기위해 사용하는 쿼리
*/
-- 테이블에서 특정 컬럼만 조회하는 방법
SELECT emp_id, name
FROM employees
;
-- 테이블의 모든 컬럼의 데이터 조회
-- *(asterisk라고 부른다)
SELECT*
FROM employees
;

-- 직급 테이블의 모든 데이터를 조회하세요
SELECT*
FROM titles
;

-- 모든 사원의 직책과 사번을 조회해주세요
SELECT emp_id, title_code
FROM title_emps
;

/* 조건문
where 절 : 특정 조건의 데이터를 조회할때 사용
			 반드시 ㄹfrom뒤에 where절 붙이기
*/
-- 사번이 10000번인 사원의 모든 정보를 조회
SELECT*
FROM employees
WHERE
	emp_id = 10000
;

SELECT *
FROM employees
WHERE
	NAME = '원성현'
;


-- 비교연산자 : >, <, =, >=, <=. !=
-- 사번이 6번이상인 사원의 정보를 조회해 주세요

SELECT *
FROM employees
WHERE emp_id >= 6
;

-- 생일이 1990-01-01이후인 사원의 정보를 조회해 주세요

SELECT *
FROM employees
WHERE birth >= 19900101
;

-- (종합조건)생일이 1990-01-01이후이고 남자사원을 조회하세요
-- and, or : 복수의 조건을 적용시키는 키워드

SELECT *
FROM employees
WHERE
	birth >= '1990-01-01'
	AND gender = 'm'
;

-- or)이름이 원성현이거나 반승현인 사원을 조회해 주세요

SELECT *
FROM employees
WHERE
	NAME = '원성현'
	OR NAME = '반지음'
;

-- 이름이 원성현이거나 반승현이고
-- 생일이 1990-01-01 이후인  사원을 조회해 주세요
SELECT *
FROM employees
WHERE
	(NAME = '원성현'
	OR NAME = '반지음')
	AND birth >= '1990-01-01'
;


-- 이름이 원성현 이고 생일이 1990-01-01이후 이거나 
-- 이름이 반승현인 사원을 조회(반승현은 생일조건x)
SELECT *
FROM employees
WHERE
	(NAME = '원성현'
	AND birth >= '1990-01-01')
	OR (NAME = '반승현'
		AND birth >= '1980-01-01')
;
	
-- 직급 코드가 T001 또는 T002이고,
-- 직급 시작일이 2000-01-01이후인 사원의 사번과 코드를 조회

SELECT 
 	emp_id
	, title_code
FROM title_emps
WHERE 
	(title_code = 'T001'
	OR title_code = 'T002'
	)
	AND 
	start_at >= '2000-01-01'
;


-- 생일이 2000-01-01 ~2001-01-01인 사원 정보 조회
SELECT *
FROM employees
WHERE
	birth >= '2000-01-01'
	AND birth <='2001-01-01'
;


-- in연산자 : 지정한 값과 일치한 데이터 조회
-- 이름이 염문창, 지도연, 안소정인 사원 정보 조회하라
SELECT *
FROM employees
WHERE
	NAME IN
	('염문창'
	, '지도연'
	, '안소정')
;

-- between연산자: 지정범위 내에 존재하는 데이터를 조회
-- 생일이 2000-01-01 ~2001-01-01인 사원 정보 조회
SELECT *
FROM employees
WHERE
	birth 
	BETWEEN 
		'2000-01-01'
	and '2001-01-01'
;


-- like연산자 : 문자열의 내용을 조회할 때 사용
-- 염씨인 사원 정보를 ㅎ조회하라
SELECT *
FROM employees
WHERE
	NAME LIKE '염%'
;

-- _:언더바의뱃구만큼 글자수를 제한해서 조회
SELECT *
FROM employees
WHERE
	NAME LIKE '안_'
;


/*
Order by절 : 데이터를 정렬할 수 있는 절이다

*/
-- 전체사원 호출
SELECT *
FROM employees
;
-- 여기서 순서를 정렬하고 싶을 때 아래와 같이 적용한다
SELECT *
FROM employees
ORDER BY NAME desc
;

SELECT *
FROM employees
WHERE GENDER = 'F'
ORDER BY NAME Asc
;

SELECT *
FROM employees
WHERE GENDER = 'F'
ORDER BY NAME Asc, BIRTH DESC, HIRE_AT ASC
;


-- DISTINCT 키워드 : 검색결과에서 중복되는 레코드를 제거
-- 직급 테이블에서 사원번호만 조회하기
SELECT DISTINCT 
	emp_id
	, TITLE_CODE
FROM title_emps
;


/*
	GROUP BY절 : 그룹으로 묶어서 조회(통계낼 때 많이 씀)
	HAVING절 : GROUP BY절 의 조건절(WHERE절과는 다르게 작동함 주의하기)

집계함수
max() : 최대값
min() : 최소값
count() : 개수
avg() : 평균
sum() : 합계

*/

-- 사원별 최고 연봉 조회

SELECT 
 emp_ID
 ,max(salary)
FROM salaries
GROUP BY emp_id
;

-- 최고 연봉 5000만원 이상인 사원 조회
SELECT 
 emp_ID
 ,max(salary)
FROM salaries
GROUP BY emp_id
HAVING MAX(salary) >= 100000000
;

-- 사원의 현재 소속 부서코드 조회하기
-- 값이 null 데이터 검색하기 →컬럼명 is null
SELECT *
FROM department_emps
WHERE
	end_at IS NULL
;

-- 값이 null이 아닌 데이터 검색하기 →컬럼명 is not null
SELECT *
FROM department_emps
WHERE
	end_at IS not NULL
;


-- 부서별 소속사원의 수를 구해주세요
SELECT 
	dept_code
	,COUNT(*) AS cnt
FROM  department_emps
WHERE 
end_at IS NULL
GROUP BY dept_code
;
/*
AS : 컬럼 또는 테이블에 별징을 부여
*/



-- limit, offset : 출력하는 데이터의 개수제한
-- select에는 order by써서 

SELECT *
FROM employees
order BY emp_id desc
LIMIT 5 OFFSET 10
;

-- offset을 사용할 땐 limit가 반드시 앞에 붙는다 set라고 생각해라
-- ex 0을 쓰면 번호가 0이 없기 때문에 1-5까지 나옴

-- 재직중인 사원 연봉 상위 5명 조회
/*SELECT max(salary)
FROM salaries
WHERE 
end_at IS NULL
ORDER BY salary 
limit 5
;
*/
SELECT *
FROM salaries
WHERE
	end_at IS null
ORDER BY salary desc
LIMIT 5
;
-- 전체 데이터 중 salaries 테이블에서 종료일자(end_at) IS null(미종료)된 것중
-- salary에 해당되는 데이터에서 역순으로 5개 보여달라

-- sellect문의 기본구조
/* sellect [DISTINCT][컬럼명]
	FROM[테이블명]
	WHERE[쿼리조건]
	GROUP BY [컬럼명] HAVING [집계함수 조건]
	order BY [컬럼명ASC|| 컬럼명DESC]
	LIMIT [n] OFFSET[n]
*/


