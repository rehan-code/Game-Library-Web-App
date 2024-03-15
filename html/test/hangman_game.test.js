/**
 * Javascript test cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

const originalModule = require('../hangman/stages/hangman_game.js');

jest.mock('../hangman/words.json', () => ({
  easy_words: { word1: 'hint1', word2: 'hint2' },
  medium_words: { word3: 'hint3', word4: 'hint4' },
  hard_words: { word5: 'hint5', word6: 'hint6' },
}), { virtual: true });

import { 
  getWordPool,
  isWrongLetter,
  gameover
} from '../hangman/stages/hangman_game'; 

describe('getWordPool', () => {
  it('returns easy words for easy difficulty', () => {
      const easyWords = getWordPool('easy');
      expect(easyWords).toEqual(['word1', 'word2']);
  });

  it('returns medium words for medium difficulty', () => {
      const mediumWords = getWordPool('medium');
      expect(mediumWords).toEqual(['word3', 'word4']);
  });

  it('returns hard words for hard difficulty', () => {
      const hardWords = getWordPool('hard');
      expect(hardWords).toEqual(['word5', 'word6']);
  });
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
      expect(hangmanImage.src).toBe(`http://localhost/images/hangman/hangman${i}.png`);
    }
  });

  test('displays the hangman image on the first life lost', () => {
    isWrongLetter();
    expect(hangmanImage.style.display).toBe('none');
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
