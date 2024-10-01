-- 테이블 생성
CREATE TABLE todo_table(
	id					BIGINT(10)UNSIGNED		PRIMARY KEY AUTO_INCREMENT
	,user_info_id	BIGINT(10)UNSIGNED		NOT NULL
	,text				VARCHAR(20)				   NOT NULL
	,start_at 		TIMESTAMP					NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,end_at 			TIMESTAMP 					
	,completed_at	TIMESTAMP		
	,comment			VARCHAR(300)				NOT NULL
	,created_at		TIMESTAMP 					NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at 	TIMESTAMP 					NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at 	TIMESTAMP				
);

ALTER TABLE todo_table 
ADD CONSTRAINT fk_todo_table_user_info_id 
FOREIGN KEY (user_info_id) REFERENCES user_info(id);