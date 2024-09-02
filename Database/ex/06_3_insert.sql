-- insert문 : 신규 데이터를 저장

-- 기본구조
/* INSERT INTO(컬럼1, 컬럼2)
	VALUES (값1, 값2.....)
	;
*/
INSERT INTO employees(
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
VALUES (
	'김민주'
	,'1990-10-22'
	,'F'
	,'2024-09-02'
	,null
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
	)
	;
	
	
INSERT INTO employees(
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
SELECT 
	NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
FROM employees
WHERE emp_id in (1,2)
;

-- 자신의 직급 정보 삽입 titles  title
-- 자신의 급여정보 삽입 salary
-- 자신의 소속 부서 삽입 dept_name
/*
INSERT INTO titles
	title 
	,created_at
	,updated_at
	,deleted_at
	)
VALUES (
	'부장'
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
	)
	
INSERT INTO salaries
	(emp_id
	,salary 
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
	)
VALUES (
	100002
	,'200000000'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
	)
	
INSERT INTO department_emps
	(emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
	)
VALUES (
	100002
	,'a_class'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
	)
;
*/
-- 다시한 이유 : 한번에 테이블을 바꿀 수 없다 한 테이블은 하나의 ; 으로 끝난다

-- 사원직급테이블

INSERT INTO title_emps(
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
values
	(100002
	,'T005'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
);
/* 확인하는 방법 
SELECT* FROM title_emps WHERE emp_id = 10002;
	n명을 넣고 싶다
	values에 쓸때 인라인으로 한줄씩 ()끊어서 쓰기
*/

-- 급여테이블
INSERT INTO salaries(
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
values
	(100002
	,'20000000'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
;
-- 소속부서
INSERT INTO department_emps(
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
values
	(100002
	,'D006'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
;
