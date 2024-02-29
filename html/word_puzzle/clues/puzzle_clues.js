document.addEventListener('DOMContentLoaded', (event) => {
    const wordContainer = document.getElementById('wordContainer');
    const word = wordContainer.getAttribute('data-word');
    // document.getElementById('displayText').innerText = word;

    let binary = '';
    for (let i = 0; i < word.length; i++) {
        binary += word[i].charCodeAt(0).toString(2) + ' ';
    }
    document.getElementById('binaryOutput').innerText = binary.trim();
});