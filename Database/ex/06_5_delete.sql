-- delete 문 : 기존 데이터를 삭제

/*
기본구조
delete from 테이블명
where 조건;
*/
-- 나의 급여정보 삭제

SELECT * FROM salaries WHERE emp_id = 100002;
DELETE FROM salaries WHERE emp_id = 100002;
SELECT * FROM salaries WHERE emp_id = 100002;


SELECT * FROM salaries WHERE emp_id = 10002;
DELETE FROM salaries WHERE emp_id = 10002;
SELECT * FROM salaries WHERE emp_id = 10002;

-- 자신의 직책정보 삭제

SELECT * FROM title_emps WHERE emp_id = 100002;
DELETE FROM title_emps WHERE emp_id = 100002;
SELECT * FROM title_emps WHERE emp_id = 100002;