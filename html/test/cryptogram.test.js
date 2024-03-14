/**
 * Javascript test cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

import { setupInputHandlers, generateCryptogram } from '../cryptogram/game/cryptogram.js';

test('setupInputHandlers - all inputs with same data-encrypted value update together', () => {
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
  
    // Call the function to setup input handlers
    setupInputHandlers();
  
    // Set the value of the first input to 'B'
    const inputElements = document.querySelectorAll('#cryptogram .letter-container input');
    inputElements[0].value = 'B';
    inputElements[0].dispatchEvent(new Event('input'));
  
    // Assert that the value of the second input is also 'B'
    expect(inputElements[1].value).toBe('B');
  });
  
  test('generateCryptogram generates correct HTML structure', () => {
    document.body.innerHTML = `<div id="cryptogram"></div>`;

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
  