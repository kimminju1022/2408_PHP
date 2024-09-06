-- transaction 시작
START TRANSACTION;


-- incert
INSERT INTO employees(
	NAME, birth, gender, hire_at
)
VALUES(
'미어캣','2000-01-01','m', DATE(NOW())
)
;

-- select
SELECT * FROM employees WHERE emp_id >= 100001 ;
-- 트랜잭션 내부에서는 탐색 되나 프롬프트에서 같은 명령을 하더라도 연산의결과를 탐색할 수 없다
-- 이는 서로 다른 통로로 접속해 *********이건 트랜잭션

-- rollback 되돌림 autoincrement로 100001번으로 저장되었다 롤백 되었어도 100002로 저장된다
ROLLBACK ;

-- commit을 실행하면 프롬프트에서도 검색 되는 것을 확인할 수 있다
COMMIT ;