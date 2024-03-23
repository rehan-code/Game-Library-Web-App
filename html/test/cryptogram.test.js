const originalModule = require('../cryptogram/game/cryptogram.js');

jest.mock('../hangman/stages/hangman_game.js', () => {
    const originalModule = jest.requireActual('../cryptogram/game/cryptogram.js');
    return {
        ...originalModule,
        setupInputHandlers: jest.fn(),
        generateCryptogram: jest.fn(),
        createLetterMapping: jest.fn()
    };
});

const {
  setupInputHandlers, generateCryptogram, createLetterMapping
} = require('../hangman/stages/hangman_game.js');

describe('Cryptogram Functions', () => {
  beforeEach(() => {
      document.body.innerHTML = `
          <div id="cryptogram">
          </div>
      `;
  });

  afterEach(() => {
      document.body.innerHTML = '';
  });

  test('setupInputHandlers updates inputs correctly', () => {
      document.getElementById('cryptogram').innerHTML = `
          <div class="letter-container" data-encrypted="A">
              <input type="text" value="">
          </div>
          <div class="letter-container" data-encrypted="B">
              <input type="text" value="">
          </div>
      `;

      setupInputHandlers();

      const input = document.querySelector('.letter-container[data-encrypted="A"] input');
      input.value = 'X';
      input.dispatchEvent(new Event('input'));

      const updatedInputs = document.querySelectorAll('.letter-container[data-encrypted="A"] input');
      updatedInputs.forEach(input => {
          expect(input.value).toBe('X');
      });
    });
  });

  describe('generateCryptogram function', () => {
    test('generateCryptogram generates correct HTML', () => {
        // Create a container element to hold the cryptogram
        const cryptogramContainer = document.createElement('div');
        cryptogramContainer.id = 'cryptogram';
        document.body.appendChild(cryptogramContainer);

        const sentence = "Hello, World!";
        const letterMapping = {
            'H': 'X',
            'E': 'Y',
            'L': 'Z',
            'O': 'W',
            ',': ',',
            ' ': ' ',
            'W': 'O',
            'R': 'L',
            'D': 'R',
        };

        generateCryptogram(sentence, letterMapping);

        cryptogramContainer.childNodes.forEach((wordContainer, wordIndex) => {
            wordContainer.childNodes.forEach((letterContainer, letterIndex) => {
                const encryptedChar = letterContainer.dataset.encrypted;
                const blockContent = letterContainer.querySelector('.block').textContent;
                const inputContent = letterContainer.querySelector('input').value;

                if (encryptedChar in letterMapping) {
                    expect(blockContent).toBe(encryptedChar);
                    expect(inputContent).toBe('');
                } else {
                    expect(blockContent).toBe(sentence[wordIndex * 6 + letterIndex]);
                    expect(inputContent).toBeUndefined();
                }
            });
        });
    });
});