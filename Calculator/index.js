//Calculator Program

const display = document.getElementById("display");

function appendToDisplay(input){
    display.value += input ; //+= can enter many digit not one only to incre as many value user press
}

function clearDisplay(){
    display.value = null;
}

function calculate(){
    try{
        display.value = eval(display.value);
    }catch(err){
        display.value="error";
    }
}
