import wordsJSON from './hidden_words.json' assert { type: 'json' };

document.addEventListener("DOMContentLoaded", function() {

    const words = wordsJSON.words;
    const hidden_words = pick_random_words(3, words);


    // This log is just for debugging to verify the words are being generated each time
    // index.html is loaded. Remove this once all implementation in this file is complete
    console.log("DEBUG - Randomly selected words for this user:")
    for (let i = 0; i < hidden_words.length; i++) {
        console.log("\t" + hidden_words[i]);
    }

    // Set the hidden cookie (with the words for the puzzles) if it is not set
    let cookie = getCookie("hidden");
    if (cookie == "") {
        //set the cookie that expires in one day
        setCookie("invisible", hidden_words[0], 1);
        setCookie("ascii", hidden_words[1], 1);
        setCookie("hidden", hidden_words[2], 1);
    }

});

/**
 * Generates a specified amount of random words from a word pool.
 * Ensures each word in the returned array is unique.
 * @param {*} amount - Amount of words to pick from the word pool.
 * @param {*} word_pool  Word pool to pick from.
 * @returns The array of randomly chosen words
 */
function pick_random_words(amount, word_pool) {
    var selected_words = [];

    for (let i = 0; i < amount; i++) {
        while (true) {
            var index = Math.floor(Math.random() * word_pool.length);
            var word = word_pool[index].toUpperCase();

            if (!selected_words.includes(word)) {
                selected_words.push(word);
                break;
            }
        }
    }

    return selected_words;
};

// ====================COOKIE FUNCTIONS====================

/**
 * function to set a cookie
 * @param {*} name of the cookie
 * @param {*} value that you want for the cookie
 * @param {*} exdays num of days it will be valid for
 */
function setCookie(name, value, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000)); //days after which it will expire
    let expires = "expires="+ d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
};

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
};

// ====================HIDDEN PUZZLE FUNCTIONS====================
export function getASCIIString(word) {
    let newStr = "";
    for (const letter of word) {
        newStr = newStr + letter.charCodeAt(0) + " ";
    }
    return newStr;
}