import "flowbite";

const questionContainer = document.getElementById('quiz')
const resultContainer = document.getElementById('result')
const confirmContainer = document.getElementById("confirm");
const reconfirm = document.getElementById("reconfirm");
const imgContainer = document.getElementById("tmpImg");

let currentQuestionIndex = 0;
let flag = false;

// ------------------------------[①質問開始]---------------------------------------------------

const startButton = document.getElementById('start-btn')

startButton.addEventListener('click', () => {
    startQuiz();
})

function startQuiz() {
    let startDiv = startButton.parentNode;
    startDiv.classList.add('hide')
    resultContainer.classList.add('hide')
    questionContainer.classList.remove('hide')
    showQuestion()
    countQuestions()
}
// ------------------------------[②残り質問数計算＆表示 / 削除]---------------------------------------------------
function countQuestions(){
    removeCountQuestion();
    let totalQuestions = questions.length;
    let header = document.getElementById("header");
    let newDiv = document.createElement("div");

    newDiv.innerText =  "質問 "+Number(currentQuestionIndex+1)+"問目/"+totalQuestions+"問中";
    header.appendChild(newDiv);
}

function removeCountQuestion(){
    let header = document.getElementById("header");
    let divToRemove = header.querySelector("div");
    if (divToRemove) {
        divToRemove.remove();
    }
}

// ------------------------------[③質問&回答作成]---------------------------------------------------

const questionElement = document.getElementById('question')
const answerButtonsElement = document.getElementById('answer-buttons')

function showQuestion() {

    // 質問作成
    questionElement.innerText = questions[currentQuestionIndex]["question"]

    // 回答選択肢作成
    createOptions()
}

// ------------------------------[④質問選択]---------------------------------------------------
let answersValueArray = [];

function selectAnswer(selectedBtn) {

    // 配列に選択されたボタンのtextを追加
    answersValueArray.push(selectedBtn);

    // まだ残りの質問があるかチェック
    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++
        resetState()
        countQuestions()
        showQuestion()
        showResult();
    } else {
        flag = true;
        removeCountQuestion()
        showConfirm()
    }
}

// ------------------------------[⑤確認画面の表示]---------------------------------------------------

function showConfirm(){
    confirmContainer.classList.remove("hide");
    questionContainer.classList.add('hide');
    createConfirmContainer()
}

// ------------------------------[⑥結果の表示/ 画像作成]---------------------------------------------------

const confirmBtn = document.getElementById("confirm-btn");

confirmBtn.addEventListener("click",showResult);

function showResult() {

   let maxIndex = calMaxIdx()

    // 現在の画像を削除
    resetImage();

    // 新規画像を作成
    createImage(products[maxIndex]["img"])

    // 全ての回答を終えた場合のみ実行
    if(flag === true){
        confirmContainer.classList.add('hide');
        resultContainer.classList.remove('hide');

        // 結果画面詳細作成
        createResult(maxIndex)
    }
}

// ------------------------------[⑦リスタート]---------------------------------------------------

const restartButton = document.getElementById('restart-btn')

// もう一度診断するのボタンをクリック
restartButton.addEventListener('click', () => {
    resultContainer.classList.add('hide')
    startButton.parentNode.classList.remove('hide')
    currentQuestionIndex = 0;
    answersValueArray =[];
    flag = false;
    resetState();
    resetConfirm();
    resetImage();
    createImage('/img/box.jpg');
})

// -----------------------[スコア計算]-------------------------
function calMaxIdx(){
    let maxCount = 0; // 最大のincludes()カウント
    let maxIndex = null; // 最大のincludes()カウントが見つかったインデックス

    for (let i = 0; i < products.length; i++) {
        let count = 0; // includes()が真に評価された回数をカウントする変数

        // includes()のカウントを計算
        for (let b = 0; b < answersValueArray.length; b++) {
            if (products[i]["attributes"].includes(answersValueArray[b])) {
                count++; // includes()が真に評価されたらカウントを増やす
            }
        }

        // プライオリティの計算
        count += products[i]["priority"];

        // より大きいカウントが見つかった場合は更新
        if (count > maxCount) {
            maxCount = count;
            maxIndex = i;
        }
    }
    return maxIndex;
}

// --------------------------[作成]-------------------------------

// 選択肢作成
function createOptions(){
    let optionsArray = questions[currentQuestionIndex]["answer"]

    // 設問
    optionsArray.forEach((value,idx) => {
        // ボタンタグを生成して、設問を挿入
        const button = document.createElement('button')
        const div = document.createElement('div')
        const num = document.createElement('span')
        const text = document.createElement('span')
        const arrow = document.createElement('span')
        num.innerText = idx+1;
        num.classList.add("rounded-circle")
        text.innerText = value;
        arrow.innerText = "▶";
        div.appendChild(num);
        div.appendChild(text)
        button.appendChild(div)
        button.appendChild(arrow);
        button.classList.add("option-btn")
        answerButtonsElement.appendChild(button)

        // 選択肢をクリックをする
        button.addEventListener('click', ()=>{
            selectAnswer(value);
        })
    })
}

// 選択内容確認画面
function createConfirmContainer(){
    for(let i=0;i<questions.length;i++){
        const container = document.createElement('div')
        const answerContainer = document.createElement('div')
        const answerDiv = document.createElement('div')
        const arrowIcon = document.createElement("p");
        const num = document.createElement('span')
        const text = document.createElement('span')
        const question = document.createElement("p");
        const questionNum = document.createElement("span");
        // 選択した回答
        num.innerText = i+1;
        num.classList.add("rounded-circle")
        text.innerText = answersValueArray[i];
        answerDiv.appendChild(num);
        answerDiv.appendChild(text)
        arrowIcon.innerText = "▶"
        answerContainer.classList.add("confirm-answer");
        answerContainer.appendChild(answerDiv)
        answerContainer.appendChild(arrowIcon);
        // 質問文と番号
        questionNum.innerText = i+1+"問目";
        questionNum.classList.add("confirm-span");
        question.innerText = questions[i]["question"];
        question.insertBefore(questionNum,question.firstChild)
        // コンテイナーに追加
        container.appendChild(question);
        container.appendChild(answerContainer)
        container.classList.add("confirm-container")
        reconfirm.appendChild(container);
    }
}

// 質問横の画像作成
function createImage(imgSrc){
    let newImage = document.createElement("img");
    newImage.src = imgSrc;
    newImage.style.width = 100+"%";
    newImage.style.height = 100+"%";
    imgContainer.appendChild(newImage)
}

function createResult(maxIndex){
    let span = document.getElementsByClassName("p_name")[0];
    span.innerText = products[maxIndex]["name"];

    let selectedImg = document.getElementById("selectedImg");
    selectedImg.src = products[maxIndex]["img"];

    let detail = document.getElementsByClassName("p_detail")[0];
    detail.innerText = products[maxIndex]["detail"];
}

// ------------------------------[リセット]---------------------------------------------------

// 現在表示している質問を全て削除し、新規で質問作成
function resetState() {
    while (answerButtonsElement.firstChild) {
        answerButtonsElement.removeChild(answerButtonsElement.firstChild)
    }
}

// おすすめ画像を削除
function resetImage(){
    while(imgContainer.firstChild){
        imgContainer.removeChild(imgContainer.firstChild);
    }
}

// 選択内容確認画面のdivをリセット時に消去
function resetConfirm() {
    while (reconfirm.firstChild) {
        reconfirm.removeChild(reconfirm.firstChild)
    }
}


