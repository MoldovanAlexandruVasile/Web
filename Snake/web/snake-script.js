var snakeArray = [];
var direction = "right";
var timeOutFood;

var minutesLabel;
var secondsLabel;
var activeCount = true;
var totalSeconds = 0;

function isValid() {
    var head = snakeArray[snakeArray.length - 1];
    var height = document.getElementById('container').clientHeight;
    var width = document.getElementById('container').clientWidth;
    console.log(height);
    console.log(head.offsetLeft);
    if (head.offsetLeft > 0 && head.offsetLeft < width && head.offsetTop > 0 && head.offsetTop < height) {
        for (var i = 0; i < snakeArray.length - 1; i++) {
            if (head.offsetLeft == snakeArray[i].offsetLeft && head.offsetTop == snakeArray[i].offsetTop) {
                return false;
            }
        }
        return true;
    } else {
        return false;
    }
}

function addNewDivToSnakeArray() {
    var container = document.getElementById('container');
    var newDiv = document.createElement('div');
    var head = snakeArray[snakeArray.length - 1];
    if (direction == 'right') {
        newDiv.style.left = head.offsetLeft + 10 + 'px';
        newDiv.style.top = head.offsetTop + 'px';
    }
    if (direction == 'left') {
        newDiv.style.left = head.offsetLeft - 10 + 'px';
        newDiv.style.top = head.offsetTop + 'px';
    }
    if (direction == 'up') {
        newDiv.style.top = head.offsetTop - 10 + 'px';
        newDiv.style.left = head.offsetLeft + 'px';
    }
    if (direction == 'down') {
        newDiv.style.top = head.offsetTop + 10 + 'px';
        newDiv.style.left = head.offsetLeft + 'px';
    }
    newDiv.style.position = 'absolute';
    newDiv.style.width = '10px';
    newDiv.style.height = '10px';
    newDiv.style.backgroundColor = 'green';
    snakeArray.push(newDiv);
    container.appendChild(newDiv);
}

function isEating() {                                            /* verificam daca sarpele mananca un fruct*/
    var head = snakeArray[snakeArray.length - 1];
    var food = document.getElementById('food');
    if (head.offsetLeft == food.offsetLeft && head.offsetTop == food.offsetTop) {
        addNewDivToSnakeArray();
        clearTimeout(timeOutFood);
        createFood();
    }
}

document.onkeydown = function (e) {
    switch (e.keyCode) {
        case 37:
            changeDirection('left');
            break;
        case 38:
            changeDirection('up');
            break;
        case 39:
            changeDirection('right');
            break;
        case 40:
            changeDirection('down');
            break;
    }
}

function changeDirection(dir) {                                  /* dir - directia primitia ca parametru */
    if (direction == 'right' && dir != 'left') {
        direction = dir;
    }
    if (direction == 'left' && dir != 'right') {
        direction = dir;
    }
    if (direction == 'up' && dir != 'down') {
        direction = dir;
    }
    if (direction == 'down' && dir != 'up') {
        direction = dir;
    }
}

function move() {

    var head = snakeArray[snakeArray.length - 1];
    /* primul element din sarpe */
    if (isValid()) {
        var tail = snakeArray.shift();
        /* ultimul element din sarpe*/
        if (direction == 'right') {
            tail.style.left = head.offsetLeft + 10 + 'px';
            tail.style.top = head.offsetTop + 'px';
        }
        if (direction == 'left') {
            tail.style.left = head.offsetLeft - 10 + 'px';
            tail.style.top = head.offsetTop + 'px';
        }
        if (direction == 'up') {
            tail.style.top = head.offsetTop - 10 + 'px';
            tail.style.left = head.offsetLeft + 'px';
        }
        if (direction == 'down') {
            tail.style.top = head.offsetTop + 10 + 'px';
            tail.style.left = head.offsetLeft + 'px';
        }
        snakeArray.push(tail);
        isEating();
        setTimeout(move, 200);
    } else {
        clearTimeout(timeOutFood);
        activeCount = false;
        alert("You have lost!");
    }

}

function createFood() {
    var container = document.getElementById('container');
    if (document.getElementById('food')) {
        container.removeChild(document.getElementById('food'));
    }
    var height = container.clientHeight;
    var width = container.clientWidth;
    var positionLeft = Math.floor((Math.random() * (width / 10 - 1)) + 1) * 10;
    /* aflam pozitia unde trebuie randata mancarea */
    var positionTop = Math.floor((Math.random() * (height / 10 - 1)) + 1) * 10;
    var food = document.createElement('div');
    /* creez div-ul care reprezinta mancarea */
    food.setAttribute('id', 'food');
    food.style.position = 'absolute';
    food.style.left = positionLeft + 'px';
    food.style.top = positionTop + 'px';
    food.style.width = '10px';
    food.style.height = '10px';
    food.style.backgroundColor = 'red';
    food.style.borderRadius = '100%';
    container.appendChild(food);
    timeOutFood = setTimeout(createFood, 20000);
}

function init() {
    createFood();

    minutesLabel = document.getElementById("minutes");
    secondsLabel = document.getElementById("seconds");
    setInterval(setTime, 1000);

    var body_snake = document.getElementById('body_snake');
    snakeArray.push(body_snake);

    move();
}


function setTime() {
    if (activeCount) {
        ++totalSeconds;
        secondsLabel.innerHTML = pad(totalSeconds % 60);
        minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
    }
}

function pad(val) {
    var valString = val + "";
    if (valString.length < 2) {
        return "0" + valString;
    } else {
        return valString;
    }
}