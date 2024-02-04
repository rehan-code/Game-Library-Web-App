<?php

use PHPUnit\Framework\TestCase;

class NavbarTest extends TestCase
{
    private $navbarPhpContent;

    protected function setUp(): void
    {
        parent::setUp();
        // Load the contents of the navbar.php file into a string to be used in each test below
        $this->navbarPhpContent = file_get_contents(__DIR__ . '/../components/navbar/navbar.php');
    }

    public function testNavbarCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../components/navbar/navbar.css');
    }

    public function testNavbarPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../components/navbar/navbar.php');
    }

    public function testNavbarIncludesExpectedItems()
    {
        // Testing if expected items ar present in the nav bar
        $expectedItems = ['About Us', 'Instructions'];
        
        foreach ($expectedItems as $item) {
            $this->assertStringContainsString($item, $this->navbarPhpContent);
        }
    }

    public function testNavbarRendersCorrectly()
    {
        $this->assertStringContainsString('class="nav-menu-link"', $this->navbarPhpContent);
    }
}
