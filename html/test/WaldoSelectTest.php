<?php
/**
 * I-Spy Select Screen Test Cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
?>

<?php

use PHPUnit\Framework\TestCase;
/**
 * Front end unit tests for Waldo Select screen
 */
class WaldoSelectTest extends TestCase
{
    private $_waldoSelectPhpContent;

    /**
     * Reads in all the content for the I-Spy select screen
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Load the contents of the waldo_select.php file into a 
        // string to be used in each test below
        $this->_waldoSelectPhpContent = file_get_contents(
            __DIR__ . '/../waldo_game/waldo_select.php'
        );
    }

    /**
     * Checks if all the dependant/required CSS files exist
     */
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../waldo_game/stages/waldo_game.css');
    }

    /**
     * Check if the waldo_select.php file itself exists (sanity check)
     */
    public function testPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../waldo_game/waldo_select.php');
    }

    /**
     * Check if the page is included in the navbar component
     */
    public function testPageIncludesNavbar()
    {
        $this->assertStringContainsString(
            'navbar/navbar.php', $this->_waldoSelectPhpContent
        );
    }
}
