/**
 * Javascript test cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

const { getWordPool, isCorrectLetter, updateDisplay, isWrongLetter, gameover, showHint } = require(
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
    const word = "TEST".toUpperCase();
    let displayedWord;

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

        expect(displayedWord.includes('_')).toBe(false);

        expect(gameover).toHaveBeenCalled();
    });
});

describe('updateDisplay', () => {
    let displayedWord;
    document.body.innerHTML = '<div id="word-display"></div>';
  
    beforeEach(() => {
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
        displayedWord[1] = 'C';
        updateDisplay();
        expect(document.getElementById('word-display').textContent).toBe('_CAB');
    });
});

jest.mock('./words.json', () => ({
    easy_words: { word1: 'hint1', word2: 'hint2' },
    medium_words: { word3: 'hint3', word4: 'hint4' },
    hard_words: { word5: 'hint5', word6: 'hint6' },
}), { virtual: true });

describe('isWrongLetter function', () => {
  let hangmanImage;
  beforeEach(() => {
    hangmanImage = document.createElement('img');
    hangmanImage.style.display = 'none';
    document.body.appendChild(hangmanImage);
    document.querySelector = jest.fn().mockReturnValue(hangmanImage);
  });

  afterEach(() => {
    document.body.removeChild(hangmanImage);
  });

  test('updates the hangman image source correctly', () => {
    for (let i = 1; i <= 9; i++) {
      isWrongLetter();
      expect(hangmanImage.src).toBe(`../../images/hangman/hangman${i}.png`);
    }
  });

  test('displays the hangman image on the first life lost', () => {
    isWrongLetter();
    expect(hangmanImage.style.display).toBe('block');
  });

  test('does not update the image source after 9 lives lost', () => {
    for (let i = 1; i <= 9; i++) {
      isWrongLetter();
    }
    const previousSrc = hangmanImage.src;
    isWrongLetter();
    expect(hangmanImage.src).toBe(previousSrc);
  });
});

describe('gameover function', () => {
    let gameOverScreen, gameContent;
  
    beforeEach(() => {
      gameOverScreen = document.createElement('div');
      gameOverScreen.classList.add('game-over-screen');
      gameContent = document.createElement('div');
      gameContent.classList.add('game-content');
      document.body.appendChild(gameOverScreen);
      document.body.appendChild(gameContent);
  
      document.querySelector = jest.fn()
        .mockReturnValueOnce(gameOverScreen)
        .mockReturnValueOnce(gameContent);
    });
  
    afterEach(() => {
      document.body.removeChild(gameOverScreen);
      document.body.removeChild(gameContent);
    });
  
    test('adds the active class to the game over screen', () => {
      gameover();
      expect(gameOverScreen.classList.contains('active')).toBe(true);
    });
  
    test('adds the blur class to the game content', () => {
      gameover();
      expect(gameContent.classList.contains('blur')).toBe(true);
    });
});

describe('showHint function', () => {
    let speechBubble;
  
    beforeEach(() => {
      speechBubble = document.createElement('div');
      speechBubble.classList.add('speech-bubble');
      speechBubble.style.display = 'none';
      document.body.appendChild(speechBubble);
  
  
      document.querySelector = jest.fn().mockReturnValue(speechBubble);
  
    
      global.wordsJSON = {
        easy_words: { word1: 'hint1', word2: 'hint2' },
        medium_words: { word3: 'hint3', word4: 'hint4' },
        hard_words: { word5: 'hint5', word6: 'hint6' },
      };
    });
  
    afterEach(() => {
      document.body.removeChild(speechBubble);
      delete global.wordsJSON;
    });
  
    test('shows the correct hint for easy difficulty', () => {
      showHint('easy');
      expect(speechBubble.textContent).toBe('hint1');
      expect(speechBubble.style.display).toBe('block');
    });
  
    test('shows the correct hint for medium difficulty', () => {
      showHint('medium');
      expect(speechBubble.textContent).toBe('hint3');
      expect(speechBubble.style.display).toBe('block');
    });
  
    test('shows the correct hint for hard difficulty', () => {
      showHint('hard');
      expect(speechBubble.textContent).toBe('hint5');
      expect(speechBubble.style.display).toBe('block');
    });
  
    test('does not show a hint for an invalid difficulty', () => {
      showHint('invalid');
      expect(speechBubble.textContent).toBe('');
      expect(speechBubble.style.display).toBe('none');
    });
});