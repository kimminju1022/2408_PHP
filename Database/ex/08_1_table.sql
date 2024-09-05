-- data base 생성
-- CREATE DATABASE shop;

-- DB선택
-- USE shop;
-- 해당 줄 드래그하여 선택 실행하면 host에서 선택된 것을 확인할 수 있다

-- DB삭제
-- DROP DATABASE shop;
-- 해당 줄 드래그하여 선택 실행하면 host에서 삭제된 것을 확인할 수 있다
-- f5로 확인하라


-- ------------
-- 테이블 생성
-- ERD가 필요한 이유는 null값이 사용되냐 마냐의 기준을 만들기 위함
-- epdlxj rnwhfmf ekfnsms rjtdmf ㅇ이
-- 데이터 구조를 다루는 
-- |  | 제약조건 | 코멘드
-- ------------

CREATE DATABASE shop;

CREATE TABLE users (
	id	BIGINT(20)				PRIMARY KEY	auto_increment
	,NAME	VARCHAR(50)			NOT NULL
	,addr	VARCHAR(150)		NOT NULL
	,gender	CHAR(1)			NOT NULL COMMENT	'M = 남자, F = 여자'
	,tel	VARCHAR(20)			NOT NULL COMMENT	'-제외숫자'
	,created_at	TIMESTAMP	NOT NULL	DEFAULT	CURRENT_TIMESTAMP()
	,updated_at	TIMESTAMP	NOT NULL	DEFAULT	CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP

);

CREATE TABLE orders (
	id					BIGINT(20)	PRIMARY KEY	auto_increment
	,user_id			BIGINT(20)	NOT NULL
	,order_id		VARCHAR(50)	NOT NULL
	,total_price	BIGINT(20)	NOT NULL
	,created_at		TIMESTAMP	NOT NULL	DEFAULT	CURRENT_TIMESTAMP()
	,updated_at		TIMESTAMP	NOT NULL	DEFAULT	CURRENT_TIMESTAMP()
	,deleted_at 	TIMESTAMP
);


CREATE TABLE products (
	id					BIGINT(20)		PRIMARY KEY	auto_increment
	,product_name	VARCHAR(100)	NOT NULL
	,price			BIGINT(20)		NOT NULL
	,created_at		TIMESTAMP		NOT NULL	DEFAULT	CURRENT_TIMESTAMP()
	,updated_at		TIMESTAMP		NOT NULL	DEFAULT	CURRENT_TIMESTAMP()
	,deleted_at 	TIMESTAMP

);

-- 테이블 제거
-- DROP TABLE orders;
-- DROP TABLE users, products;

-- 전체 날리는 명령
-- TRUNCATE 테이블명; 
-- 이거 쓰면 퇴사하는거야....자의로 지우고 타의로 퇴사야... 책임 잘 져야하는 선택이야
-- 웬만하면 쓸일 있을 때 쓰고 지워버려!!!!!!!!!

-- ------------------
-- alter: 테이블의 구조를 수정하는 문
-- ------------------
-- FK 추가방법(fk추가할 시 alter문을 쓰고 아니라면 다쓸 필요 없음)
-- ALTER TABLE [테이블명]
-- ADD CONSTRAINT [CONSTRAINT]
-- FOREIGN KEY (CONSTRAINT 부여 컬럼명)
-- REFERENCES 참조테이블명(참조테이블 컬럼명)
-- [ON DELETE 동작 / ON UPDATE 동작]; <둘 중 하나만 쓴다

-- 부여컬럼명은 팀의 규칙을 따르며, 예로 fk_orders_user_id
-- 제약조건은 직접 정할 수 있다 ex) ↑ 순서> 제약할 조건문_테이블명_컬럼명

ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY (user_id)
REFERENCES users (id)
;

/*[ON DELETE CASCADE / ON UPDATE CASCADE];
ON UPDATE는 자주 쓰지 않는다*/


-- -----------
-- 컬럼수정(수정 MODIFY)
-- pk는 
-- -----------
ALTER TABLE users
MODIFY COLUMN addr VARCHAR(100) NOT NULL 
;


-- -----------
-- 컬럼추가 (수정 add)
-- -----------
ALTER TABLE users
ADD  COLUMN birth DATE NOT NULL 
;


-- -----------
-- 컬럼제거 (수정 drop)
-- -----------
ALTER TABLE users
DROP  COLUMN birth
;



-- -----------
-- 컬럼추가 ()
-- pk는 다시연구!!!!
-- -----------

ALTER TABLE users
ADD PRIMARY KEY(id) 
;
-- pk부호없음!!!!******************
-- PRIMARY KEY를 직접부여한 것이 아니기 때문에 수정할 것이 없어 이름을 지정하지 않아야 함
-- 그래서 위 처럼 명령했을 때 안된것
-- UNSIGNED 쓰면 부호가 없음이 된다 부호가 없어진다고 자릿수가 늘지는 않는다
-- BIGINT(20) UNSIGNEDR까지가 하나의 데이터 타입임으로 순서대로 적어 줘야 명령이 실행된다
-- 데이터의 타입을 바꾸기 위해서는 기존 fk를 없애줘야 참조하는 아이를 바꿔줄 수 있다
-- 그렇기 때문에 참조에 있는 fk 삭제> 유저 테이블에 값을 부여  > 오더테이블의 아이디를 유저즈의
--  아이디와 동일하게 변경 > 유저 테이블에 fk를 재연결 하기 위해 새정보를 작성하여 재연결한 거다
ALTER TABLE orders
DROP CONSTRAINT fk_orders_user_id
;


ALTER TABLE users
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT
;

ALTER TABLE orders
MODIFY COLUMN user_id BIGINT(20) UNSIGNED NOT NULL
;
-- AUTO_INCREMENT넣으면 에러난다!!AUTO_INCREMENT는 pk에 들어가는 옵션??으로 생각하라

ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY (user_id)
REFERENCES users(id)
;


ALTER TABLE orders
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT 
;

ALTER TABLE products
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT 
;

























