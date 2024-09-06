-- 사원의 사번, 이름, 현재 직급명, 현재 소속부서명, 현재연봉 조회
SELECT 
	employees.emp_id
	,employees.name
	,titles.title
	,departments.dept_name
	,salaries.salary
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
		AND title_emps.end_at IS NULL
	JOIN titles
		ON title_emps.title_code = titles.title_code
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		AND department_emps.end_at IS NULL
	JOIN departments
		ON department_emps.dept_code = departments.dept_code
	JOIN salaries
		ON  employees.emp_id = salaries.emp_id
		AND salaries.end_at IS NULL
;


-- view생성
CREATE VIEW view_emp_now_data
AS
SELECT 
	employees.emp_id
	,employees.name
	,titles.title
	,departments.dept_name
	,salaries.salary
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
		AND title_emps.end_at IS NULL
	JOIN titles
		ON title_emps.title_code = titles.title_code
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		AND department_emps.end_at IS NULL
	JOIN departments
		ON department_emps.dept_code = departments.dept_code
	JOIN salaries
		ON  employees.emp_id = salaries.emp_id
		AND salaries.end_at IS NULL
;

-- view사용
SELECT* from view_emp_now_data;
-- index를 사용할 수 없어 시간을 단축시킬 수 없다는 단점이 있다

-- view삭제
DROP VIEW view_emp_now_data;









