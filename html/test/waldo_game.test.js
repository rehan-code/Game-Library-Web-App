/**
 * Javascript test cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

const { zoomIn, notFound, isFound, updateScoreboard } = require(
    '../waldo_game/stages/waldo_game.js'
);

document.body.innerHTML = `
  <div class="image-container">
    <img src="your-image-source" alt="Test Image">
  </div>
`;


let isZoomed = false;


describe('Test zoomIn function', () => {
  beforeEach(() => {
    document.body.innerHTML = `
      <div class="image-container">
        <img src="your-image-source" alt="Test Image">
      </div>
    `;
    isZoomed = false;
  });

  test('should set transform origin when not zoomed', () => {
    const mockEvent = {
      offsetX: 50,
      offsetY: 50,
    };
    zoomIn(mockEvent);
    const image = document.querySelector('.image-container img');
    expect(image.style.transformOrigin).not.toBe('');
  });
});

/**
 * Tests if score reduces on the I-Spot stages
 */
describe('notFound function', () => {
    test('should decrement score by 1', () => {
        document.body.innerHTML = `
            <div class="game-over-screen"></div>
            <div class="image-container">
                <img src="test.jpg">
            </div>
            <div class="score"></div>
        `;
        const event = {
            target: document.createElement('div')
        };
        notFound(event);
        expect(document.querySelector('.score').innerText).toBe(9);
    });
});

/**
 * Checks if the game over page displays on game over
 */
describe('isFound function', () => {
    test('should display game over screen', () => {
        document.body.innerHTML = `
            <div class="game-over-screen"></div>
            <div class="image-container">
                <img src="test.jpg">
            </div>
        `;
        const event = {
            stopPropagation: jest.fn()
        };
        isFound(event);
        expect(document.querySelector('.game-over-screen').style.display)
            .toBe('block');
        expect(document.querySelector('.image-container img')
            .classList.contains('blur')).toBe(true);
    });
});

/**
 * Checks if the scoreboard updates appro
 */
describe('updateScoreboard function', () => {
    test('should update score display', () => {
        document.body.innerHTML = '<div class="score"></div>';
        updateScoreboard();
        expect(document.querySelector('.score').innerText).toBe(9);
    });
});