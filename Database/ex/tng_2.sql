-- 1. 사원의 사원번호, 이름, 직급코드를 출력해 주세요.
SELECT 
	employees.emp_id
	,employees.name
	,title_emps.title_code
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
		AND title_emps.end_at IS null
;
-- ok 80321명 조회
-- join을 쓰고 where절을 준다면 where에서 필터링을 해야함 설명 다시 듣기


-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT 
	employees.emp_id
	,employees.gender
	,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		AND salaries.end_at IS null
;
-- ok 80321명조회

-- 3. 10010 사원의 이름과 과거부터 현재까지 연봉 이력을 출력해 주세요.
SELECT
	employees.name
	,salaries.salary
FROM employees
	LEFT JOIN salaries
		ON employees.emp_id = salaries.emp_id
WHERE
	employees.emp_id = '10010'
;
-- ok 마세원 22건 조회, on밑에 작성해도 된다
-- and employees.emp_id =10010


-- 4. 사원의 사원번호, 이름, 소속부서명을 출력해 주세요.
SELECT
	employees.emp_id
	,employees.name
	,departments.dept_name
FROM employees
	join employees
		ON	employees.emp_id = department_emps.emp_id
	JOIN departments
		on departments.dept_code = department_emps.dept_code
WHERE departments.end_at IS null
;
-- 풀이불가 도움 요청!!!!사유 : join을 두개로 나누어 진행해야함
-- from 하위에 enddate로 연결함 다시 확인하기
SELECT
	employees.emp_id
	,employees.name
	,departments.dept_name
FROM employees
	JOIN department_emps
		ON	employees.emp_id = department_emps.emp_id
		AND department_emps.end_at IS null
	JOIN departments
		on departments.dept_code = department_emps.dept_code
;


-- 5. 현재 월급의 상위 10위까지 사원의 사번, 이름, 월급을 출력해 주세요.
SELECT 
	employees.emp_id
	,employees.name
	,salaries.salary
FROM employees
	join salaries
	ON employees.emp_id = salaries.emp_id
	AND salaries.end_at IS null
ORDER BY salaries.salary DESC
LIMIT 10
;
-- ok 10명 편동호,하명호, 채지민....desc사용한 이유는 상위 등순으로
-- 나타내기 위함
-- RANK를 사용할 수 도 있다 >노션확인하기



-- 6. 현재 각 부서의 부서장의 부서명, 이름, 입사일을 출력해 주세요.
SELECT
	departments.dept_name
	,employees.name
	,employees.hire_at
FROM employees
	join department_managers
		ON  employees.emp_id = department_managers.emp_id
		AND department_managers.end_at IS null
	join departments
		ON departments.dept_code = department_managers.dept_code
;
		
-- 다시!!!!!학습하기!!join문 이해가 필요하다!!!!!


-- 7. 현재 직급이 "부장"인 사원들의 연봉 평균을 출력해 주세요.
-- 현재 각 부장 별 평균
SELECT
	employees.emp_id
	,employees.name
	,avg_table.avg_sal
FROM employees
	JOIN (
		SELECT 
		title_emps.emp_id
		,AVG(salaries.salary) AVG_sal
	FROM title_emps
		JOIN titles
			ON title_emps.title_code = titles.title_code
				AND titles.title = '부장'
				AND title_emps.end_at IS null
			
		join salaries
			ON title_emps.emp_id = salaries.emp_id
	GROUP BY title_emps.emp_id
	) avg_table
		ON employees.emp_id = avg_table.emp_id
;



SELECT 
	title_emps.emp_id
	,AVG(salaries.salary) AVG_sal
FROM title_emps
	JOIN titles
		ON title_emps.title_code = titles.title_code
		AND titles.title = '부장'
		AND title_emps.end_at IS null
		
	join salaries
		ON title_emps.emp_id = salaries.emp_id
GROUP BY title_emps.emp_id
;


-- select에 집계함수가 들어가려면 group by가 반드시 있어야 한다
-- 현재 부장에 해당하는 사원의 평균 연봉
select
	titles.title
	,AVG(salaries.salary) AS avg_sal
FROM title_emps
	JOIN titles
		ON title_emps.title_code = titles.title_code
			AND titles.title = '부장'
			AND title_emps.end_at IS null
	JOIN salaries
		ON title_emps.emp_id = salaries.emp_id
GROUP BY titles.title
;




-- is null주의하라
-- 평균연봉을 출력하는데 급여테이블에서 자료를 가지고 올거다
-- 이 때, title_emps의 하위 테이블인 titles에서 title을 가져온다
-- 조건이 부장인 사람들이기 때문에 titles에서 title이 '부장'인 사람을탐색한다

-- 8. 부서장직을 역임했던 모든 사원의 이름과 입사일, 사번, 부서번호를 출력해 주세요.
SELECT
	employees.name
	,employees.hire_at
	,employees.emp_id
	,department_managers.dept_code
	FROM employees
		JOIN	department_managers
			ON employees.emp_id = department_managers.emp_id
;


-- 9. 현재 각 직급별 평균월급 중 60,000,000이상인 직급의 직급명, 평균월급(정수)를을 내림차순으로 출력해 주세요.
SELECT
	titles.title
	,CEILING(AVG(salaries.salary)) AS avg_sal

FROM salaries
	JOIN title_emps
		ON salaries.emp_id = title_emps.emp_id	
			AND salaries.end_at IS null
			AND title_emps.end_at IS null
	JOIN titles
		ON title_emps.title_code = titles.title_code
group by titles.title
	HAVING avg_sal >= 60000000
order BY avg_sal desc
;


-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
SELECT
	title_emps.title_code
	,COUNT(*) AS cnt
	,titles.title
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
			AND title_emps.end_at IS null
			AND employees.fire_at IS null
			AND employees.gender = 'f'
	JOIN titles
		ON title_emps.title_code = titles.title_code
GROUP BY title_emps.title_code
;
	
-- join을 하나 더하여 title을 보이게 만들어 봄
-- COUNT(*)은 새로운 테이블의 모든 정보를 세아린다
-- 