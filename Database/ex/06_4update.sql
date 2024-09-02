-- update 문 : 기존데이터를 수정
/* update 테이블명을 기재
	set[컬럼1 = 값1, 컬럼2 = 값2,,,,]
	where 조건!!(set하기 전에 where먼저 적어서 에러를 방지하자)
	
*/
UPDATE employees
SET
	gender='f'
	,updated_at = NOW()
WHERE emp_id = 100002
;

-- 나의 직급을 'T005'로 변경
--  현재 급여가 26,000,000만원 이하인 직원의 급여를 50,000,000으로 상향 수정

UPDATE title_emps
SET
	title_code = 'T005'
WHERE emp_id = 100002
;
-- ok

UPDATE salaries
SET
salary = '50000000'
WHERE
salary  <='26000000'
;
-- ok

select*
FROM title_emps
WHERE emp_id = 100002 and end_at IS NULL
;
-- 확인한 후 데이터 수정

UPDATE title_emps
SET title_code = 'T005'
WHERE emp_id = 100002 AND end_at IS NULL;

SELECT * FROM title_emps
WHERE emp_id = 100002 AND end_at IS NULL;

SELECT* FROM salaries where end_at IS NULL AND salary <= 26000000;

update salaries
SET salary = 50000000, updated_at = NOW()
where end_at IS NULL AND salary <= 26000000;

SELECT* FROM salaries
WHERE end_at IS NULL AND salary =50000000;




	