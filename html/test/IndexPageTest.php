<?php
/**
 * Index page test cases
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

use PHPUnit\Framework\TestCase;

/**
 * Front end tests for the home page
 */
class IndexPageTest extends TestCase
{
    private $_indexPhpContent;

    /**
     * Loads content of home page
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->_indexPhpContent = file_get_contents(__DIR__ . '/../index.php');
    }

    /**
     * Test if dependent CSS files exist
     */
    public function testCssFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../style.css');
    }

    /**
     * Verify the index.php file itself exists (sanity check)
     */
    public function testPHPFileExists()
    {
        $this->assertFileExists(__DIR__ . '/../index.php');
    }

    /**
     * Verify the index page includes the required navbar component
     */
    public function testPageIncludesNavbar()
    {
        $this->assertStringContainsString(
            'navbar/navbar.php', $this->_indexPhpContent
        );
    }

}
