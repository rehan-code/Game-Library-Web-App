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
    beforeEach(() => {
        // Initialize or reset the displayedWord to all underscores
        displayedWord = word.split('').map(() => '_');

        // Mock the updateDisplay function to prevent actual DOM manipulation
        global.updateDisplay = jest.fn();

        // Mock the gameover function to prevent actual game over sequence
        global.gameover = jest.fn();
    });

    it('correctly reveals letters when a correct letter is guessed', () => {
        // Simulate guessing a correct letter
        isCorrectLetter('T'); // Assuming isCorrectLetter is globally accessible

        // 'T' should now be revealed in the displayedWord
        expect(displayedWord).toEqual(['T', '_', '_', 'T']);
        // Ensure the display is updated
        expect(updateDisplay).toHaveBeenCalled();
    });

    it('completes the game when all letters are guessed correctly', () => {
        // Simulate guessing all correct letters
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
    // Mock the initial setup
    let displayedWord;
    document.body.innerHTML = '<div id="word-display"></div>'; // Simulate the part of the DOM manipulated by updateDisplay
  
    beforeEach(() => {
        // Reset state before each test
        displayedWord = ['_', '_', 'A', '_', 'B'];
        global.updateDisplay = function() {
            document.getElementById('word-display').textContent = displayedWord.join(' ');
        };
    });
  
    test('correctly updates the display content', () => {
        updateDisplay(); // Call the function
        expect(document.getElementById('word-display').textContent).toBe('__A_B');
    });
  
    test('updates display after changing displayedWord', () => {
        // Simulate guessing a letter correctly
        displayedWord[1] = 'C'; // Change the state
        updateDisplay(); // Update the display based on the new state
        expect(document.getElementById('word-display').textContent).toBe('_CAB');
    });
});
  