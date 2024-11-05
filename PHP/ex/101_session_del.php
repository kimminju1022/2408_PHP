<?php

//세션은 반드시 시작할 때 세션 시작 구문을 작성하여야 한다(단, 세션 시작 전에 출력처리[echo,vadump 등]가 있으면 안된다)
session_start();

/** 로그아웃
 * 세션 삭제 */
session_destroy(); //세션파기