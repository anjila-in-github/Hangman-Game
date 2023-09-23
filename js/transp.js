//Initial References
const letterContainer = document.getElementById("letter-container");
const optionsContainer = document.getElementById("options-container");
const userInputSection = document.getElementById("user-input-section");
const newGameContainer = document.getElementById("new-game-container");
const newGameButton = document.getElementById("new-game-button");
const canvas = document.getElementById("canvas");
const resultText = document.getElementById("result-text");

//Hint
var buttons = document.getElementById("hint");
buttons.innerHTML = '<img src="../images/hint.jpg" />';

//Values 
var options = {
    Start: [
        "Truck",
        "Bicycle",
        "Ambulance",
        "Helicopter",
        "Van",
        "Lorry",
        "Subway",
        "Tractor",
        "Train",
    ],
};

//Count
let winCount = 0;
let count = 0;

let chosenWord = "";

//Display 
const displayOptions = () => {
    optionsContainer.innerHTML += `<h3>Guess <h2>TRANSPORTATIONS</h2><h3> If You DARE <i class="fa fa-skull"></i> !</h3></h3>`;
    let buttonCon = document.createElement("div");
    for (let value in options) {
        buttonCon.innerHTML += `<button class="options" onclick="generateWord('${value}')"><i class="fas fa-play"></i>${value}</button>`;
    }
    optionsContainer.appendChild(buttonCon);
};

//Block all the Buttons
const blocker = () => {
    let optionsButtons = document.querySelectorAll(".options");
    let letterButtons = document.querySelectorAll(".letters");

    //disable all options
    optionsButtons.forEach(button => {
        button.disabled = true;
    });

    //disabled all letters
    letterButtons.forEach((button) => {
        button.disabled.true;
    });
    newGameContainer.classList.remove("hide");
};


//Code for Timer
var timerElement = document.getElementById('timer');
var timeLeft = 60;
var countdownInterval;

function startTimer() {
    countdownInterval = setInterval(updateTimer, 1000);
}

function updateTimer() {
    timeLeft--;
    timerElement.textContent = timeLeft;

    if (timeLeft === 0) {
        clearInterval(countdownInterval);
        timerElement.textContent = "Time's Up!";
        resultText.innerHTML = `<h2 class='lose-msg'>You Died!!</h2><p>The word was <span>${chosenWord}</span></p>`;
        blocker();
    }
}

//Stoping Timer
function myStopFunction() {
    clearInterval(countdownInterval);
}

//Reset Timer
function resetTimer() {
    clearInterval(countdownInterval);
    timeLeft = 60;
    timerElement.textContent = "You're time starts now";
}

//Line above canvas
var LivesP = document.getElementById('lives');
function reset(){
    LivesP.textContent = "";
}

//Word Generator
const generateWord = (optionValue) => {
    startTimer();
    reset();
    let optionsButtons = document.querySelectorAll(".options");

    //If option value matches the button innerText then highlight the button
    optionsButtons.forEach((button) => {
        if (button.innerText.toLowerCase() === optionValue) {
            button.classList.add("active");
        }
        button.disabled = true;
    });

    //initially hide letters,clear previous word
    letterContainer.classList.remove("hide");
    userInputSection.innerText = "";
    let optionArray = options[optionValue];

    //choose random word and hint
    var i = Math.floor(Math.random() * optionArray.length);
    chosenWord = optionArray[i];
    chosenWord = chosenWord.toUpperCase();
    console.log(chosenWord);

    var getHint = document.querySelector("#hint");
    var showClue = document.getElementById("clue");

    var hints = [
        "Heavy road vehicle used to carrying loads",
        "Vehicle cosists of two wheels",
        "A medically equipped vehicle",
        "Type of Air craft",
        "Type of road vehicle",
        "Synonym for the word 'truck'",
        "An underground railway",
        "Vehicle used on farm or worksite",
        "A vehicle that run on a railway track"
    ];
    getHint.onclick = function () {
        //  showClue.textContent=i;
        showClue.textContent = "Hint: - " + hints[i];
    };

    //Clear Hint
    clearhint=function() {
        showClue.textContent = "";
    };

    //replace every letter with span  containing dash
    let displayItem = chosenWord.replace(/./g, '<span class="dashes">_</span>');

    //Display each element as span
    userInputSection.innerHTML = displayItem;
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
    for (let i = 65; i < 91; i++) {
        let button = document.createElement("button");
        button.classList.add("letters");
        //Number to ASCII[A-Z]
        button.innerText = String.fromCharCode(i);
        //character button click
        button.addEventListener("click", () => {
            let charArray = chosenWord.split("");
            let dashes = document.getElementsByClassName("dashes");
            //if array contains clicked value replace the matched dash with letter else draw on canvas
            if (charArray.includes(button.innerText)) {
                charArray.forEach((char, index) => {
                    //if character in array is same as clicked button
                    if (char === button.innerText) {
                        //replace dash with letters
                        dashes[index].innerText = char;
                        //increment counter
                        winCount += 1;

                        //if wincount equals to word length
                        if (winCount == charArray.length) {
                            myStopFunction();
                            resultText.innerHTML = `<h2 class='win-msg'>You Won!!</h2><p>The word was <span>${chosenWord}</span></p>`;

                            var scoreElement = document.getElementById("score");
                            var currentScore = parseInt(scoreElement.innerText);
                            var newScore = currentScore + 20;
                            scoreElement.innerText = newScore;

                            // Assuming you have a variable called 'winCount' and 'wordLength' that holds the win count and word length respectively    
                            var levelBox = document.getElementById('level');
                            levelBox.textContent = winCount === charArray.length ? parseInt(levelBox.textContent) + 1 : levelBox.textContent;

                            // Call the updateLevelBox function whenever the win count changes
                            // For example, you can call it inside a function that handles the win condition
                            // updateLevelBox();

                            // Assuming you have already defined the winCount and wordLength variables

                            //block all buttons
                            blocker();
                        }
                    }
                });
            } else {
                //loose count
                count += 1;
                //for drawing man
                drawMan(count);
                //count==6 because head,body,left arm,right arm,left leg,right leg
                console.log(count);
                if (count == 6) {
                    clearInterval(countdownInterval);
                    timerElement.textContent = "Time's Up!";
                    resultText.innerHTML = `<h2 class='lose-msg'>You Died!!</h2><p>The word was <span>${chosenWord}</span></p>`;
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
    let { initialDrawing } = canvasCreator();
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
        context.lineTo(toX, toY);
        context.stroke();
    };

    const head = () => {
        context.beginPath();
        context.arc(70, 30, 10, 0, Math.PI * 2, true);
        context.stroke();
    };

    const body = () => {
        drawline(70, 40, 70, 80);
    };

    const leftArm = () => {
        drawline(70, 50, 50, 70);
    };

    const rightArm = () => {
        drawline(70, 50, 90, 70);


    };
    const leftleg = () => {
        drawline(70, 80, 50, 110);
    };

    const rightleg = () => {
        drawline(70, 80, 90, 110);
    };

    //initial frame
    const initialDrawing = () => {
        //clear canvas
        context.clearRect(0, 0, context.canvas.width, context.canvas.height);
        //bottom line
        drawline(10, 130, 130, 130);
        //left line
        drawline(10, 10, 10, 131);
        //top line
        drawline(10, 10, 70, 10);
        //small top line
        drawline(70, 10, 70, 20);
    };

    return { initialDrawing, head, body, leftArm, rightArm, leftleg, rightleg };
};

//draw the man
const drawMan = (count) => {
    let { head, body, leftArm, rightArm, leftleg, rightleg } = canvasCreator();
    switch (count) {
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
            rightArm();
            break;
        case 5:
            leftleg();
            break;
        case 6:
            rightleg();
            break;
        default:
            break;
    }
}

//New Game
newGameButton.addEventListener("click", initializer);
window.onload = initializer;