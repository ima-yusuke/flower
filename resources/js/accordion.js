import Quill from "quill";
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';
import Axios from "axios";

let btns = document.querySelectorAll('.editBtn');//編集ボタン
let editorContainers = document.getElementsByClassName("editor");//Quill挿入箇所
let quill = null; // Quillインスタンスを保持する変数

btns.forEach((btn,idx) => {
    btn.addEventListener('click', function() {

        let selected_qa_body = btn.parentNode.parentNode.nextElementSibling;//アコーディオン中身

        // 現在表示している要素を再度クリックした場合はそのアコーディオンを閉じる
        if(selected_qa_body.classList.contains('visible')){
            selected_qa_body.classList.remove('visible')
            btn.innerHTML = "編集"
        }else {
            // 全てを一度非表示
            for (let i = 0; i < btns.length; i++) {
                let tmpBody =  btns[i].parentNode.parentNode.nextElementSibling;
                tmpBody.classList.remove('visible')
                btns[i].innerHTML = "編集"
            }

            // クリックされた要素のみ表示
            selected_qa_body.classList.add('visible');
            btn.innerHTML = "閉じる";

            // Quill実装
            deleteQuill(idx)
            createQuill(idx,btn)
        }
    });

});

// Quill削除
function deleteQuill(idx){
    let quillDiv = editorContainers[idx];
    while(quillDiv.firstChild){
        quillDiv.removeChild(quillDiv.firstChild)
    }

    if (quill) {
        quill.off(); // イベントリスナーを解除
        let quillContainer = document.querySelector('.ql-container');
        if (quillContainer) {
            quillContainer.parentNode.removeChild(quillContainer);
        }
        quill = null;
    }

}

// Quill作成
function createQuill(idx,btn){

    // 編集用Quill(リッチテキスト)作成
    let quillDiv = document.createElement("div");
    quillDiv.setAttribute("id", "editor");

    // タイトル作成
    let p = document.createElement("p");
    p.classList.add("quillTitle")
    if(btn.classList.contains("addProductBtn")){
        p.innerHTML = "6.商品詳細";
    }else{
        p.innerHTML = "4.商品詳細";
    }

    // 選択されたアコーディオンにappend
    editorContainers[idx].appendChild(p);
    editorContainers[idx].appendChild(quillDiv);

    // Quill設定
    quill=new Quill('#editor', {
        modules: {
            toolbar: [
                [{ header: [1, 2,3,4,5,6,false] },],
                [{'size':[]}],
                [{ 'font': [] }],
                ['bold', 'italic', 'underline','strike'],
                ['blockquote'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'color': [] }, { 'background': [] }],

                [{ 'align': [] }],
                ["image"],

                //URLリンク
                ['link'] ,
                ['clean']
            ],
        },
        placeholder: 'こちらにご入力ください...',
        theme: 'snow', // or 'bubble'
        bounds: document.body
    });
}


let btn = document.getElementById('submit_btn');
let newImg = null;
let flag = false;
let tmpData = null;
//====================================[imgボタンをクリックしたときの処理]============================================

function selectLocalImage() {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute("accept", "image/*");
    input.click();

    // Listen upload local image and save to server
    input.onchange = () => {
        const file = input.files[0];

        // FileReader インスタンスを作成
        const reader = new FileReader();

        // 読み込みが完了したときの処理
        reader.onload = () => {

            // プロパティを使用して読み込んだデータにアクセスする
            const base64String = reader.result;
            newImg = base64String;

            // 現在のカーソル位置に画像データを追加
            if(newImg !== null) {
                // 挿入する位置を取得
                let index = getCurrentIndex();
                // 画像を挿入する
                quill.insertEmbed(index, 'image', newImg);
            }
            tmpData = quill.getContents().ops;
            showdata()
        };

        // ここで読み込みが完了したときに onload イベントが発生し、上記コールバック関数が呼び出される。
        reader.readAsDataURL(file);
    };
}

// toolbarのimageをクリックしたときに下記selectLocalImage()が実行される
quill.getModule('toolbar').addHandler('image', () => {
    selectLocalImage();
});

// ====================[エディター内にデータを表示する]==========================
function showdata() {

    // json_data:すでにデータべースに保存されてるデータ
    let json_data = null;
    if(flag === false) {
        json_data = Laravel.data;
    }else{
        json_data = tmpData;
    }
    console.log(json_data)

    let setdata = []
    json_data.forEach((value, idx) => {
        if(flag===false) {
            setdata.push({"insert": JSON.parse(value["insert"]), "attributes": JSON.parse(value["attributions"])})
        }else{
            setdata.push({"insert": value["insert"], "attributes": value["attributes"]})
        }
    })

    //データを表示
    quill.setContents(setdata);
    newImg = null;
    flag = true;
}

showdata()

// ======================================[現在のカーソル位置取得]================================================================
function getCurrentIndex() {
    // 現在のカーソル位置を取得
    let selection = quill.getSelection();
    if(selection) {
        return selection.index;
    } else {
        return 0; // カーソル位置がない場合は0を返す
    }
}
// ======================================[データをlaravelへ受け渡し]================================================================

btn.addEventListener('click', () => {
    senddata(btn);
})

// ======================================[データ受け渡しfunction]================================================================

function senddata(btn){
    const ops = quill.getContents().ops;

    const id = document.getElementById("selected_id").value;

    const datas =[];

    ops.forEach((value)=>{
        if(value.attributes!=="undefined") {
            datas.push({"insert": JSON.stringify(value.insert), "attributes": value.attributes});
        }
    })

    const senddata ={
        "id":id,
        "ops":datas
    }

    const route = btn.getAttribute('data-route');

    Axios.post(route, senddata, {
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(
        alert("登録完了"),
        response => console.log(response.data)
    ).catch(
        error => console.log(error)
    )
}
