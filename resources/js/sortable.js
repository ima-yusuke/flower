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
    const items = e.target.querySelectorAll("li div.qa__head div p");
    for(let i=0; i<items.length; i++){
        let str = items[i].innerHTML;
        // 旧番号と"."を削除
        items[i].innerHTML = str.slice( 2 )
        // 並び替えた最新の番号を書き込み
        items[i].innerHTML = `${i+1}. ${items[i].innerHTML}`;
    }
}

// --------------------------------[回答並び替え]-------------------------------------------------

let questions = document.getElementsByClassName("qa__item");

for (let i=0;i<questions.length;i++){
    const elem = document.getElementsByClassName("answer_sortable");
    Sortable.create(elem[i], {
        animation: 150,
        onStart:  onStartEvent,  // 2-1, ドラッグ開始時
        onEnd:    onEndEvent,    // 2-2, ドラッグ終了時
        onChange: onChangeEvent, // 2-3, ドラッグ変化時
        onSort:   onSortEventAnswer   // 2-4, 並び替え終了時
    });
}

function onSortEventAnswer(e){
    console.log("onSort!!");
    // 3, 並び替え後のエレメントを確認
    const items = e.target.querySelectorAll("aside p");
    for(let i=0; i<items.length; i++){
        let str = items[i].innerHTML;
        // 旧番号と"."を削除
        items[i].innerHTML = str.slice( 2 )
        // 並び替えた最新の番号を書き込み
        items[i].innerHTML = `${i+1}. ${items[i].innerHTML}`;
    }
}
