<?php
/**
 * Cryptogram Front End Test Cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
use PHPUnit\Framework\TestCase;

/**
 * Front end unit tests for Cryptogram Page
 */
class CryptogramTest extends TestCase
{
    /**
     * Checks if the CSS file for the Cryptogram game exists.
     */
    public function testCryptogramCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../cryptogram/game/cryptogram.css');
    }

    /**
     * Checks if the congrats CSS file exists for the game completion.
     */
    public function testCongratsCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../cryptogram/congrats/congrats.css');
    }

    /**
     * Checks if the navbar component exists.
     */
    public function testNavbarComponentExists()
    {
        $this->assertFileExists(__DIR__ . '/../components/navbar/navbar.php');
    }

    /**
     * Check if the main cryptogram PHP file itself exists (sanity check).
     */
    public function testCryptogramPHPFileExists()
    {
        // Assuming a main PHP file for the Cryptogram exists
        $this->assertFileExists(__DIR__ . '/../cryptogram/game/cryptogram.php');
    }

    /**
     * Checks if the JavaScript file for the Cryptogram game exists.
     */
    public function testCryptogramJsFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../cryptogram/game/cryptogram.js');
    }
}

?>
