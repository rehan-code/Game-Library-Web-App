<?php
/**
 * Hangman Stage 1 Test Cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
use PHPUnit\Framework\TestCase;
/**
 * Front end unit tests for Hangman Stage 1 Page
 */
class HangmanStage1Test extends TestCase
{
    /**
     * Checks if the CSS file for the Hangman game exists.
     */
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../style.css');
    }

    /**
     * Checks if the navbar component exists.
     */
    public function testNavbarComponentExists()
    {
        $this->assertFileExists(__DIR__ . '/../components/navbar/navbar.php');
    }

    /**
     * Check if the hangman_select.php file itself exists (sanity check)
     */
    public function testPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../hangman/stages/hangman_stage_1.php');
    }

    /**
     * Checks if the JavaScript file for the Hangman game exists.
     * Assuming there's a JavaScript file specific to the Hangman game.
     */
    public function testJsFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../hangman/stages/hangman_game.js');
    }

    /**
     * Checks if the image for Hangman Stage 1 exists.
     * Assuming there's a specific image used in the Hangman Stage 1.
     */
    public function testHangmanStage1ImageExists()
    {
        $this->assertFileExists(__DIR__ . '/../images/hangman/hangman1.png');
    }
}

?>
