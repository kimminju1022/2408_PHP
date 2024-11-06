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
            exit;
        }
     }   

   public function getBoardDetail($paramArr){
      try{
         $sql = 
         ' SELECT '
         // .'users.u_id' 조인에ㅔ 사용했고 출력할 사항은 아니기 때문에 제외
         .'users.u_name'
         .',boards.b_id'
         .',boards.b_title'
         .',boards.b_content'
         .',boards.b_img'
         .' FROM boards '
         .' JOIN users'
         .' ON users.u_id = boards.u_id '
         .' WHERE '
         .' boards.b_id = :b_id '
         .' AND boards.deleted_at IS null '
         ;

         $stmt = $this->conn->prepare($sql);
         $stmt->execute($paramArr);
         return $stmt->fetch();
      }catch(Throwable $th){
         echo 'Board->getBoardList() '.$th->getMessage();
         exit;
      }
   }            
}
