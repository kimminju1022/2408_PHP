<?php

//세션은 반드시 시작할 때 세션 시작 구문을 작성하여야 한다(단, 세션 시작 전에 출력처리[echo,vadump 등]가 있으면 안된다)
session_start();

$_SESSION['test_seeeion']='세션1';

echo $_SESSION['test_seeeion'];