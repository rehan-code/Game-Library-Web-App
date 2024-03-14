/**
 * Javascript test cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

const originalModule = require('../hangman/stages/hangman_game.js');

jest.mock('../hangman/stages/hangman_game.js', () => {
    const originalModule = jest.requireActual('../hangman/stages/hangman_game.js');
    return {
        ...originalModule,
        getWordPool: jest.fn(),
        isCorrectLetter: jest.fn(),
        updateDisplay: jest.fn(),
        isWrongLetter: jest.fn(),
        gameover: jest.fn(),
        showHint: jest.fn()
    };
});

const {
    getWordPool,
    isCorrectLetter,
    updateDisplay,
    isWrongLetter,
    gameover,
    showHint
} = require('../hangman/stages/hangman_game.js');

jest.mock('./words.json', () => ({
  easy_words: { word1: 'hint1', word2: 'hint2' },
  medium_words: { word3: 'hint3', word4: 'hint4' },
  hard_words: { word5: 'hint5', word6: 'hint6' },
}), { virtual: true });

describe('getWordPool', () => {
  it('returns easy words for easy difficulty', () => {
      getWordPool.mockReturnValue(['easy_word1', 'easy_word2']);
      const easyWords = getWordPool('easy');
      expect(easyWords).toEqual(['easy_word1', 'easy_word2']);
  });

  it('returns medium words for medium difficulty', () => {
      getWordPool.mockReturnValue(['medium_word1', 'medium_word2']);
      const mediumWords = getWordPool('medium');
      expect(mediumWords).toEqual(['medium_word1', 'medium_word2']);
  });

  it('returns hard words for hard difficulty', () => {
      getWordPool.mockReturnValue(['hard_word1', 'hard_word2']);
      const hardWords = getWordPool('hard');
      expect(hardWords).toEqual(['hard_word1', 'hard_word2']);
  });
});

describe('isCorrectLetter', () => {
  let word;
  let displayedWord;

  beforeEach(() => {
    word = "TEST";
    displayedWord = ['_', '_', '_', '_'];
  });

  it('correctly reveals letters when a correct letter is guessed', () => {
    isCorrectLetter('T');
    expect(displayedWord).toEqual(['T', '_', '_', 'T']);
  });

  it('does not change displayedWord when an incorrect letter is guessed', () => {
    isCorrectLetter('A');
    expect(displayedWord).toEqual(['_', '_', '_', '_']);
  })
});

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
      done();
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
