//Initial References
const letterContainer = document.getElementById("letter-container");
const optionsContainer = document.getElementById("options-container");
const userInputSection = document.getElementById("user-input-section");
const newGameContainer = document.getElementById("new-game-container");
const newGameButton = document.getElementById("new-game-button");
const canvas = document.getElementById("canvas");
const resultText = document.getElementById("result-text");

//Options value for button
let options={
    Start:[
        "Sparrow",
        "Crow",
        "Dove",
        "Parrot",
        "Vulture",
        "Eagle",
        "Kingfisher",
        "Ostrich",
        "Turkey",
        "Flamingo",
    ],
};

//count
let winCount = 0;
let count = 0;

let  chosenWord = "";

//Display option buttons
const displayOptions = () => {
    optionsContainer.innerHTML += `<h3>Guess Me, If You</h3> <h1>DARE <i class="fa fa-skull"></i> !</h1>`;
    let buttonCon = document.createElement("div");
    for(let value in options){
        buttonCon.innerHTML += `<button class="options" onclick="generateWord('${value}')">${value}</button>`;
    }
    optionsContainer.appendChild(buttonCon);
};

//Block all the Buttons
const blocker = () => {
    let optionsButtons = document.querySelectorAll(".options");
    let letterButtons = document.querySelectorAll(".letters");

    //disable all options
    optionsButtons.forEach(button =>{
        button.disabled = true;
    });

    //disabled all letters
    letterButtons.forEach((button) =>{
        button.disabled.true;
    });
    newGameContainer.classList.remove("hide");
};

//Word Generator
const generateWord = (optionValue) => {
    let optionsButtons = document.querySelectorAll(".options");
    
    //If option value matches the button innerText then highlight the button
    optionsButtons.forEach((button)=>{
        if(button.innerText.toLowerCase()===optionValue){
            button.classList.add("active");
        }
        button.disabled = true;
    });

    //initially hide letters,clear previous word
    letterContainer.classList.remove("hide");
    userInputSection.innerText = "";
    let optionArray = options[optionValue];

    //choose random word
    chosenWord = optionArray[Math.floor(Math.random() * optionArray.length)];
    chosenWord = chosenWord.toUpperCase();
    console.log(chosenWord);


     //replace every letter with span  containing dash
     let displayItem = chosenWord.replace(/./g,'<span class="dashes">_</span>');

     //Display each element as span
     userInputSection. innerHTML = displayItem;
};

//Initial function (Called when page loads/user presses new game)
const initializer = () => {
    winCount = 0;
    count = 0;
    
     //Initially erase all content and hide letters and new game button
     userInputSection.innerHTML = "";
     optionsContainer.innerHTML = "";
     letterContainer.classList.add("hide");
     newGameContainer.classList.add("hide");
     letterContainer.innerHTML = "";

    //For creating letter buttons
    for(let i =65; i<91; i++){
        let button = document.createElement("button");
        button.classList.add("letters");
        //Number to ASCII[A-Z]
        button.innerText = String.fromCharCode(i);
         //character button click
         button.addEventListener("click",()=>{
            let charArray = chosenWord.split("");
            let dashes = document.getElementsByClassName("dashes");
            //if array contains clicked value replace the matched dash with letter else draw on canvas
            if(charArray.includes(button.innerText)){
                charArray.forEach((char,index) => {
                    //if character in array is same as clicked button
                    if(char ===button.innerText){
                        //replace dash with letters
                        dashes[index].innerText = char;
                        //increment counter
                        winCount += 1;
                        //if wincount equals to word length
                        if(winCount==charArray.length){
                            resultText.innerHTML=`<h2 class='win-msg'>You Won!!</h2><p>The word was <span>${chosenWord}</span></p>`;
                            //block all buttons
                            blocker();
                        }
                    }
                });
            }else{
            //loose count
            count += 1;
            //for drawing man
            drawMan(count);
            //count==6 because head,body,left arm,right arm,left leg,right leg
            console.log(count);
             if(count==6){
                resultText.innerHTML=`<h2 class='lose-msg'>You Died!!</h2><p>The word was <span>${chosenWord}</span></p>`;
                    blocker();
                }
            }        
            //disabled clicked button
            button.disabled = true;    
    });
        letterContainer.append(button);
    }

    displayOptions();
    //call to canvasCreator(for clearing previous canvas and creating initial canvas)
    let{ initialDrawing }  = canvasCreator();
    //initialDrawing would draw the frame
    initialDrawing();
};
//canvas
const canvasCreator = () => {
    let context = canvas.getContext("2d");
    context.beginPath();
    context.strokeStyle = "#000";
    context.lineWidth = 3;

    //for drawing lines
    const drawline = (fromX, fromY, toX, toY) => {
        context.moveTo(fromX, fromY);
        context.lineTo(toX,toY);
        context.stroke();
    };

    const head = () => {
        context.beginPath();
        context.arc(70,30,10,0,Math.PI*2,true);
        context.stroke();
    };

    const body = () => {
        drawline(70,40,70,80);
    };

    const leftArm = () => {
        drawline(70,50,50,70);
    };

    const rightArm = () => {
        drawline(70,50,90,70);


};
const leftleg= () => {
    drawline(70,80,50,110);
};

const rightleg= () => {
    drawline(70,80,90,110);
    };

    //initial frame
    const initialDrawing = () => {
    //clear canvas
    context.clearRect(0,0,context.canvas.width,context.canvas.height);
    //bottom line
    drawline(10,130,130,130);
    //left line
    drawline(10,10,10,131);
    //top line
    drawline(10,10,70,10);
    //small top line
    drawline(70,10,70,20);
    };

    return{initialDrawing, head,body, leftArm,rightArm,leftleg,rightleg};
};

//draw the man
const drawMan =(count) => {
    let{head,body,leftArm,rightArm,leftleg,rightleg} = canvasCreator();
    switch (count){
        case 1:
           head();
            break;
        case 2:
             body();
             break;
        case 3:
            leftArm();
            break;
        case 4:
           rightArm () ;
           break;
        case 5:
            leftleg();
            break;
        case 6:
            rightleg();
            break ;
        default:
             break;
    }
}

//New Game
newGameButton.addEventListener("click",initializer);
   window.onload = initializer;