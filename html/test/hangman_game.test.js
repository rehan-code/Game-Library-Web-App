const { getWordPool, isCorrectLetter, updateDisplay } = require(
    '../hangman/stages/hangman_game.js'
);
describe('getWordPool', () => {

    it('returns easy words for easy difficulty', () => {
        const easyWords = getWordPool('easy');
            expect(easyWords).toBeInstanceOf(Array);
            expect(easyWords.length).toBeGreaterThan(0);
            easyWords.forEach(word => {
            expect(typeof word).toBe('string');
        });
    });
    

    it('returns medium words for medium difficulty', () => {
        const mediumWords = getWordPool('medium');
            expect(mediumWords).toBeInstanceOf(Array);
            expect(mediumWords.length).toBeGreaterThan(0);
            mediumWords.forEach(word => {
            expect(typeof word).toBe('string');
        });
    });

    it('returns hard words for hard difficulty', () => {
        const hardWords = getWordPool('hard');
            expect(hardWords).toBeInstanceOf(Array);
            expect(hardWords.length).toBeGreaterThan(0);
            hardWords.forEach(word => {
            expect(typeof word).toBe('string');
        });
    });
});

describe('isCorrectLetter', () => {
    // Mock word to be guessed in the game
    const word = "TEST".toUpperCase();
    let displayedWord;

    // Function to reset the game state before each test
    beforeEach(() => {s
        displayedWord = word.split('').map(() => '_');
        global.updateDisplay = jest.fn();
        global.gameover = jest.fn();
    });

    it('correctly reveals letters when a correct letter is guessed', () => {
        isCorrectLetter('T');
        expect(displayedWord).toEqual(['T', '_', '_', 'T']);
        expect(updateDisplay).toHaveBeenCalled();
    });

    it('completes the game when all letters are guessed correctly', () => {
        isCorrectLetter('E');
        isCorrectLetter('S');
        isCorrectLetter('T');

        // The game should recognize all letters are guessed
        expect(displayedWord.includes('_')).toBe(false);

        // The gameover sequence should be triggered
        expect(gameover).toHaveBeenCalled();
    });
});

describe('updateDisplay', () => {
    let displayedWord;
    document.body.innerHTML = '<div id="word-display"></div>';
  
    beforeEach(() => {
        // Reset state before each test
        displayedWord = ['_', '_', 'A', '_', 'B'];
        global.updateDisplay = function() {
            document.getElementById('word-display').textContent = displayedWord.join(' ');
        };
    });
  
    test('correctly updates the display content', () => {
        updateDisplay();
        expect(document.getElementById('word-display').textContent).toBe('__A_B');
    });
  
    test('updates display after changing displayedWord', () => {
        displayedWord[1] = 'C'; // Change the state
        updateDisplay(); // Update the display based on the new state
        expect(document.getElementById('word-display').textContent).toBe('_CAB');
    });
});
  