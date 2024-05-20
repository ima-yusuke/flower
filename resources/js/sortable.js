// --------------------------------[質問並び替え]-------------------------------------------------

window.onload = (e)=>{
    console.log("onload!!");

    // 1, SortableJS
    const elem = document.getElementById("my_sortable");
    Sortable.create(elem, {
        animation: 150,
        onStart:  onStartEvent,  // 2-1, ドラッグ開始時
        onEnd:    onEndEvent,    // 2-2, ドラッグ終了時
        onChange: onChangeEvent, // 2-3, ドラッグ変化時
        onSort:   onSortEvent    // 2-4, 並び替え終了時
    });
}

function onStartEvent(e){
    console.log("onStart!!");
}

function onEndEvent(e){
    console.log("onEnd!!");
}

function onChangeEvent(e){
    console.log("onChange!!");
}

function onSortEvent(e){
    console.log("onSort!!");
    // 3, 並び替え後のエレメントを確認
    const items = e.target.querySelectorAll("li");
    for(let i=0; i<items.length; i++){
        console.log(items[i].getAttribute("id"));
    }
}

// --------------------------------[回答並び替え]-------------------------------------------------

let questions = document.getElementsByClassName("qa__item");
let editBtns = document.getElementsByClassName("editBtn");

for (let i=0;i<questions.length;i++){
    editBtns[i].addEventListener("click",function (){
        const elem = document.getElementsByClassName("answer_sortable");
        Sortable.create(elem[i], {
            animation: 150,
            onStart:  onStartEvent,  // 2-1, ドラッグ開始時
            onEnd:    onEndEvent,    // 2-2, ドラッグ終了時
            onChange: onChangeEvent, // 2-3, ドラッグ変化時
            onSort:   onSortEventAnswer   // 2-4, 並び替え終了時
        });
    })
}


function onSortEventAnswer(e){
    console.log("onSort!!");
    // 3, 並び替え後のエレメントを確認
    const items = e.target.querySelectorAll("p");
    console.log(items)
    for(let i=0; i<items.length; i++){
        console.log(items[i].getAttribute("id"));
    }
}