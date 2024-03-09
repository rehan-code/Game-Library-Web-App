import { getCookie } from "../hidden_words.js";

document.addEventListener('DOMContentLoaded', (event) => {
    // const wordContainer = document.getElementById('wordContainer');
    // const word = wordContainer.getAttribute('data-word')
    // convert word to binary
    const word = getCookie('binary');
    let binary = '';

    for (let i = 0; i < word.length; i++) {
        binary += word[i].charCodeAt(0).toString(2) + ' ';
    }

    document.getElementById('binaryOutput').innerText = binary.trim();
});