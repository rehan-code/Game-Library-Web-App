// waldo_game.test.js

const { zoomIn, notFound, isFound, updateScoreboard } = require('../waldo_game/stages/waldo_game.js'); // replace 'yourModule' with your actual module name

describe('zoomIn function', () => {
    test('should increment score by 2', () => {
        document.body.innerHTML = `
            <div class="image-container">
                <img src="test.jpg" width="500" height="500">
            </div>
            <div class="score"></div>
        `;
        const event = {
            offsetX: 250,
            offsetY: 250
        };
        zoomIn(event);
        expect(document.querySelector('.score').innerText).toBe(12);
    });
});

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
        expect(document.querySelector('.score').innerText).toBe(11);
    });
});

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
        expect(document.querySelector('.game-over-screen').style.display).toBe('block');
        expect(document.querySelector('.image-container img').classList.contains('blur')).toBe(true);
    });
});

describe('updateScoreboard function', () => {
    test('should update score display', () => {
        document.body.innerHTML = '<div class="score"></div>';
        updateScoreboard();
        expect(document.querySelector('.score').innerText).toBe(11);
    });
});