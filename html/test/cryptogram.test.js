import { setupInputHandlers, generateCryptogram } from '../cryptogram/game/cryptogram.js';

test('setupInputHandlers - all inputs with same data-encrypted value update together', () => {
    // Setup mock DOM
    document.body.innerHTML = `
      <div id="cryptogram">
        <div class="letter-container" data-encrypted="A">
          <input type="text">
        </div>
        <div class="letter-container" data-encrypted="A">
          <input type="text">
        </div>
      </div>
    `;
  
    // Call function to setup handlers
    setupInputHandlers();
  
    // Simulate input on the first input element
    const inputElements = document.querySelectorAll('#cryptogram .letter-container input');
    inputElements[0].value = 'B';
    inputElements[0].dispatchEvent(new Event('input'));
  
    // Assert that the second input's value is also 'B'
    expect(inputElements[1].value).toBe('B');
  });
  
  test('generateCryptogram generates correct HTML structure', () => {
    // Setup mock DOM
    document.body.innerHTML = `<div id="cryptogram"></div>`;
  
    // Provide a test sentence and letter mapping
    const testSentence = 'AB';
    const testMapping = { A: 'X', B: 'Y' };
  
    // Expected HTML output
    const expectedHTML = `
      <div class="word">
        <div class="letter-container" data-encrypted="X">
          <div class="block">X</div>
          <div class="input-block"><input type="text" maxlength="1"></div>
        </div>
        <div class="letter-container" data-encrypted="Y">
          <div class="block">Y</div>
          <div class="input-block"><input type="text" maxlength="1"></div>
        </div>
      </div>
    `;
  
    // Call function to generate cryptogram
    generateCryptogram(testSentence, testMapping);
  
    // Assert that the generated HTML matches expected
    expect(document.getElementById('cryptogram').innerHTML.trim()).toBe(expectedHTML.trim());
  });
  