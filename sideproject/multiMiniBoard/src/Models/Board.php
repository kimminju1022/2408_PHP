<?php
namespace Models;
use Models\Model; //Models의 Model을 상속받아 쓰겠다는 의미
use Throwable;

class Board extends Model{
    public function getBoardList($paramArr){
     try{
        $sql = 
        ' SELECT * '
        .' FROM boards '
        .' WHERE '
        .' bc_type = :bc_type '
        .' AND deleted_at IS NULL '
        .' ORDER BY '
        .' created_at DESC, b_id DESC '
        ;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($paramArr);
        return $stmt->fetchAll();

     }catch(Throwable $th){
            echo 'Board->getBoardList() '.$th->getMessage();
        }
     }   
}