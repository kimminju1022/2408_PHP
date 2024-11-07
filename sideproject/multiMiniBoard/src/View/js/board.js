(() => {
    document.querySelectorAll('.my-btn-detail').forEach(node => {
        node.addEventListener('click', e => {
            // console.log(e.target.value);
            const URL = '/boards/detail?b_id= ' + e.target.value;
            // console.log(URL);
            axios.get(URL)
                .then(response => {
                    console.log(response)
                    const NAME = document.querySelector('#modalUserName');
                    const TITLE = document.querySelector('#modalTitle');
                    const CONTENT = document.querySelector('#modalContent');
                    const IMG = document.querySelector('#modalImg');

                    TITLE.textContent = response.data.b_title;
                    CONTENT.textContent = response.data.b_content;
                    IMG.setAttribute('src', response.data.b_img);
                    NAME.textContent = response.data.u_name;
                })
                .catch(error => {
                    console.error(error);
                })
        });
    });
    const BTN_INSERT = document.querySelector('#btnInsert')
    BTN_INSERT.addEventListener('click', ()=> {
        window.location = '/boards/insert?bc_type='+ document.querySelector("#inputBoardType").value;
    });
})();