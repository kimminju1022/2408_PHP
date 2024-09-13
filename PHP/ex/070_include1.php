<?php

/** 다른 파일 불러오기
 * include :해당파일을 불러온다 (중복작성할 경우 여러번 불러온다)
 * include_once : 해당파일을 불러온다 (중복작성할 경우 딱 한번만 불러온다)
 * include 공통점 :  오류 발생 시 프로그램을 정지하지 않고 처리 진행
  */
// include("./070_include2.php");

// echo "include 1111\n";

/** require
 * require : 해당파일을 불러온다 (중복작성 시 여러번 불러온다)
 * require_once : 해당 파일을 불러온다 (중복작성 시 딱 한 번 불러온다)
 * require 공통점 : 오류 발생 시프로그램 정지
 */

 require_once("./070_include2.php");
 require_once("./070_include2.php");

 echo "include 1111\n";
 echo my_sum(1,2);
 