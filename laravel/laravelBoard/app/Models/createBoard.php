<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class freeBoard extends Model
{
    use HasFactory;
    // 자료 입력
    public function getBoardList($paramArr)
    {
       try {
          $sql =
             ' SELECT * '
             . ' FROM boards '
             . ' WHERE '
             . ' bc_type = :bc_type '
             . ' AND deleted_at IS NULL '
             . ' ORDER BY '
             . ' created_at DESC, b_id DESC ';
 
          $stmt = $this->conn->prepare($sql);
          $stmt->execute($paramArr);
          return $stmt->fetchAll();
       } catch (Throwable $th) {
          echo 'Board->getBoardList() ' . $th->getMessage();
          exit;
       }
    }
 
    public function getBoardDetail($paramArr)
    {
       try {
          $sql =
             ' SELECT '
             // .'users.u_id' 조인에 사용했고 출력할 사항은 아니기 때문에 제외
             . 'users.u_name'
             . ',boards.b_id'
             . ',boards.b_title'
             . ',boards.b_content'
             . ',boards.b_img'
             . ' FROM boards '
             . ' JOIN users'
             . ' ON users.u_id = boards.u_id '
             . ' WHERE '
             . ' boards.b_id = :b_id '
             . ' AND boards.deleted_at IS null ';
 
          $stmt = $this->conn->prepare($sql);
          $stmt->execute($paramArr);
          return $stmt->fetch();
       } catch (Throwable $th) {
          echo 'Board->getBoardList() ' . $th->getMessage();
          exit;
       }
    }
 
    public function insertBoard(array $paramArr)
    {
       try {
          $sql =
             ' INSERT INTO boards( '
             . '         u_id '
             . '         ,bc_type '
             . '         ,b_title '
             . '         ,b_content '
             . '         ,b_img '
             . ' ) '
             .' VALUES( '
             . '         :u_id '
             . '         ,:bc_type '
             . '         ,:b_title '
             . '         ,:b_content '
             . '         ,:b_img '
             . ' ) '
             ;
 
             $stmt = $this->conn->prepare($sql);
             $stmt->execute($paramArr);
             return $stmt->rowCount();
       } catch (Throwable $th) {
          echo 'Board->getBoardList() ' . $th->getMessage();
          exit;
       }
    }
}
