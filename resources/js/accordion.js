let btns = document.querySelectorAll('.editBtn');

btns.forEach(btn => {
    btn.addEventListener('click', function() {
        // 現在表示している要素を再度クリックした場合はそのアコーディオンを閉じる
        let selected_qa_body = btn.parentNode.parentNode.nextElementSibling;
        if(selected_qa_body.classList.contains('visible')){
            selected_qa_body.classList.remove('visible')
        }else {
            // 全てを一度非表示
            for (let i = 0; i < btns.length; i++) {
                let tmpBody =  btns[i].parentNode.parentNode.nextElementSibling;
                tmpBody.classList.remove('visible')
            }

            // クリックされた要素のみ表示
            selected_qa_body.classList.add('visible');
        }
    });
});



