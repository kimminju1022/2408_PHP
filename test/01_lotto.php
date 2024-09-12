<?php

/** 로또번호 생성기
 * <규칙>                               <코드 계획>
 * 1~45 까지 번호가 있다                 * 1 ~ 45 까지의 숫자를 담은 배열을 생성
 * 랜덤 번호 6개를 출력                  * 배열에 속한 수를 랜덤 추출
 * 단, 번호는 중복되지 않는다             * 추출된 값을 리턴하는 코드를 만들자!
 */

/** 사용코드 및 고민코드별 정의
 * implode() 함수 : PHP에서 배열의 요소를 문자열로 결합하는 데 사용
 * sort()의 기능
    * 오름차순 정렬: sort()는 기본적으로 숫자 또는 문자열을 오름차순으로 정렬
    * 키가 재배치됨: 배열의 인덱스는 재배치되며, 0부터 시작하는 연속된 숫자를 배치. (연관 배열의 경우 키도 함께 정렬되지 않으므로 주의!!)
    * 원본 배열 수정: sort() 함수는 원본 배열을 직접 수정하여 정렬된 결과를 저장
 * in_array: 배열에 특정 값이 존재하는지 확인하는 함수로 주어진 값이 배열에 존재하면 true, 그렇지 않으면 false를 반환
 * array_rand: 배열에서 랜덤하게 하나 이상의 키를 선택하는 함수. 기본적으로 단일 키를 반환하지만, 선택할 키의 개수를 지정할 수도 있음
 * array_diff: 두 개 이상의 배열을 비교하여, 첫 번째 배열에만 존재하는 값들을 반환하는 함수로 다른 배열에 포함되지 않는 첫 번째 배열의 요소들을 찾아서 결과 배열로 제공
 */
/**작성 시 의문사항
 * count($lotto_lucky) < 5를 쓰면 4개가 저장되어야 한다 생각함 (초기에 <6을 사용)
 * 5인 이유 : 
    * 배열의 요소 개수가 5보다 작은지 확인하는 조건으로 이 조건이 참일 때만 코드 블록이 실행됨
      즉, 이 조건문은 배열이 5개의 요소를 가지게 될 때까지 계속 실행된다.
      1. 배열이 빈 상태에서 시작
      2. 배열에 요소를 추가할 때마다 count($lotto_lucky)의 값이 증가
      3. 배열의 요소 개수가 5개가 될 때까지, 즉 count($lotto_lucky)가 5가 될 때까지 반복문이 계속 실행
      4. 요소의 개수가 5개가 되면, 조건 count($lotto_lucky) < 5는 거짓이 되어 반복문이 종료
      5. 결론적으로, count($lotto_lucky) < 5 조건이 참일 때는 배열에 5개의 요소를 채우기 위한 반복이 계속됨
         따라서 최종적으로 배열 $lotto_lucky에는 5개의 고유한 번호가 저장된다.
 */

// 1부터 45까지의 숫자를 배열에 저장
$lotto_num = range(1, 45);

// 5개의 번호가 중복되지 않게 추출
$lotto_lucky = [];
while (count($lotto_lucky) < 5) {
    $randomIndex = array_rand($lotto_num);
    $randomNumber = $lotto_num[$randomIndex];
    if (!in_array($randomNumber, $lotto_lucky)) {
        $lotto_lucky[] = $randomNumber;
    }
}

// 추출한 5개의 번호를 배열에서 제거한 나머지 번호를 재배열
$vonus_num = array_diff($lotto_num, $lotto_lucky);

// 나머지 번호 중에서 추가로 1개를 추출
$vonus_luck = $vonus_num[array_rand($vonus_num)];

// 결과를 정렬하여 출력
sort($lotto_lucky);
echo "오늘의 행운 번호: ".implode(", ", $lotto_lucky) ." 보너스 번호: " . $vonus_luck;
