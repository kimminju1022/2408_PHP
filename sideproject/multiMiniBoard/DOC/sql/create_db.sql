CREATE DATABASE mini_multi_board;
USE mini_multi_board;

-- 테이블 생성
	CREATE TABLE users(
	u_id              BIGINT UNSIGNED		PRIMARY KEY AUTO_INCREMENT
	,u_email			VARCHAR(100)			NOT NULL 
	,u_pw					VARCHAR(256) BINARY 	NOT NULL	
	,u_name				VARCHAR(50)				NOT NULL	
	,created_at			TIMESTAMP				NOT NULL	DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL	DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP				
	);
	
	CREATE TABLE boards(
	b_id					BIGINT UNSIGNED		PRIMARY KEY AUTO_INCREMENT
	,u_id					BIGINT UNSIGNED		NOT NULL 
	,bc_type				CHAR(1)					NOT NULL 
	,b_title				VARCHAR(50)				NOT NULL 
	,b_content			VARCHAR(200)			NOT NULL 
	,b_img				VARCHAR(100)			NOT NULL 
	,created_at			TIMESTAMP				NOT NULL	DEFAULT CURRENT_TIMESTAMP()
	,updated_at			TIMESTAMP				NOT NULL	DEFAULT CURRENT_TIMESTAMP()
	,deleted_at			TIMESTAMP				
	);
	
	CREATE TABLE boards_category(
	bc_id					BIGINT UNSIGNED		PRIMARY KEY AUTO_INCREMENT
	,bc_type				CHAR(1)					NOT NULL	UNIQUE 	
	,bc_name				VARCHAR(20)				NOT NULL 
	);
	
	
-- 	fk부여
-- ALTER TABLE [테이블이름] 
-- ADD CONSTRAINT [FK이름] 
-- FOREIGN KEY (칼럼이름) REFERENCES 테이블이름([칼럼 이름]);

ALTER TABLE boards
ADD CONSTRAINT FK_boards_u_id
FOREIGN KEY (u_id) REFERENCES users(u_id);

ALTER TABLE boards_category
ADD CONSTRAINT FK_boards_category_bc_type
FOREIGN KEY (bc_type) REFERENCES boards(bc_type);



-- 
