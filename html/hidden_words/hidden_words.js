import wordsJSON from './hidden_words.json' assert { type: 'json' };

document.addEventListener("DOMContentLoaded", function() {
    
    const words = wordsJSON.words;
    const hidden_words = pick_random_words(3, words);

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
    }


    // This log is just for debugging to verify the words are being generated each time
    // index.html is loaded. Remove this once all implementation in this file is complete
    for (let i = 0; i < hidden_words.length; i++) {
        console.log(hidden_words[i]);
    }

    // Once cookies are implemented, they should be storing the words within hidden_words

});
