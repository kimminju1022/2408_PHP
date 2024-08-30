/*
select문
데이터를 조회하기위해 사용하는 쿼리
*/
-- 테이블에서 특정 컬럼만 조회하는 방법
SELECT emp_id, name
FROM employees
;
-- 테이블의 모든 컬럼의 데이터 조회
-- *(asterisk라고 부른다)
SELECT*
FROM employees
;

-- 직급 테이블의 모든 데이터를 조회하세요
SELECT*
FROM titles
;