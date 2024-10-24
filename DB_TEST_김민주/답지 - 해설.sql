-- 지문문항
-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
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
	,'2024-09-09'
	,null
	,null
	,DATE(NOW())
	,DATE(NOW())
	,null
	)
	;


-- 2. 월급, 직급, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
-- 먼저 사원종보 조회를 함
SELECT* FROM employees WHERE emp_id = 100001;
-- 월급
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
	(100001
	,'100000000'
	,'2024-09-09'
	,null
	,DATE(NOW())
	,DATE(NOW())
	,NULL
)
;

-- 직급
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
	(100001
	,'T005'
	,DATE(NOW())
	,null
	,DATE(NOW())
	,DATE(NOW())
	,NULL
);

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
	(100001
	,'D002'
	,DATE(NOW())
	,null
	,DATE(NOW())
	,DATE(NOW())
	,NULL
)
;

INSERT INTO department_managers(
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
values
	(100001
	,'D002'
	,DATE(NOW())
	,null
	,DATE(NOW())
	,DATE(NOW())
	,NULL
)
;

-- 3. 짝궁의 것도 넣어주세요.
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
	'이경진'
	,'1995-10-21'
	,'F'
	,DATE(NOW())
	,null
	,DATE(NOW())
	,DATE(NOW())
	,NULL
);
-- 먼저 사원종보 조회를 함
SELECT* FROM employees WHERE emp_id = 100002;
-- 월급
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
	,'100000000'
		,DATE(NOW())
		,null
		,DATE(NOW())
		,DATE(NOW())
		,NULL
	)
;

-- 직급
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
	,DATE(NOW())
	,null
	,DATE(NOW())
	,DATE(NOW())
	,NULL
);

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
	,'D002'
	,DATE(NOW())
	,null
	,DATE(NOW())
	,DATE(NOW())
	,NULL
);
-- 부서매니저
INSERT INTO department_managers(
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
	,'D002'
	,DATE(NOW())
	,null
	,DATE(NOW())
	,DATE(NOW())
	,NULL
);
-- 4. 나와 짝궁의 소속 부서를 D009로 변경해 주세요.
UPDATE department_emps
SET
	end_at = DATE(NOW())
	,updated_at = NOW()
WHERE 
	emp_id = '100001'
	AND end_at IS NULL
;

INSERT into department_emps(
	emp_id
	,dept_code
	,start_at
)
VALUES(
	100001
	,'D009'
	,DATE(NOW())
	)
;

-- 5. 짝궁의 모든 정보를 삭제해 주세요.
-- 정보조회 확인 후 삭제
SELECT * FROM employees WHERE emp_id = '100002'
;

DELETE FROM department_emps
WHERE emp_id = '100002'
;

DELETE FROM salaries
WHERE emp_id = '100002'
;
DELETE FROM title_emps
WHERE emp_id = '100002'
;
DELETE FROM employees
WHERE emp_id = '100002'
;

DELETE FROM department_managers
WHERE emp_id = '100002'
;
 
-- 6. 'D009'부서의 관리자를 나로 변경해 주세요.
-- 현재 부서관리자 확인
SELECT employees.emp_id
		, employees.name
		,department_managers.dept_code
		,department_managers.start_at
FROM employees	
	JOIN department_managers
	ON employees.emp_id = department_managers.emp_id
	and department_managers.end_at IS NULL
;

-- D009부서장 변경

UPDATE department_managers
SET
	end_at = DATE(NOW())
	,updated_at = NOW()
WHERE 
	dept_code = 'D009'
	AND end_at IS NULL
;

INSERT into department_managers(
	emp_id
	,dept_code
	,start_at
)
VALUES(
	100001
	,'D009'
	,DATE(NOW())
	)
;


-- 7. 오늘 날짜부로 나의 직책을 '대리'로 변경해 주세요.

-- 위동일

-- 8. 최저 연봉 사원의 사번과 이름, 연봉을 출력해 주세요.
SELECT employees.emp_id
		,employees.name
		,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		AND salaries.end_at IS NULL
		AND salaries.salary = (
			select
				MIN(salary)
				from salaries
				WHERE
					end_at IS NULL
		)
;


-- 9. 전체 사원의 평균 연봉을 출력해 주세요.다시!!!!!!
SELECT 
	AVG(salaries.salary) AS avg_total
FROM salaries
WHERE end_at IS NULL
;

-- 10. 사번이 54321인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	avg(salaries.salary) AS avg_sal
FROM salaries
WHERE
	emp_id = 54321
GROUP BY salaries.emp_id
;

-- 🍀 표문항
-- 01. 아래 구조의 테이블을 작성하는 SQL을 작성해 주세요.
CREATE TABLE users(
	userid 		INT UNSIGNED	auto_increment PRIMARY KEY  
	,username 	VARCHAR(30) 	NOT NULL
	,authflg		CHAR(1) 			DEFAULT	'0'
	,birthday 	DATE				NOT NULL
	,created_at DATETIME 		DEFAULT	CURRENT_DATE
	)
;
-- datetime을 받고 있기 때문에 current_date를 쓰면 안됨, 이건 주의하자!!!!
-- 설명한 번 더 듣기!!!!!!!!!!!

-- 02. [01]에서 만든 테이블에 아래 데이터를 입력해 주세요.
INSERT INTO users(
	userid
	,username
	,authflg
	,birthday
	,created_at
	)
VALUES(
	1
	,'그린'
	,'0'
	,'2024-01-06'
	,NOW()
)
;

-- 03.[02]에서 만든 레코드를 아래 데이터로 갱신해 주세요.
UPDATE users
SET username = '테스터'
	,authflg = '1'
	,birthday = '2007-03-01'
WHERE userid = 1
;

-- 04.[02]에서 만든 레코드를 삭제해 주세요
SELECT * FROM users WHERE userid = 1
;

DELETE FROM users
WHERE userid = 1
;

-- 05.[01]에서 만든 테이블에 아래 Column을 추가해 주세요.
ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT'-'
;

-- 06.[01]에서 만든 테이블을 삭제해 주세요.
DROP TABLE users
;

-- 07.아래 테이블에서 유저명, 생일, 랭크명을 출력해 주세요.
SELECT users.username
		,users.birth
		,TABLE.rankname
FROM users
	JOIN table
		ON users.userid = TABLE.userid
;




