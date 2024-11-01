

// 설명쓰기
const BTN_CALL = document.querySelector('#btn_call');
BTN_CALL.addEventListener('click',getList);

function getList(){
    const URL = document.querySelector('#url').value;
    console.log(URL);

    //get
    axios.get(URL)
    .then(response => {
        // console.log(response);
        response.data.forEach(item => {
            // console.log(item.downlad_url);
            const NEW = document.createElement('img');
            NEW.setAttribute('src', item.download_url);
            NEW.style.width = '200px';
            NEW.style.height = '200px';
            
            document.querySelector('.container').appendChild(NEW);
        });
    })
    .catch(error => {
        console.log(error);
    });
    /** .을 사용한 체이닝 메서드
    .then()
    .catch() */
    
    // promise -> reserve / resect 가 있다

}