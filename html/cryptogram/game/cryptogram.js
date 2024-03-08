document.addEventListener('DOMContentLoaded', function() {
    const sentence = "This is a sample cryptogram puzzle. Edit below!";
    const cryptogramContainer = document.getElementById('cryptogram');

    function generateCryptogram(sentence) {
        // Split the sentence into words and iterate over them
        const words = sentence.toUpperCase().split(' ');
        const wordsHTML = words.map(word => {
            const letterContainers = word.split('').map(char => `
                <div class="letter-container">
                    <div class="block">${char}</div>
                    <div class="input-block"><input type="text" maxlength="1"></div>
                </div>
            `).join('');

            return `<div class="word">${letterContainers}</div>`;
        }).join('');

        cryptogramContainer.innerHTML = wordsHTML;
    }

    generateCryptogram(sentence);
});
