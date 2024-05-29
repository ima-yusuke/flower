let inpContainer = document.getElementById("answerInp");
let createInpBtn = document.getElementById("createInpBtn");

createInpBtn.addEventListener("click",function (){
    let newInp = document.createElement("input");
    newInp.classList.add("newAnswer")
    inpContainer.appendChild(newInp);
})
