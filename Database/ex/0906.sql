-- 100000번사원의 연봉을 4000만원으로 변경하라

SELECT * FROM employees WHERE emp_id = 99999;

UPDATE salaries
SET salaries.end_at = NOW()
WHERE  salaries.end_at IS null
;
-- ↑이러면 null값인 애들 전부 다 바뀐다!!!!!!!!!!!!!!정신차려!!!!!

UPDATE salaries
SET salaries.salary = 50000000
	,update_at = NOW()
WHERE emp_id = 100000
;

-- 기존 데이터를 낡은 데이터로 만들고 새로운 데이터를 인서트 해줘야 함
UPDATE salaries
SET
	updated_at = NOW()
	,end_at = DATE(NOW())
	WHERE sal_id = 990334
;

INSERT INTO salaries(
	emp_id
	,salary
	,start_at
)VALUES(
	99999
	,40000000
	,DATE(NOW())
)
;


-- 최신데이터 기준으로 하는 방법
-- 최신 데이터 불러와서 확인하기
SELECT * FROM salaries WHERE emp_id = 99999
ORDER BY start_at DESC
LIMIT 1;

SELECT * FROM salaries WHERE emp_id = 99999
ORDER BY start_at DESC
;

-- 서브쿼리로 가지고 오는 방법(다시)
UPDATE salaries
SET
	updated_at = NOW()
	,end_at = DATE (NOW())
	WHERE sal_id =(
		SELECT sal_id
		FROM salaries
		WHERE emp_id = 99998
		ORDER BY start_at DESC
		LIMIT 1
		)
;

INSERT INTO salaries(
	emp_id
	,salary
	,start_at
)VALUES(
	99998
	,40000000
	,DATE(NOW())
)
;
-- 99996번사원의 연봉을 4000만원으로 변경하라
/*
UPDATE salaries
SET
	updated_at = NOW()
	,end_at = DATE(NOW())
	WHERE sal_id = 990334
;

INSERT INTO salaries(
	emp_id
	,salary
	,start_at
)VALUES(
	99999
	,40000000
	,DATE(NOW())
)
;
step1. 
salaries테이블의 자료를 업데이트한다
이때, updated_at 값을 NOW()로
	,end_at 값을  DATE(NOW())로
	sal_id 중 990334번의 자료에게 적용한다

step2.
현재 연봉의 경우 업데이트되어 새로운 연봉으로 시작하는 거라서 새로운 레코드가 추가되어야 한다
그렇기 때문에 INSERT INTO를 활용하여 새 급여와 그 시작일에 맞춘 레코드를  salaries에 추가한다
이때, salaries에 삽입할 컬럼의 정보는 emp_id, salary, start_at이다
이제 VALUES를 활용하여 위에서 지정한 열에 맞춰 다음의 값으로 수정한다
id : 99999, salary : 40000000, start : 오늘자
즉, salaries 테이블에 새로운 행을 추가하여, emp_id가 99999인 직원의 급여를 40,000,000으로 설정하고,
급여가 시작된 날짜를 현재 날짜로 기록하는 것으로 99999 직원의 정보를 업데이트 한다.
*/