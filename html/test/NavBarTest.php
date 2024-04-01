<?php
/**
 * Navbar Test Cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
?>

<?php

use PHPUnit\Framework\TestCase;
/**
 * Front end unit tests for NavBar
 */
class NavBarTest extends TestCase
{
    private $_navbarPhpContent;

    /**
     * Reads in all the content for the navbar
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Load the contents of the navbar.php file into a string 
        // to be used in each test below
        $this->_navbarPhpContent = file_get_contents(
            __DIR__ . '/../components/navbar/navbar.php'
        );
    }

    /**
     * Checks if all the required CSS files exist
     */
    public function testNavbarCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../components/navbar/navbar.css');
    }

    /**
     * Checks if all the required PHP files exist
     */
    public function testNavbarPHPFileExists()
    {
        $this->assertFileExists(
            __DIR__ . '/../components/navbar/navbar.php'
        );
    }

    /**
     * Checks if the navbar is integrated/found into the page
     */
    public function testNavbarIncludesExpectedItems()
    {
        $expectedItems = ['About Us']; // Update this array as needed

        foreach ($expectedItems as $item) {
            $this->assertStringContainsString($item, $this->_navbarPhpContent);
        }
    }

    /**
     * Tests if the navbar renders correctly in the page
     */
    public function testNavbarRendersCorrectly()
    {
        $this->assertStringContainsString(
            'class="nav-menu-link"', 
            $this->_navbarPhpContent
        );
    }
}
