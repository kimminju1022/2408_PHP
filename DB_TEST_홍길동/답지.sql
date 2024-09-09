-- 01. 아래 구조의 테이블을 작성하는 SQL을 작성해 주세요.
CREATE TABLE users(
	userid 		INT UNSIGNED	auto_increment PRIMARY KEY  
	,username 	VARCHAR(30) 	NOT NULL
	,authflg		CHAR(1) 			DEFAULT	'0'
	,birthday 	DATE				NOT NULL
	,created_at DATETIME 		DEFAULT	CURRENT_DATE
	)
;

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
ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT't'
;

-- 06.[01]에서 만든 테이블을 삭제해 주세요.
DROP TABLE users
;
-- 07.아래 테이블에서 유저명, 생일, 랭크명을 출력해 주세요.
