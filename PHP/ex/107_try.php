<?php

try{
    echo "try문 시작";
    //예외나 에러가 발생할 수 있는 소스코드를 작성
    5/0;

    echo "try문 끝";
}catch(Throwable $th){
    //try문에서 예외나 에러코드가 발생했을 때 실행할 소스코드를 작성
    echo " catch문 예외 발생";
}finally{ //예외가 발생하든 안하든 무조건 출력됨
    echo " finally";
}