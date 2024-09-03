-- p264

-- where절에서 사용하는 subQuery
-- 001부서장의 사번과 이름을 출력하라

SELECT emp_id
FROM department_managers
WHERE
	end_at IS null
	AND dept_code = 'D001'
;

SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE
	emp_id = (
	SELECT emp_id
	FROM department_managers
	WHERE
		end_at IS null
		AND dept_code = 'D001'
)
;
-- ---------
-- 전체부서장 다시
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE
	employees.emp_id in (
	WHERE
		department_managers.end_at IS null
	)
;

-- 서브쿼리를 먼저 작성후 써보라
-- 현재 직책이 T006인 사원의 사번과 이름, 생일을 출력해 주세요
SELECT
	employees.emp_id
	,employees.name
	,employees.birth
FROM employees
WHERE
employees.emp_id IN(
	SELECT 
		title_emps.emp_id
	FROM title_emps
	WHERE
		title_emps.end_at IS null
		AND title_emps.title_code = 'T006'
	)
;
-- employees.emp_id, name, birth
FROM employees
WHERE
employees.emp_id IN(
	SELECT 
		title_emps.emp_id
	FROM title_emps
	WHERE
		title_emps.end_at IS null
		AND title_emps.title_code = 'T006'
	

--현재D002의 부서장이 해당하는 부서의 소속된 날짜 출력 다시!!!!!
SELECT
department_emps.*
FROM department_emps
WHERE(
department_emps.emp_id
, department_emps.dept_code) IN (
	SELECT
	department_managers.emp_id
	,department_managers.dept_code
	FROM department_managers
	WHERE 
		department_managers.end_at IS null
		AND department_managers.dept_code = 'D002'
	)
;



-- 연관서브쿼리
SELECT
	employees.*
	FROM employees
	where
		employees.emp_id IN (
		SELECT department_managers.emp_id
		from department_managers
		where
			department_managers.emp_id = employees.emp_id
	)
;

-- select절에서 사용되는 sub query
-- 사원별 평균 연봉과 사번 이름을 출력하라

SELECT
	employees.emp_id
	,employees.name
	,(
	SELECT avg(salaries.salary)
	FROM salaries
	where
		employees.emp_id = salaries.emp_id
	) AS avg_sal
FROM employees
;

-- --------------------------
-- from절에 사용되는 서브쿼리
-- --------------------------
SELECT 
	tmp.*
FROM(
	SELECT
		employees.emp_id
		,employees.name
	FROM employees
)AS tmp
;


-- insert문에서 sub query사용
INSERT INTO employees (
	NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
)
VALUES(
	(SELECT NAME FROM employees emp WHERE emp.emp_id = 1000)
	,'2000-01-01'
	,'m'
	,DATE(NOW())
	,null
	,null
	,NOW()
	,NOW()
	,null
	)
;


-- -------------------
--  update문에서 sub query 사용
-- -------------------

UPDATE employees
SET 
	employees.gender = (
		SELECT emp.gender
		FROM employees emp
		WHERE emp.emp_id = 100000
	)
WHERE
employees.emp_id = (
	SELECT MAX(emp2.emp_id)
	FROM employees emp2
)
;



















