<?php
/**
 * Cyber Coin Quest Stage Select Screen Test Cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
use PHPUnit\Framework\TestCase;

/**
 * Front end unit tests for Cyber Coin Quest Stage Select Screen
 */
class CyberCoinStageSelectTest extends TestCase
{
    /**
     * Checks if the main CSS file exists.
     */
    public function testMainCssFileExists()
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
     * Checks if the first stage PHP file exists.
     * Assuming there is a specific PHP file for each stage.
     */
    public function testFirstStagePHPFileExists()
    {
        $this->assertFileExists(
            __DIR__ . '/../cyber_coin/stages/cyber_coin_stage_1.php'
        );
    }

    /**
     * This test can be expanded or modified to check for more
     * files or different conditions based on the structure of
     * your project and what you deem necessary to test.
     */
}

?>
