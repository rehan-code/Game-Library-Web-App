<?php

use PHPUnit\Framework\TestCase;

class WaldoSelectPageTest extends TestCase
{
    private $waldoSelectPhpContent;

    protected function setUp(): void
    {
        parent::setUp();
        // Load the contents of the waldo_select.php file into a string to be used in each test below
        $this->waldoSelectPhpContent = file_get_contents(__DIR__ . '/../waldo_game/waldo_select.php');
    }

    // Test if dependent CSS files exist
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../waldo_game/stages/waldo_game.css');
    }

    // Check if the waldo_select.php file itself exists (sanity check)
    public function testPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../waldo_game/waldo_select.php');
    }

    // Check if the page includes the navbar component
    public function testPageIncludesNavbar()
    {
        $this->assertStringContainsString('navbar/navbar.php', $this->waldoSelectPhpContent);
    }
}
