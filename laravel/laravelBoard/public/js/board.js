(()=>{
    document.querySelectorAll('.my-btn-detail').forEach(node=>{
        node.addEventListener('click',e=>{
            // console.log(e.target.value); --게시글 번호 확인
            const url = 'boards/'+e.target.value;

            axios.get(url)
            .then(response =>{
                // console.log(response);
                const modalTitle = document.querySelector('#modalTitle');
                const modalContent = document.querySelector('#modalContent');
                const modalCreatedAt = document.querySelector('#modalCreatedAt');
                const modalImg = document.querySelector('#modalImg');
                const modalDeleteParent = document.querySelector('#modalDeleteParent');

                modalTitle.textContent = response.data.b_title;
                modalContent.textContent = response.data.b_content;
                modalCreatedAt.textContent = response.data.created_at;
                modalImg.setAttribute('src',response.data.b_img);

                modalDeleteParent.textContent = '';
                // if로 작성글 일치 체크
                if(response.data.delete_flg){
                    const newButton = document.createElement('button');
                    //11.15 3:44듣기
                    newButton.textContent = '삭제'
                    newButton.setAttribute('type','button');
                    newButton.setAttribute('class','btn btn-warning');
                    newButton.setAttribute('onclick',`boardDestroy(${e.target.value})`);
                    newButton.setAttribute('data-bs-dismiss','modal');

                    modalDeleteParent.appendChild(newButton)
                }
            })
            .catch(error => {
                console.error(error);
            });
        });
    })

})();

function redirectInsert($type){
    window.location='/boards/create?bc_type=' + $type;
}

function boardDestroy($id){
// url만들어주기~
    const url ='/boards/'+$id;

    axios.delete(url)
    .then(response=>{
        if(response.data.success){
            const deleteNode = document.querySelector('#card'+$id)
            deleteNode.remove();
        }else{
            alert('삭제 실패');
        }
        // 카드 화면에서 삭제
        // const deleteNode = document.querySelector('#card'+$id);
        // console.log(deletenode);
    })
    .catch(error =>{
        console.log(error);
        alert('에러발생');

    });
}