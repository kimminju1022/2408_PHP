<?php

class Shark{
    public $name;

    //생성자 (construct) -> 메소드 명이 정해져있다
    // 객체를 인스턴스화 할 때 최초 1회만 실행되는 메소드
    public function __construct($name){
        $this->name = $name;
        $this->info();
    }
 // private 메소드 정의
 private function info() {
    echo "Shark's name is " . $this->name;
}
}