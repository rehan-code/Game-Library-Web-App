document.addEventListener("DOMContentLoaded", function() {

    // const words = wordsJSON.words;
    // const hidden_words = pick_random_words(3, words);

    // Set the hidden cookie (with the words for the puzzles) if it is not set
    if (getCookie("invisible") == "" || getCookie("ascii") == "" || getCookie("binary") == "") {
        //set the cookie that expires in one day
        var hidden_words = getWords();
        setCookie("invisible", hidden_words[0], 1);
        setCookie("ascii", hidden_words[1], 1);
        setCookie("binary", hidden_words[2], 1);
    }

    // if it is authenticated then update the text to the story
    if (getCookie("authenticated") == "true") {
        document.querySelector('.main-heading').innerHTML = "";
        document.querySelector('.main-heading').appendChild(document.createRange().createContextualFragment(
            `<h2><span>The Detective Chronicles</span><h2>
            <h3>―The Loose Ends―<h3>`
        ));
        document.getElementById('landing-text').innerHTML = "";
        document.getElementById('landing-text').appendChild(document.createRange().createContextualFragment(
        "<p style='text-align: justify;'><strong>Farmer’s Secret</strong><br><br>I uncovered several " +
        "alarming details in the file. Firstly, it contained information about the illegal slaughter " +
        "of animals. The photographs of these slaughterhouses depicted a deplorable state, indicating " +
        "a lack of funding for proper maintenance and an inability to acquire suitable equipment " + 
        "for the humane treatment of animals. The meat from these <span style='color: #fafbfb;'>illicit</span> " +
        "operations was being distributed to an unidentified individual, a practice that had persisted for a " +
        "while.<br><br>Furthermore, the file contained data on individuals who had gone missing. Despite the " +
        "cases being officially closed with no concrete evidence found, the file included " +
        "photographs of these missing persons. Upon closer examination, it became evident that " +
        "the evidence within this file had never been brought to light. The food safety department " +
        "escalated the situation to the authorities, who dispatched a police officer to arrest the " +
        "farmer for illegal animal slaughter and for further investigation.</p>"));
        document.getElementById('invisible-word').remove();
    } else {
        setInvisibleWord();
    }

    // add the event listener for hidden words input
    const form = document.querySelector('.submission-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault()
        validateWords()
    });

});

// ====================COOKIE FUNCTIONS====================

/**
 * function to set a cookie
 * @param {*} name of the cookie
 * @param {*} value that you want for the cookie
 * @param {*} exdays num of days it will be valid for
 */
export function setCookie(name, value, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000)); //days after which it will expire
    let expires = "expires="+ d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

/**
 * function to get the values of a cookie. taken from https://www.w3schools.com/js/js_cookies.asp
 * @param {*} cname The name of the cookie you are trying to get
 * @returns empty string when not found or the value of the cookie
 */
export function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
}

// ====================HIDDEN PUZZLE FUNCTIONS====================
/**
 * function converts the letters in a string to its ascii value counterparts
 * @param {*} word to convert to its ascii values
 * @returns space seperated list of ascii values
 */
export function getASCIIString(word) {
    let newStr = "";
    for (const letter of word) {
        newStr = newStr + letter.charCodeAt(0) + " ";
    }
    return newStr;
}

/**
 * checks whether the words inputed into hidden words 
 * text boxes match the cookie values
 * @returns true if all words match (in any order) or false otherwise
 */
function validateWords() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        console.log(this.responseText)
        var data = JSON.parse(this.responseText);
        if (data['error'] == null) {
            let secretWords = data['result'].map(word => word.toLowerCase()).sort();
        
            if (getCookie("authenticated") == "true") {
                secretWords = [
                    "illicit",
                    "dispatched",
                    "labyrinth",    
                ].map(word => word.toLowerCase()).sort();
            }
        
            const inputWords = [
                document.querySelector('#secret_one').value,
                document.querySelector('#secret_two').value,
                document.querySelector('#secret_three').value,    
            ].map(word => word.toLowerCase()).sort();
        
            if (secretWords.join(',') === inputWords.join(',')) {
                if (getCookie("authenticated") == "true") {
                    window.location.href = "./cryptogram/game/cryptogram.php?secret=true";
                } else {
                    window.location.href = "./hidden_words/secret_page/secret_page.php";
                }
            } else {
                alert('Those aren\'t the right secrets! Keep looking!');
            }
        } else {
            alert(data['error']);
        }
    }
    xhttp.open("POST", "../authentication/authenticate.php", false);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({
        "functionname": 'decrypt_words',
        "words": [
            getCookie('invisible'),
            getCookie('ascii'),
            getCookie('binary')
        ]
    }));


    
}


function getWords() {
    var words;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var data = JSON.parse(this.responseText);
        if (data['error'] == null) {
            words = data['result']
        } else {
            alert(data['error']);
        }
    }
    xhttp.open("POST", "../authentication/authenticate.php", false);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({
        "functionname": 'get_words',
    }));

    return words;
}

function setInvisibleWord() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var data = JSON.parse(this.responseText);
        if (data['error'] == null) {
            document.getElementById('invisible-word').innerText = data['result'];
        } else {
            alert(data['error']);
        }
    }
    xhttp.open("POST", "../authentication/authenticate.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({
        "functionname": 'decrypt',
        "word": getCookie('invisible')
    }));
}