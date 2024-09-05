-- join
-- inner join(가장 많이 쓰임),left outer join, right outer join 정리하기


-- join을 하면 두 테이블의 정보를 해결할 수 있다
-- innerjoin은 교집합된 내용을 조합하여 만든다

-- 사원번호,이름, 소속부서코드를 출력하라
SELECT
	employees.emp_id
	,employees.name
	,department_emps.dept_code
FROM employees
	join department_emps
		ON employees.emp_id = department_emps.emp_id
		and department_emps.end_at IS NULL
;
-- 	join on 은 조인할 때 어떤 조건과 연결할때 where없이 뒤에 붙여넣을 수 있다
-- WHERE department_emps.end_at IS null → ON employees.emp_id = department_emps.emp_id and department_emps.end_at IS null

SELECT
	employees.emp_id
	,employees.name
	,department_emps.dept_code
	,departments.dept_name
FROM employees
	join department_emps
		ON employees.emp_id = department_emps.emp_id
		and department_emps.end_at IS NULL
	
	join departments
		ON departments.dept_code = department_emps.dept_code
;
-- 본 예제는 부서명을 추가한 것으로 추가하고 싶은 항목을
-- 조건으로 넣고 싶다면 join을 반복하면 활용할 수 있다

/*
1.
SELECT
	employees.emp_id
	,employees.name
	,department_emps.dept_code
	,departments.dept_name
FROM employees
	join department_emps
		ON employees.emp_id = department_emps.emp_id 
	and department_emps.end_at IS NULL
	
	join departments
		ON departments.dept_code = department_emps.dept_code
;
2.


SELECT
	employees.emp_id
	,employees.name
	,department_emps.dept_code
	,departments.dept_name
FROM employees
	join department_emps
		ON employees.emp_id = department_emps.emp_id 
	and department_emps.end_at IS NULL
	
	join departments
		ON departments.dept_code = department_emps.dept_code
WHERE department_emps.dept_code+'0001'
;
*/

-- lefe join은 왼쪽 도구에 있는 것 기준으로 테이블을 두고 join 실행
-- 기준테이블의 모든 데이터를 출력
-- 조인 대상 테이블에 없는 값은 null로 출력
-- 만일 오른쪽에 정보가 없다면 null반영됨

-- 모든 사원의 사번, 이름, 부서장 시작날짜
SELECT
employees.emp_id 
,employees.name
,department_managers.start_at

FROM employees
	LEFT JOIN department_managers
		ON employees.emp_id = department_managers.emp_id
WHERE
	department_managers.end_at IS NULL
ORDER BY department_managers.start_at desc
;


-- --------------------------------------------
-- right outer join
-- 오른쪽 테이블을 기준으로 join을 실행
-- 기준테이블의 모든 데이터를 출력하고 조인대상 테이블에 없는 값을 null로 출력한다

-- 모든 사원의 사번, 이름, 부서장 시작날짜를 출력하라
SELECT 
	employees.emp_id
	, employees.name
	,department_managers.start_at
FROM department_managers
	RIGHT JOIN employees
		ON department_managers.emp_id = employees.emp_id
WHERE
	department_managers.end_at IS null
	ORDER BY department_managers.start_at DESC
;



-- --------------------------------------------

-- UNION
-- 두개이상의 쿼리의 결과를 합쳐서 출력
-- 즉 두 쿼리의 결과 중 중복된 내용이 있다면 하나만 표시하여 합쳐진 정보를 보여준다
SELECT *
FROM employees
WHERE emp_id IN(1,3)
union
SELECT *
FROM employees
WHERE emp_id IN(3,6)
;
-- union all쓰면 중복된 내용도 전체값으로 출력한다
SELECT *
FROM employees
WHERE emp_id IN(1,3)
UNION all
SELECT *
FROM employees
WHERE emp_id IN(3,6)
;


-- self join
-- 자기 자신을 조인
-- 슈퍼바이저인 사원의 정보를 출력하라
-- 자신안에 있는 정보를 계속 사용할거라 별칭을 주는게 좋다
SELECT
	emp1.emp_id
	,emp1.name
	,emp2.emp_id
	,emp2.name
	
FROM employees emp1
	JOIN employees emp2
		ON emp1.emp_id = emp2.sup_id
;

-- 매칭된 사원 정보를 함께 보고 싶다
-- 현재 추려진 정보에 출력정보로 emp2의 정보를 출력해 달로고 명령하면 가능함










