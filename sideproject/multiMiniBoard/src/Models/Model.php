<?php
namespace Models;

use Throwable;
use PDO;

class Model{
    protected $conn; //PDO객체 저장용

    //생성자
    public function __construct() {
        try{
            $opt=[
                PDO::ATTR_EMULATE_PREPARES      =>false  //DB의 prepared statement 기능을 사용하도록 설정
                ,PDO::ATTR_ERRMODE              =>PDO::ERRMODE_EXCEPTION //PDO exception을  throws하도록 설정
                ,PDO::ATTR_DEFAULT_FETCH_MODE   =>PDO::FETCH_ASSOC //연관 배열로 fetch시작
            ];

            $this->conn= new PDO(_MARIA_DB_DNS, _MARIA_DB_USER, _MARIA_DB_PASSWORD, $opt);
        }catch(Throwable $th){
            echo 'Model -> __construct(), '.$th->getMessage();
            exit;
        }        
    }
        
    //트랜잭션 시작
    public function beginTransaction(){
        $this->conn->beginTransaction();
    }

    //commit
    public function commit(){
        $this->conn->commit();
    }

    //롤백
    public function rollBack(){
        $this->conn->rollBack();
    }
        
}