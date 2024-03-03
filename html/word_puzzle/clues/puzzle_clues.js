import { getCookie } from "../../hidden_words/hidden_words.js";

document.addEventListener('DOMContentLoaded', (event) => {
    // const wordContainer = document.getElementById('wordContainer');
    // const word = wordContainer.getAttribute('data-word')
    // convert word to binary
    const word = getCookie('hidden');
    console.log("BINARY WORD = " + getCookie('hidden'));

    let binary = '';
    for (let i = 0; i < word.length; i++) {
        binary += word[i].charCodeAt(0).toString(2) + ' ';
    }
    document.getElementById('binaryOutput').innerText = binary.trim();
});
document.addEventListener('DOMContentLoaded', (event) => {
    // make word invisible
    const word2 = getCookie('invisible');
    console.log("Invisible = " + getCookie('invisible'));
    document.getElementById('invisible-word').innerText = word2;
    console.log("ASCII  = " + getCookie("ascii"));
});