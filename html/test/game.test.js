const { zoomIn, notFound, isFound } = require('./game');

// Mocking the DOM elements
document.querySelector = jest.fn().mockImplementation(selector => {
  if (selector === '.score') {
    return { innerText: '' };
  } else if (selector === '.image-container') {
    return { classList: { toggle: jest.fn() }, style: {} };
  } else if (selector === '.image-container img') {
    return { width: 100, height: 100, style: { transformOrigin: '' } };
  } else if (selector === '.game-over-screen') {
    return { style: { display: 'none' } };
  }
});

// Mocking the global score variable
let score = 10;

// Mocking the updateScoreboard function
function updateScoreboard() {
  document.querySelector('.score').innerText = score;
}

describe('Game Module Tests', () => {
  beforeEach(() => {
    // Reset score and mocks before each test
    score = 10;
    document.querySelector.mockClear();
  });

  test('zoomIn increases score and updates scoreboard', () => {
    const mockEvent = { offsetX: 50, offsetY: 50 };
    zoomIn(mockEvent);
    expect(score).toBe(12); // Score should increase by 2
    expect(document.querySelector('.score').innerText).toBe('12');
  });

  test('notFound decreases score and updates scoreboard', () => {
    const mockEvent = { target: { className: '' } };
    notFound(mockEvent);
    expect(score).toBe(9); // Score should decrease by 1
    expect(document.querySelector('.score').innerText).toBe('9');
  });

  test('isFound displays game over screen', () => {
    isFound();
    expect(document.querySelector('.game-over-screen').style.display).toBe('block');
  });
});
