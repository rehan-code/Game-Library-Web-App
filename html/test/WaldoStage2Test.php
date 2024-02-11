<?php
/**
 * About Us Page Cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

use PHPUnit\Framework\TestCase;
/**
 * Front end unit tests for Waldo Stage 2 Page
 */
class WaldoStage2Test extends TestCase
{
    /**
     * Checks if the CSS file for the Waldo game exists.
     */
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../waldo_game/stages/waldo_game.css');
    }

    /**
     * Checks if the navbar component exists.
     */
    public function testNavbarComponentExists()
    {
        $this->assertFileExists(__DIR__ . '/../components/navbar/navbar.php');
    }

    /**
     * Checks if the JavaScript file for the Waldo game exists.
     */
    public function testJsFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../waldo_game/stages/waldo_game.js');
    }

    /**
     * Checks if the image for Waldo Stage 1 exists.
     */
    public function testWaldoStage1ImageExists()
    {
        $this->assertFileExists(__DIR__ . '/../images/waldo/waldo_stage_2.png');
    }
}

?>
