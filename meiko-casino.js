let multiplier = 1.00;
let crashed = false;

document.getElementById('start-crash').addEventListener('click', function() {
    this.disabled = true;
    crashed = false;

    placeBet(); // We place the bet, but we do NOT start the game here
});


document.getElementById('cashout').addEventListener('click', function() {
    clearInterval(crashGameInterval);
    this.disabled = true;
    document.getElementById('start-crash').disabled = false;
    
    cashOut();
    resetGame();
});

setInterval(function() {
    if (!crashed && multiplier > 1.00) {
        crashed = true;
        alert('Crashed!');
        document.getElementById('cashout').disabled = true;
        document.getElementById('start-crash').disabled = false;
        resetGame();
    }
}, Math.floor(Math.random() * 36000) + 2000);

document.getElementById('play_roulette_animation').addEventListener('click', play_roulette_animation);

function resetGame() {
    multiplier = 1.00;
    document.getElementById('multiplier').innerText = '1.00x';
}

function placeBet() {
    let betAmount = document.getElementById('crash_bet').value;
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', meikoCasino.ajax_url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);
            if (response.error) {
                alert(response.error);
                resetGame(); // This resets the game state
                document.getElementById('start-crash').disabled = false; // Reactivate the start button
                document.getElementById('cashout').disabled = true; // Ensures the cashout button remains disabled
            } else {
                // No error from the server, it means the bet was placed successfully, so we can start the game
                startGame();
            }
        }
    };
    
    xhr.send(`action=place_crash_bet&bet_amount=${betAmount}&casino_security=${meikoCasino.security}`);
}

function startGame() {
    crashGameInterval = setInterval(function() {
        if (crashed) {
            clearInterval(crashGameInterval);
        } else {
            multiplier += 0.01;
            document.getElementById('multiplier').innerText = multiplier.toFixed(2) + 'x';
        }
    }, 100);
    
    document.getElementById('cashout').disabled = false; // Enable the cashout button only when game starts
}

function cashOut() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', meikoCasino.ajax_url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);
            if (response.error) {
                alert(response.error);
            } else {
                alert("You cashed out. New balance: $" + response.new_balance);
            }
        } else if (this.readyState === 4) {
            alert("An error occurred while cashing out.");
        }
    };
    
    xhr.send(`action=cash_out_crash&multiplier=${multiplier}&casino_security=${meikoCasino.security}`);
}

function spinRoulette(resultNumber) {
    const wheel = document.getElementById('roulette-wheel');
    
    // Determine the position to translate to based on the result number
    const translateXPosition = (100 / 20 * resultNumber) + '%';
    
    // Apply a transition to simulate the sliding effect
    wheel.style.transition = 'transform 3s ease-in-out';
    wheel.style.transform = `translateX(-${translateXPosition})`;

    // Reset and highlight after the animation finishes
    setTimeout(() => {
        wheel.style.transition = 'none';
        wheel.style.transform = `translateX(0px)`;

        // Reset highlight and then highlight the result
        const sections = wheel.getElementsByClassName('roulette-number');
        for (const section of sections) {
            section.classList.remove('highlighted');
        }
        document.querySelector(`.roulette-number[data-number="${resultNumber}"]`).classList.add('highlighted');
    }, 3000);
}

function play_roulette_animation() {
    const betAmount = parseFloat(document.getElementById('roulette_bet').value);
    const chosenColor = document.getElementById('color').value;

    // Simulate a random result number (0 to 49)
    const resultNumber = Math.floor(Math.random() * 50);

    // Get the width of a single `.roulette-number` element
    const numberWidth = document.querySelector('.roulette-number').offsetWidth;

    // Calculate the distance to move (negative because it's moving to the left)
    const moveDistance = -(numberWidth * (resultNumber + 50));

    // Animate the numbers
    const wheel = document.getElementById('roulette-wheel');
    wheel.style.transition = 'transform 3s ease-in-out';
    wheel.style.transform = `translateX(${moveDistance}px)`;

    setTimeout(() => {
        // After the animation is complete, reset everything to run it again
        wheel.style.transition = 'none';
        wheel.style.transform = 'translateX(0px)';
    }, 3000);

    // Log a message before the AJAX request
    console.log('Before AJAX request');

    // Send an AJAX request to the server to handle the game logic
    const data = {
        action: 'play_roulette_animation',
        bet_amount: betAmount,
        chosen_color: chosenColor,
        result_number: resultNumber, // Pass the result number to the server
        casino_security: meikoCasino.casino_nonce
    };

    jQuery.post(meikoCasino.ajax_url, data, function(response) {
        // Log the AJAX response
        console.log('AJAX response received');
        console.log(response); // Log the response to the console
    });
}

document.addEventListener('DOMContentLoaded', () => { // Ensure the DOM is fully loaded before executing our code
    const rouletteWheel = document.getElementById('roulette-wheel');

    rouletteWheel.addEventListener('animationiteration', () => {
        // This will trigger each time the animation completes one loop
        rouletteWheel.style.transition = 'none';  // Remove any smooth transition to instantly reset position
        rouletteWheel.style.transform = 'translateX(0)';  // Reset position instantly

        // We set a short timeout before applying the animation again, to avoid flickering
        setTimeout(() => {
            rouletteWheel.style.transition = '';  // Let it have its smooth transition again
        }, 10);
    });
});