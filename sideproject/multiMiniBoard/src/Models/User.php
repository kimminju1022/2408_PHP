<?php
namespace Models;
use Models\Model; //Models의 Model을 상속받아 쓰겠다는 의미
use Throwable;

class User extends Model{
    public function getUserInfo($paramArr){
        try{
            $sql = 
            ' SELECT * '
            .' FROM users '
            .' WHERE u_email = :u_email '
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->fetch();
        }catch(Throwable $th){
            echo 'User->getUserInfo(), '.$th->getMessage();
            exit;
        }
    }
    public function registUserInfo($paramArr){
        try{
            $sql = 
            ' INSERT INTO users( '
            .'      u_email '
            .'      ,u_password '
            .'      ,u_name '
            .' )'
            .'VALUES ( '
            .'      :u_email '
            .'      ,:u_password '
            .'      ,:u_name '
            .' )'
            ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt-> rowCount();
            
        }catch(Throwable $th ){
         echo 'User->registerUserInfo(), '.$th->getMessage()       ;
         exit;
        }
    }
}