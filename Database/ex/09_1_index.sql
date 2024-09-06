-- index확인하는 방법
SHOW INDEX FROM employees;

-- 주정웅에 대한 정보를 불러오기
SELECT* FROM employees WHERE NAME = '주정웅';

-- index생성
ALTER TABLE employees ADD INDEX idx_employees_name (NAME);
-- employees테이블에 

SELECT* FROM employees WHERE NAME = '주정웅';

-- index제거
DROP INDEX idx_employees_name ON employees;







