let toggleOn = false;
document.getElementById("hover").addEventListener('click', ()=>{
    toggleOn?document.getElementById("hover").style.transform = "translate(5px, -50%)":document.getElementById("hover").style.transform = "translate(calc(100% - 5px), -50%)";
    toggleOn?(showHidden("calories"), hideShown("protein")):(showHidden("protein"), hideShown("calories"));
    toggleOn?(document.getElementById("calorieValue").style.display = 'block', document.getElementById("proteinValue").style.display = 'none'):(document.getElementById("proteinValue").style.display = 'block', document.getElementById("calorieValue").style.display = 'none');
    toggleOn = !toggleOn;
})

function showHidden(classname){
    Array.from(document.getElementsByClassName(classname)).forEach((item)=>{
        item.style.display = "block";
    })
}

function hideShown(classname){
    Array.from(document.getElementsByClassName(classname)).forEach((item)=>{
        item.style.display = "none";
    })
}

let addInputToggleOn = true;

if(document.getElementById("input--button")){
    document.getElementById("input--button").addEventListener('click', ()=>{
        toggleInput();
    })
}

document.getElementById("close").addEventListener('click', ()=>{
    toggleInput();
})

function toggleInput(){
    addInputToggleOn?(document.getElementById("addInputContainer").style.display = "block", document.getElementById("blur").style.display = "block"):(document.getElementById("addInputContainer").style.display = "none", document.getElementById("blur").style.display = "none");
    addInputToggleOn = !addInputToggleOn;
}