-- 1. 직급테이블의 모든 정보를 조회해주세요.
SELECT*
FROM  titles
;
-- ok 9개 조회


-- 2. 급여가 60,000,000 이하인 사원의 사번을 조회해 주세요.
SELECT emp_id
FROM salaries
WHERE salary <= 60000000
	and salaries.end_at IS NULL
;
-- ok 12210명조회
-- 	and salaries.end_at IS NULl안쓰고 select 에 distinc주면 된다


-- 3. 급여가 60,000,000에서 70,000,000인 사원의 사번을 조회해 주세요.
SELECT emp_id
FROM salaries
WHERE
	salary >= 60000000
	AND salary <= 70000000
	and salaries.end_at IS NULL
;
-- ok 4597명 조회
-- between A and B서도 됨


-- 4. 사원번호가 10001, 10005인 사원의 사원테이블의 모든 정보를 조회해 주세요.
SELECT *
FROM employees
WHERE
	emp_id = 10001
	OR emp_id = 10005
;

/*
SELECT *
FROM employees
WHERE
	emp_id IN( '10001', '10005')
;
in 사용하여 1001,1005를 탐색할 수 도 있다
*/
-- ok 진서윤, 신수빈

-- 5. 직급명에 '사'가 포함된 직급코드와 직급명을 조회해 주세요.
SELECT
	title_code
	,title
FROM titles
WHERE title like '%사%'
;
-- ok 3개 검색 사원, 이사, 사장

-- 6. 사원 이름 오름차순으로 정렬해서 조회해 주세요.
SELECT employees.name
FROM employees
order by employees.name ASC
;

-- 탐색 되나 현재 근무중인 사원 탐색 필요

-- 7. 사원별 전체 급여의 평균을 조회해 주세요.

SELECT
	employees.emp_id
	,employees.name
	,(
	SELECT avg(salaries.salary)
	FROM salaries
	where
		employees.emp_id = salaries.emp_id
	) AS '평균급여'
FROM employees
;
/*
SELECT 
	emp_id
	, avg(salary) avg_sal
from salaries
group by emp_id
;
*/

-- 8. 사원별 전체 급여의 평균이 30,000,000 ~ 50,000,000인, 사원번호와 평균급여를 조회해 주세요.
SELECT
	employees.emp_id
	,(
	SELECT avg(salaries.salary)
	FROM salaries
	where
	employees.emp_id = salaries.emp_id
	) AS 'salary_avg'
	
FROM employees
WHERE BETWEEN 30000000 AND 50000000
;
-- 오류가 난 이유를 찾기!!!!!!!
/*
SELECT 
	emp_id
	, avg(salary) avg_sal
from salaries
group by emp_id
	having avg_sal between 30000000 and 70000000
;
*/
-- 별칭, between 주었으나 표기 불가
-- 집계함수는 where절 불가하다 having절을 사용하라

-- 9. 사원별 전체 급여 평균이 70,000,000이상인, 사원의 사번, 이름, 성별을 조회해 주세요.
SELECT
	employees.emp_id
	,employees.name
	,employees.gender
FROM employees	
WHERE 
	employees.emp_id = (
	SELECT salaries.emp_id
	FROM salaries
 	GROUP BY salaries.emp_id
 	HAVING AVG(salaries.salary)>=70000000
	)
	;
/*
SELECT
	employees.emp_id
	,employees.name
	,employees.gender
FROM employees	
WHERE 
	employees.emp_id in (
	SELECT salaries.emp_id
	FROM salaries
 	GROUP BY salaries.emp_id
 	HAVING AVG(salaries.salary)>=70000000
	)
	;
*/	


-- 10. 현재 직급이 'T005'인, 사원의 사원번호와 이름을 조회해 주세요. 
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE
	employees.emp_id
;

SELECT
	emp_id
	,name
FROM employees
WHERE	
employees.emp_id IN(
	SELECT 
	title_emps.emp_id
	FROM title_emps
	where
		title_emps.title_code= 'T005'
		AND title_emps.end_at IS NULL
	)
	ORDER BY employees.emp_id asc
;


SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE employees.emp_id IN(
	SELECT title_emps.emp_id
	FROM title_emps
	WHERE
		title_emps.end_at IS null
	AND title_emps.title_code = 'T005'
	)
	;

-- distinct로 묶을 수 도 있다