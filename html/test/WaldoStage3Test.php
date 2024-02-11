<?php

use PHPUnit\Framework\TestCase;

class WaldoStage3Test extends TestCase
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
        $this->assertFileExists(__DIR__ . '/../images/waldo/waldo_stage_3.jpg');
    }
}

?>
